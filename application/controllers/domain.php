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
	function getAutoWhois($domain)
	{
		// get whois domain
		//$this->load->library('phpwhois/whois','','LWhois');
		//$result=$this->LWhois->Lookup($domain);
		//print_r($result);
		//echo $this->showObject($result);
		//return $result;
	}
	function addnew()
	{
		$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='domain_input';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function savenew()
	{
		$domain=$this->input->post('domain');
		$result=$this->MDomains->checkExists($domain);
		
		if(!$result)
		{
			//echo 'Doesn\'t Exists!';
			if($domain)
			{
				$this->MDomains->addDomain();
				redirect('domain/','refresh');
			}else{
				echo 'Please insert data.';
				redirect('domain/addnew','refresh');
			}
		}else{
			echo $result->name;
			echo '<br>Exists!';
		}
	}
	function edit($id)
	{
		$data['row']=$this->MDomains->getdomain($id);
		
		$data['title']='Edit Domain: ';
		$data['headline']='Welcome!';
		$data['include']='domain_edit';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function save()
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
	function del($id)
	{
		if($this->MDomains->deleteDomain($id))
		{
			
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
		// split page and add pagination
		$this->page();
		
		/*$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='vdomain';
		
		$this->load->vars($data);
		$this->load->view('template');
		*/
	}
	/**
	 * showObject
	 * Disply whois raw data
	 * @param $obj 
	 */
	function showObject(&$obj)
	{
		$r = $this->debugObject($obj);
		return "<pre>$r</pre>\n";
	}
	/**
	 * debugObject
	 * Expand data in array
	 * @param $obj
	 * @param $indent
	 */
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