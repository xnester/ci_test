<?php
/**
 * Domain Controller
 * @author SPornchai
 * 
 */
class Domain extends CI_Controller {
	private $per_page=50;
	function __construct()
	{
		parent::__construct();
		$this->load->model('MDomains');	
		$this->load->library('pagination');
		
		//Pagination
		$this->db->where('status', 'Active');
		//$this->db->count_all('domains');
		$this->db->from('domains');
		$all= $this->db->count_all_results();
		
		$config['base_url'] = base_url().'domain/page/';
		$config['total_rows'] = $all;
		$config['per_page'] = $this->per_page;
		$config['num_links'] = 10;
		//$config['use_page_numbers'] = TRUE;
		
		$this->pagination->initialize($config); 
	}
	function __getclient()
	{
		$query=$this->MDomains->get_all_client();
		$options=array();
		foreach ($query->result() as $client) {
			$options[$client->id]=$client->cus_id.' - '.$client->name;
		}
		return $options;
	}
	function addnew()
	{
		$data['options']=$this->__getclient();
		$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='domain_input';//view page
		$this->load->vars($data);
		$this->load->view('template');
	}
	function savenew()
	{
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'created'=>date('Y-m-d',strtotime($this->security->xss_clean($this->input->post('created')))),
			'expires'=>date('Y-m-d',strtotime($this->security->xss_clean($this->input->post('expires')))),
			'changed'=>date('Y-m-d',strtotime($this->security->xss_clean($this->input->post('changed')))),
			'registrar'=>$this->security->xss_clean($this->input->post('registrar')),
			'nserver'=>$this->security->xss_clean($this->input->post('nserver')),
			'client_id'=>$this->security->xss_clean($this->input->post('client_id')),
			//note
			'note'=>$this->security->xss_clean($this->input->post('divResult'))
		);
		if(!$this->MDomains->checkExists($data['name']))
		{
			//echo 'Doesn\'t Exists!';
			if($data['name'])
			{
				$this->MDomains->addDomain($data);
				redirect('domain/','refresh');
			}else{
				echo 'Please insert data.';
				echo anchor('domain/addnew','Back');
				//redirect('domain/addnew','refresh');
			}
		}else{
			echo anchor('domain/','Back');
			echo '<br>Domain Exists!';
		}
	}
	function edit($id)
	{
		$data['row']=$this->MDomains->getdomain($id);
		$data['options']=$this->__getclient();		
		// Load View edit form
		$data['title']='Edit Domain: ';
		$data['headline']='Welcome!';
		$data['include']='domain_edit';//view page
		$this->load->vars($data);
		$this->load->view('template');
	}
	function save()
	{
		$id=$this->security->xss_clean($this->input->post('id'));
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'created'=>date('Y-m-d',strtotime($this->security->xss_clean($this->input->post('created')))),
			'expires'=>date('Y-m-d',strtotime($this->security->xss_clean($this->input->post('expires')))),
			'changed'=>date('Y-m-d',strtotime($this->security->xss_clean($this->input->post('changed')))),
			'registrar'=>$this->security->xss_clean($this->input->post('registrar')),
			'nserver'=>$this->security->xss_clean($this->input->post('nserver')),
			'client_id'=>$this->security->xss_clean($this->input->post('client_id')),
			//note
			'note'=>$this->security->xss_clean($this->input->post('divResult'))
				
		);
		
		if($data['name'])
		{
			$this->MDomains->updateDomain($id,$data);
			redirect('domain/','refresh');
		}else{
			redirect('domain/editdomain','refresh');
		}
	}
	function del($id)
	{
		//if($this->MDomains->deleteDomain($id))
		if($id)
		{
			echo 'Del'.$id;	
			echo anchor('domain/','Back');		
		}
	}
	function page($offset=0)
	{
		$this->load->library('table');
		$data['offset']=$offset;
		$query=$this->MDomains->getallDomain($this->per_page,$offset);
		// generate HTML table from query results
		$tmpl = array (
			'table_open' => '<table border="1" cellpadding="4" cellspacing="2">',
			'heading_row_start' => '<tr class="table_header">',
			'row_start' => '<tr class="odd_row">' 
		);
		$this->table->set_template($tmpl);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No.','Name', 'Registrar', 'Created', 'Expires', 'Changed','NS','Client','Action');
		$table_row = array();
		$i=1+$offset;
		foreach ($query->result() as $domains)
		{
			$client=$this->MDomains->get_client($domains->client_id);
			$table_row = NULL;
			$table_row[] = $i;
			$table_row[] = htmlspecialchars($domains->name);
			$table_row[] = htmlspecialchars($domains->registrar);
			$table_row[] = htmlspecialchars($domains->created);
			$table_row[] = htmlspecialchars($domains->expires);
			$table_row[] = htmlspecialchars($domains->changed);
			$table_row[] = $domains->nserver;
			if($client)
			{
				$table_row[] = $client->name;
			}else{
				$table_row[] = $domains->client_id;;
			}
			$table_row[] = '<span style="white-space: nowrap">' . 
			anchor('domain/edit/' . $domains->id, 'edit') . ' | ' .
			anchor('domain/delete/' . $domains->id, 'delete',
				"onclick=\" return confirm('Are you sure you want to '
				+ 'delete the record for ".addslashes($domains->name)."?')\"") .
				'</span>';
			$this->table->add_row($table_row);
			
			$i++;
		}
		$students_table = $this->table->generate();
		$data['data_table'] = $students_table;
		$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='vdomain';//view page	
		$this->load->vars($data);
		$this->load->view('template');
	}
	function sendmail($id)
	{
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.ji-net.com';
		$config['smtp_user'] = '';
		$config['smtp_pass'] = '';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		
		if($id)
		{
			$this->email->from('domain-adm@ji-net.com', 'Domain-ADM');
			$this->email->to('pornchai.si@jasmine.com'); 
			
			$row=$this->MDomains->getdomain($id);
			$data='<p>'.$row->name.'</p>';
			$data.='<p>'.$row->created.'</p>';
			$data.='<p>'.$row->expires.'</p>';
			$data.='<p>'.$row->changed.'</p>';
	
			
			$this->email->subject('Email Test');
			$this->email->message('Testing the email class from Codeigniter.<br>'.$data); 
			$this->email->send();
			
			echo $this->email->print_debugger();
		}else{
			echo 'No id';
		}
	}
		function whois($domain)
	{
		//$domain=$this->security->xss_clean($this->input->post('domain'));
		if($domain)
		{
			$this->load->library('Autowhois','','AWhois');
			$result=$this->AWhois->Whois($domain);
			if($result)
			{
				echo '1';
				//print_r($result);
				echo $this->AWhois->showObject($result);
			}else {
				echo '0';
			}	
			
		}else{echo'whois page';}
	}
	
	function index()
	{	
		
		
		// split page and add pagination
		$this->page();

	}
}

/* End of file domain.php */
/* Location: ./application/controllers/domain.php */