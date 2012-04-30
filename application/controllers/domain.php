<?php
/**
 * Domain Controller
 * @author SPornchai
 * 
 */
class Domain extends CI_Controller {
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
		$config['per_page'] = 50;
		$config['num_links'] = 10;
		//$config['use_page_numbers'] = TRUE;
		
		$this->pagination->initialize($config); 
	}
	function addnew()
	{
		// Load View edit form
		
		$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='domain_input';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function savenew()
	{
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('domain')),
			'created'=>$this->security->xss_clean($this->input->post('created')),
			'expires'=>$this->security->xss_clean($this->input->post('expires')),
			'changed'=>$this->security->xss_clean($this->input->post('changed')),
			'registrar'=>$this->security->xss_clean($this->input->post('registrar')),
			'nserver'=>$this->security->xss_clean($this->input->post('nserver'))
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
				redirect('domain/addnew','refresh');
			}
		}else{
			echo anchor('domain/','Back');
			echo '<br>Domain Exists!';
		}
	}
	function edit($id)
	{
		$data['row']=$this->MDomains->getdomain($id);
		
		// Load View edit form
		$data['title']='Edit Domain: ';
		$data['headline']='Welcome!';
		$data['include']='domain_edit';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function save()
	{
		$id=$this->security->xss_clean($this->input->post('id'));
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('domain')),
			'created'=>$this->security->xss_clean($this->input->post('created')),
			'expires'=>$this->security->xss_clean($this->input->post('expires')),
			'changed'=>$this->security->xss_clean($this->input->post('changed')),
			'registrar'=>$this->security->xss_clean($this->input->post('registrar')),
			'nserver'=>$this->security->xss_clean($this->input->post('nserver'))
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
		//echo $offset;
		
		$data['offset']=$offset;
		$data['query']=$this->MDomains->getallDomain(50,$offset);
		
		$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='vdomain';
			
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
				//echo $this->AWhois->showObject($result);
			}else{
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