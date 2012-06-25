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
		foreach ($query->result() as $hosts) {
			
			$table_row = NULL;
			$table_row[] = $i;
			$table_row[] = htmlspecialchars($hosts->name);
			$table_row[] = $hosts->status;
			//show ip
			$ips=$this->MHosts->getip($hosts->id);
			if($ips){
				$table_row[] = $ips->ip;
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
		$data['data_table'] = $hosts_table;
		
		$data['title']='Hosts';
		$data['headline']='Hosts';
		$data['include']='vhost';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function add()
	{
		$data['title']='Hosts';
		$data['headline']='Hosts';
		$data['include']='host_input';
		
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
		if(!$this->MHosts->check_exists($data['name']))
		{
			//echo 'Doesn\'t Exists!';
			if($data['name'])
			{
				$this->MHosts->addhost($data);
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