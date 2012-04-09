<?php
class Contact extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MContacts');
	}
	function index()
	{
		$data['title']='Contact Us';
		$data['headline']='Welcome!';
		$data['include']='contactus';
		
		$this->load->vars($data);
		$this->load->view('template');
		//echo 'Hello World!';		
	}
	function contactus()
	{
		if($this->input->post('email'))
		{
			$this->MContacts->addContact();
			redirect('contact/thank','refresh');
		}else{
			redirect('contact/','refresh');
		}
	}
	function thank()
	{
		$data['title']='Thank You';
		$data['headline']='Thank You!';
		$data['include']='thank';
		$this->load->vars($data);
		$this->load->view('template');	
	}
}