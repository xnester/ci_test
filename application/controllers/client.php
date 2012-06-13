<?php
class Client extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$data['title']='Add New Client';
		$data['headline']='Welcome!';
		$data['include']='vclient';
			
		$this->load->vars($data);
		$this->load->view('template');
	}
	function add()
	{
		$data['title']='Add New Client';
		$data['headline']='Welcome!';
		$data['include']='client_input';
			
		$this->load->vars($data);
		$this->load->view('template');
	}
}
/* End of file client.php */
/* Location: ./application/controllers/client.php */