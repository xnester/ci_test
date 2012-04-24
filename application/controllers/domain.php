<?php
/**
 * Domain Controller
 * @author SPornchai
 * 
 */
class Domain extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MDomains');	
		$this->load->library('pagination');
		
		//Pagination
		$config['base_url'] = base_url().'domain/page/';
		$config['total_rows'] = $this->db->count_all('domains');
		$config['per_page'] = 50;
		$config['num_links'] = 10;
		//$config['use_page_numbers'] = TRUE;
		
		$this->pagination->initialize($config); 
	}
	/**
	 * getAutoWhois
	 * @param string $domain
	 */
	function getAutoWhois($domain)
	{
		
	}
	function newdomain()
	{
		$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='domain_input';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function savenewdomain()
	{
		if($this->input->post('domain'))
		{
			$this->MDomains->addDomain();
			redirect('domain/','refresh');
		}else{
			redirect('domain/newdomain','refresh');
		}
	}
	function editdomain($id)
	{
		$data['title']='Edit Domain';
		$data['headline']='Welcome!';
		$data['include']='domain_edit';
		
		$data['row']=$this->MDomains->getdomain($id);
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function savedomain()
	{
		$id=$this->security->xss_clean($this->input->post('id'));
		if($this->input->post('domain'))
		{
			$this->MDomains->updateDomain($id);
			redirect('domain/','refresh');
		}else{
			redirect('domain/editdomain','refresh');
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
	function index()
	{	
		//get whois domain
		$this->load->library('phpwhois/whois','','LWhois');
		$result=$this->LWhois->Lookup('ji-net.co.th');
		//print_r($result);
		//echo $this->showObject($result);
		
		//split page and add pagination
		$this->page();
		
		/*$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='vdomain';
		
		$this->load->vars($data);
		$this->load->view('template');
		*/
	}
	function showObject(&$obj)
	{
		$r = $this->debugObject($obj);
		return "<pre>$r</pre>\n";
	}
	function debugObject($obj,$indent=0)
	{
		if (is_Array($obj))
		{
			$return = '';
			foreach($obj as $k => $v)
			{
				$return .= str_repeat('&nbsp;',$indent);
				$return .= '<b>'.$k.'</b>'."->$v\n";
				$return .= $this->debugObject($v,$indent+1);
			}
			return $return;
		}
	}
}