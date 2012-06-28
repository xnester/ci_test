<?php

class Ajax extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	function domain_taken()
	{
	    $this->load->model('MDomains');
	    $domain=$this->security->xss_clean($this->input->post('name'));
	    //$username = trim($_POST['username']);
	    // if the username exists return a 1 indicating true
		if ($this->MDomains->checkExists($domain)) 
		{
			echo '1';
    	}
  	}
	function whois()
	{
		$domain=$this->security->xss_clean($this->input->post('name'));
		if($domain)
		{
			$this->load->library('Autowhois','','AWhois');
			$result=$this->AWhois->Whois($domain);
			if($result)
			{
				//echo '1';
				//print_r($result);
				//echo $this->AWhois->showObject($result);
				echo json_encode($result);
				
			}		
			
		}else{echo'whois page';}
	}

}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */
