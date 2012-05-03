<?php
class Client extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('table');
		$this->load->model('MClients');
	}
	function index()
	{
		
		$this->listing();
		
	}
	function add()
	{
		$data['title']='Add New Domain';
		$data['headline']='Welcome!';
		$data['include']='client_add';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function create()
	{
		echo $this->input->post('c_id');
	}
	function listing()
	{
		$query=$this->MClients->listClient();
		$this->table->set_heading('No.','Cus_ID','Client Name','Email','Phone','Seller');
		
		$table_row = array();
		$i=0;
		foreach($query->result() as $row)
		{
			$table_row = NULL;
			//$table_row[] = '<span style="white-space: nowrap">'.anchor('student/edit/' . $row->id, 'edit') . ' | ' .anchor('student/delete/' . $row->id, 'delete',"onclick=\" return confirm('Are you sure you want to '+ 'delete the record for ".addslashes($row->name)."?')\"") .'</span>';

			$table_row[] = $i;
			$table_row[] = $row->cus_id;
			$table_row[] = $row->name;
			$table_row[] = mailto($row->email);
			$table_row[] = $row->phone;
			$table_row[] = $row->seller_id;
			
			$this->table->add_row($table_row);
			$i++;
		}    
		$data['client_table']=$this->table->generate(); 
		
		///
		$data['title']='Add New Client';
		$data['headline']='Welcome!';
		$data['include']='vclient';
		
		$this->load->vars($data);
		$this->load->view('template');

	}
}
/* End of file client.php */
/* Location: ./application/controllers/client.php */