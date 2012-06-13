<?php
class Testwhois extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Autowhois','','AWhois');
	}
	function whois($domain)
	{
		echo $domain;
		$result=$this->AWhois->Whois($domain);
		echo $this->AWhois->showObject($result);
	}
}