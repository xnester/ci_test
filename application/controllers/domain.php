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
		$this->load->helper('form');
	}
	/**
	 * listDomain List domain name on database
	 */
	function listDomain()
	{
		
	}
	/**
	 * checkExists Check domain name before add to database
	 * @param string $domain
	 * @return bool
	 */
	function checkExists($domain)
	{
		
	}
	/**
	 * getAutoWhois 
	 * @param string $domain
	 */
	function getAutoWhois($domain)
	{
		
	}
	function index()
	{
		echo'Domain<br>';
		echo 'Controller';
	}
	
}