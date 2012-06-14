<?php
class Dealer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MDealers');
	}
	function index()
	{
		$data['title']='Dealers';
		$data['headline']='Dealers';
		$data['include']='vdealer';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
}