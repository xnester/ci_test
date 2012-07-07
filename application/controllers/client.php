<?php
class Client extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MClients');
	}
	function index()
	{		
		$this->listing();
	}
	function edit($id)
	{
		$data['options']=$this->__salesperson();
		$data['row']=$this->MClients->get_client($id);
		$data['title']='Edit Client Profile';
		$data['headline']='Edit Client Profile';
		$data['include']='client_edit';//view page	
		$this->load->vars($data);
		$this->load->view('template');
	}
	function update()
	{
		$id=$this->security->xss_clean($this->input->post('id'));
		$data=array(
			'cus_id'=>$this->security->xss_clean($this->input->post('cus_id')),
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'email'=>$this->security->xss_clean($this->input->post('email')),
			'phone'=>$this->security->xss_clean($this->input->post('phone')),
			'dealer_id'=>$this->security->xss_clean($this->input->post('dealer_id'))
		);
		if($data['cus_id'])
		{
			$this->MClients->client_update($id,$data);
			redirect('client/','refresh');
		}else{
			redirect('client/edit','refresh');
		}
	}
	function __salesperson()
	{
		$query=$this->MClients->get_all_salesperson();	
		$options=array();
		foreach ($query->result() as $salesperson) {
			$options[0]='';
			$options[$salesperson->id]=$salesperson->name;
		}
		return $options;
	}
	function add()
	{
		$data['options']=$this->__salesperson();
		$data['title']='Add New Client';
		$data['headline']='Add New Client';
		$data['include']='client_input';//view page
		$this->load->vars($data);
		$this->load->view('template');
	}
	function save()
	{
		$data=array(
			'cus_id'=>$this->security->xss_clean($this->input->post('cus_id')),
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'email'=>$this->security->xss_clean($this->input->post('email')),
			'phone'=>$this->security->xss_clean($this->input->post('phone')),
			'dealer_id'=>$this->security->xss_clean($this->input->post('dealer_id'))
		);
		if(!$this->MClients->client_exists($data['cus_id']))
		{
			if($data['cus_id'])
			{
				$this->MClients->client_add($data);
				redirect('client/','refresh');
			}else{
				echo 'Please insert data.';
				echo anchor('client/add','Back');
				//redirect('client/add','refresh');
			}
		}else{
			echo anchor('client/add','Back');
			echo '<br>Customer ID have aleady exists!';
		}
	}
	function listing()
	{
		$this->load->library('table');
		$query=$this->MClients->listall();
		// generate HTML table from query results
		$tmpl = array (
			'table_open' => '<table border="1" cellpadding="4" cellspacing="2">',
			'heading_row_start' => '<tr class="table_header">',
			'row_start' => '<tr class="odd_row">' 
		);
		$this->table->set_template($tmpl); 
		$this->table->set_empty("&nbsp;"); 
		$this->table->set_heading('No.','Cus ID', 'Client Name', 'SalesPerson', 'Phone', 'Email','Action');
		$table_row = array();
		$i=1;
		foreach ($query->result() as $clients)
		{
			$salesperson=$this->MClients->get_salesperson($clients->dealer_id);
			$table_row = NULL;
			$table_row[] = $i;
			$table_row[] = htmlspecialchars($clients->cus_id);
			$table_row[] = htmlspecialchars($clients->name);
			if($salesperson)
			{
				$table_row[] = $salesperson->name;
			}else{
				$table_row[] = 'SalesPerson';
			}
			$table_row[] = $clients->phone;
			$table_row[] = mailto($clients->email);
			$table_row[] = '<span style="white-space: nowrap">' . 
			anchor('client/edit/' . $clients->id, 'edit') . ' | ' .
			anchor('student/delete/' . $clients->id, 'delete',
				"onclick=\" return confirm('Are you sure you want to '
				+ 'delete the record for ".addslashes($clients->name)."?')\"") .
				'</span>';
			$this->table->add_row($table_row);
			$i++;
		}    
		$students_table = $this->table->generate();
		$data['data_table'] = $students_table;
		$data['title']='Clients';
		$data['headline']='Clients';
		$data['include']='vclient';//view page
		$this->load->vars($data);
		$this->load->view('template');
	}
}
/* End of file client.php */
/* Location: ./application/controllers/client.php */