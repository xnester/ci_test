<?php
class Dealer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MDealers');
	}
	function add()
	{
		$data['title']='Dealers';
		$data['headline']='Dealers';
		$data['include']='dealer_input';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function save()
	{
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'email'=>$this->security->xss_clean($this->input->post('email')),
			'phone'=>$this->security->xss_clean($this->input->post('phone'))
		);
		if(!$this->MDealers->dealer_exists($data['email']))
		{
			//echo 'Doesn\'t Exists!';
			if($data['email'])
			{
				$this->MDealers->dealer_add($data);
				redirect('dealer/','refresh');
			}else{
				echo 'Please insert data.';
				redirect('dealer/add','refresh');
			}
		}else{
			//may be have go back with history input
			echo anchor('dealer/add','Back');
			echo '<br>User aleady exists!';
		}
	}
	function edit($id)
	{
		$data['row']=$this->MDealers->get_dealer($id);
		$data['title']='Dealers';
		$data['headline']='Dealers';
		$data['include']='dealer_edit';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
	function update()
	{
			$id=$this->security->xss_clean($this->input->post('id'));
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'email'=>$this->security->xss_clean($this->input->post('email')),
			'phone'=>$this->security->xss_clean($this->input->post('phone'))
		);
	if($data['email'])
		{
			$this->MDealers->dealer_update($id,$data);
			redirect('dealer/','refresh');
		}else{
			redirect('dealer/edit','refresh');
		}
	}
	function index()
	{
		$this->list_dealer();
	}
	function list_dealer()
	{
		$this->load->library('table');
		$query=$this->MDealers->listall();
		
		// generate HTML table from query results
		$tmpl = array (
			'table_open' => '<table border="1" cellpadding="4" cellspacing="2">',
			'heading_row_start' => '<tr class="table_header">',
			'row_start' => '<tr class="odd_row">' 
		);
		$this->table->set_template($tmpl); 
		
		$this->table->set_empty("&nbsp;"); 
		
		$this->table->set_heading('No.','Name','Phone', 'Email','Action');
		
		$table_row = array();
		$i=1;
		foreach ($query->result() as $dealers) {

			$table_row = NULL;
			$table_row[] = $i;
			$table_row[] = htmlspecialchars($dealers->name);
			//$table_row[] = htmlspecialchars($clients->email);
			//$table_row[] = 'seller';
			//$table_row[] = htmlspecialchars($student->email);
			//$table_row[] = htmlspecialchars($student->phone);
			//$table_row[] = $student->state;
			//$table_row[] = $student->zip;
			$table_row[] = $dealers->phone;
			$table_row[] = mailto($dealers->email);
			$table_row[] = '<span style="white-space: nowrap">' . 
			anchor('dealer/edit/' . $dealers->id, 'edit') . ' | ' .
			anchor('dealer/delete/' . $dealers->id, 'delete',
				"onclick=\" return confirm('Are you sure you want to '
				+ 'delete the record for ".addslashes($dealers->name)."?')\"") .
				'</span>';
			$this->table->add_row($table_row);
			$i++;
		}    
		
		$dealers_table = $this->table->generate();
		$data['data_table'] = $dealers_table;
		
		$data['title']='Dealers';
		$data['headline']='Dealers';
		$data['include']='vdealer';
		
		$this->load->vars($data);
		$this->load->view('template');
	}
}
/* End of file dealer.php */
/* Location: ./application/controllers/dealer.php */