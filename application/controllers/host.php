<?php
class Host extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MHosts');
	}
	function index()
	{
		//index
		$this->list_all();
	}
	function list_all()
	{
		//list_all
		
		$query=$this->MHosts->getall();
		$this->load->library('table');
		// generate HTML table from query results
		$tmpl = array (
			'table_open' => '<table border="1" cellpadding="4" cellspacing="2">',
			'heading_row_start' => '<tr class="table_header">',
			'row_start' => '<tr class="odd_row">' 
		);
		$this->table->set_template($tmpl); 
		$this->table->set_empty("&nbsp;"); 
		$this->table->set_heading('No.','Name','Status','IP','Space', 'Free','Action');
		$table_row = array();
		$i=1;
		foreach ($query->result() as $hosts)
		{
			$table_row = NULL;
			$table_row[] = $i;
			//$table_row[] = htmlspecialchars($hosts->name);
			$table_row[] = anchor('host/detail/'.$hosts->name, $hosts->name);
			$table_row[] = $hosts->status;
			//show ip
			$ip_exists=$this->MHosts->host_ip_exists($hosts->id);
			if($ip_exists){
				$table_row[] = $ip_exists->ip;
			}else{
				$table_row[] = 'No Assign IP';
			}
			$table_row[] = $hosts->space;
			$table_row[] = $hosts->free;
			$table_row[] = '<span style="white-space: nowrap">' . 
			anchor('host/edit/' . $hosts->id, 'edit') . ' | ' .
			anchor('host/delete/' . $hosts->id, 'delete',
				"onclick=\" return confirm('Are you sure you want to '
				+ 'delete the record for ".addslashes($hosts->name)."?')\"") .
				'</span>';
			$this->table->add_row($table_row);
			$i++;
		}    
		$hosts_table = $this->table->generate();
		$data['data_table'] = anchor('host/add','Add new Host');
		$data['data_table'] .= $hosts_table;
		$data['title']='Hosts';
		$data['headline']='Hosts';
		$data['include']='vhost';//view page
		$this->load->vars($data);
		$this->load->view('template');
	}
	function add()
	{
		$data['title']='Hosts';
		$data['headline']='Hosts';
		$data['include']='host_input';//view page
		$this->load->vars($data);
		$this->load->view('template');
	}
	function insert()
	{
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'space'=>$this->security->xss_clean($this->input->post('space')),
			'status'=>$this->security->xss_clean($this->input->post('status'))
		);
		$ips=$this->security->xss_clean($this->input->post('ips'));
		if(!$this->MHosts->check_exists($data['name']))
		{
			//echo 'Doesn\'t Exists!';
			if($data['name'])
			{
				$this->MHosts->addhost($data);
				$data_ip['host_id']=$this->MHosts->get_last_id('hosts');
				foreach($ips as $ip)
				{
					if(strlen($ip)>0)
					{
						$data_ip['ip']=$ip;
						$this->MHosts->addip($data_ip);
					}
				}
				redirect('host/','refresh');
			}else{
				echo 'Please insert data.';
				redirect('host/add','refresh');
			}
		}else{
			echo anchor('host/add','Back');
			echo '<br>Customer ID have aleady exists!';
		}
	}
	function edit($id)
	{
		$data['row']=$this->MHosts->gethost($id);
		$data['title']='Hosts';
		$data['headline']='Hosts';
		$data['include']='host_edit';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function ip($mode='',$host_id='',$id='')
	{
		if($mode=='add' && $host_id !='')
		{
			echo 'Add';
		}
		else if($mode=='edit' && $host_id !='' && $id != '')
		{
			echo 'Edit';

		}
		else if($mode=='del' && $host_id !='' && $id != '' )
		{
			echo 'Delete';
		}
		else
		{
			echo 'Nothing to do!';
			//redirect('host/','refresh');
		}
	}
	function insert_ip()
	{
		$data_ip=array(
				'ip'=>$this->security->xss_clean($this->input->post('ip')),
				'int'=>$this->security->xss_clean($this->input->post('int')),
				'host_id'=>$this->security->xss_clean($this->input->post('host_id')),
				'desc'=>$this->security->xss_clean($this->input->post('desc'))
		);
		if(!$this->MHosts->addip($data_ip))
		{	
			$ip_id=$this->MHosts->get_last_id('ips');
			echo '<tr class="loadplace">
					<td>'.$data_ip['ip'].'</td>
					<td>'.$data_ip['int'].'</td>
					<td>'.$data_ip['desc'].'</td>
					<td><span style="white-space: nowrap">' .
						anchor('host/ip/edit/'.$data_ip['host_id'].'/'. $ip_id, 'edit') . ' | ' .
						anchor('host/ip/del/'.$data_ip['host_id'].'/'. $ip_id, 'delete',
								"onclick=\" return confirm('Are you sure you want to '
				+ 'delete the record for ".addslashes($ip_id)."?')\"") .
								'</span>
					</td>
				</tr>';
		}
	}
	function detail($name='')
	{
		if($name=='')
		{
			redirect('host/','refresh');
		}else{
			$hosts=$this->MHosts->get_host_detail($name);
			$this->load->library('table');
			// generate HTML table from query results
			$tmpl = array (
				'table_open' => '<table border="1" cellpadding="4" cellspacing="2">',
				'heading_row_start' => '<tr class="table_header">',
				'row_start' => '<tr class="odd_row">' 
			);
			$this->table->set_template($tmpl); 
			//Host Detail
			$this->table->set_empty("&nbsp;"); 
			$this->table->set_heading('Id','Name','Status','Space', 'Free','Last');
			$table_row = array();
			$table_row = NULL;
			$table_row[] = $hosts->id;
			$table_row[] = $hosts->name;
			$table_row[] = $hosts->status;
			$table_row[] = $hosts->space;
			$table_row[] = $hosts->free;
			$table_row[] = $hosts->stamp;
			$this->table->add_row($table_row);
			$hosts_table = $this->table->generate();
			
			//IP detail
			/*
			$this->table->clear();
			$tmpl_ip = array (
					'table_open' => '<table id="ip" name="ip" border="1" cellpadding="4" cellspacing="2">',
					'heading_row_start' => '<tr class="table_header">',
					'row_start' => '<tr class="odd_row">'
			);
			$this->table->set_template($tmpl_ip);
			$this->table->set_empty("&nbsp;");
			$this->table->set_heading('IP','Vlan','Description','Actions');
			$ip_row = array();
			*/
			$ip_exists=$this->MHosts->host_ip_exists($hosts->id);
			if($ip_exists){
				$query=$this->MHosts->get_all_host_ip($hosts->id);
				$data['data_ip']=$query;
				/*
				foreach ($query->result() as $ips)
				{
					$ip_row = NULL;
					$ip_row[] = $ips->ip;
					$ip_row[] = $ips->int;
					$ip_row[] = $ips->desc;
					$ip_row[] = '<span style="white-space: nowrap">' .
							anchor('host/ip/edit/'.$hosts->id.'/'. $ips->id, 'edit') . ' | ' .
							anchor('host/ip/del/'.$hosts->id.'/'. $ips->id, 'delete',
									"onclick=\" return confirm('Are you sure you want to '
					+ 'delete the record for ".addslashes($ips->ip)."?')\"") .
									'</span>';
					$this->table->add_row($ip_row);
				}
				*/
			}else{
				$data['data_ip']=0;
				/*
				$ip_row[] = 'No Assign IP';
				$ip_row[] = '';
				$ip_row[] = '';
				$ip_row[] = '';//anchor('host/ip/add/'.$hosts->id, 'Add');
				$this->table->add_row($ip_row);
				*/
				
			}
			/*
			$ip_row = NULL;
			$ip_row[] = form_input(array('id' => 'ips'.$hosts->id,'name' => 'ips'.$hosts->id));
			$ip_row[] = form_input(array('id' => 'vlan'.$hosts->id,'name' => 'vlan'.$hosts->id));
			$ip_row[] = form_input(array('id' => 'desc'.$hosts->id,'name' => 'desc'.$hosts->id));
			//$ip_row[] = anchor('host/ip/add/'.$hosts->id, 'Add');
			$ip_row[] = form_button(array('id' => $hosts->id,'name' => 'add_ip','class'=>'add_ip'),'Add IP');
			$this->table->add_row($ip_row);
			$hosts_ip = $this->table->generate();
			*/
			
			//$data['data_ip'] = $hosts_ip;
			$data['host_id']=$hosts->id;
			$data['data_table'] = $hosts_table;
			$data['data_table'] .= '<p>'.anchor('host/','Back').'</p>';
			$data['title']='Hosts';
			$data['headline']='Hosts';
			$data['include']='host_detail';//view page
			$this->load->vars($data);
			$this->load->view('template');
		}
	}
	function update()
	{
		$id=$this->security->xss_clean($this->input->post('id'));
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'space'=>$this->security->xss_clean($this->input->post('space')),
			'desc'=>$this->security->xss_clean($this->input->post('desc')),
			'status'=>$this->security->xss_clean($this->input->post('status'))
		);
		if($data['name'])
		{
			$this->MHosts->updatehost($id,$data);
			redirect('host/','refresh');
		}else{
			redirect('host/edit','refresh');
		}
	}
	function delete()
	{
		//delete
	}
}
/* End of file host.php */
/* Location: ./application/controllers/host.php */