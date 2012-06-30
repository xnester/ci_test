<?php
class Product extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MProducts');
		$this->load->model('MUtils');
	}
	function index()
	{
		//implement
		$this->list_all();
	}
	function list_all()
	{
		$query=$this->MProducts->get_all();
		$this->load->library('table');
		// generate HTML table from query results
		$tmpl = array (
			'table_open' => '<table border="1" cellpadding="4" cellspacing="2">',
			'heading_row_start' => '<tr class="table_header">',
			'row_start' => '<tr class="odd_row">' 
		);
		$this->table->set_template($tmpl); 
		$this->table->set_empty("&nbsp;"); 
		$this->table->set_heading('No.','Name','Price','Description','Action');
		$table_row = array();
		$i=1;
		foreach ($query->result() as $products)
		{
			$table_row = NULL;
			$table_row[] = $i;
			$table_row[] = htmlspecialchars($products->name);
			$table_row[] = $products->price;
			$table_row[] = $products->desc;
			$table_row[] = '<span style="white-space: nowrap">' . 
			anchor('product/edit/' . $products->id, 'edit') . ' | ' .
			anchor('product/delete/' . $products->id, 'delete',
				"onclick=\" return confirm('Are you sure you want to '
				+ 'delete the record for ".addslashes($products->name)."?')\"") .
				'</span>';
			$this->table->add_row($table_row);
			$i++;
		}    
		$products_table = $this->table->generate();
		$data['data_table'] = $products_table;
		$data['title']='Products';
		$data['headline']='Products';
		$data['include']='vproduct';//view file
		$this->load->vars($data);
		$this->load->view('template');
	}
	function add()
	{
		$data['title']='Products';
		$data['headline']='Products';
		$data['include']='product_input';//view file
		$this->load->vars($data);
		$this->load->view('template');
	}
	function insert()
	{
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'price'=>$this->security->xss_clean($this->input->post('price')),
			'desc'=>$this->security->xss_clean($this->input->post('desc'))
		);
		if(!$this->MUtils->check_exists('products','name',$data['name']))
		{
			if($data['name'])
			{
				$this->MProducts->add_product($data);
				redirect('product/','refresh');
			}else{
				echo 'Please insert data.';
				redirect('porduct/add','refresh');
			}
		}else{
			echo anchor('product/add','Back');
			echo '<br>Customer ID have aleady exists!';
		}
	}
	function edit($id)
	{
		$data['row']=$this->MProducts->get_product($id);
		$data['title']='Products';
		$data['headline']='Products';
		$data['include']='product_edit';//view file
		$this->load->vars($data);
		$this->load->view('template');
	}
	function update()
	{
		$id=$this->security->xss_clean($this->input->post('id'));
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('name')),
			'price'=>$this->security->xss_clean($this->input->post('price')),
			'desc'=>$this->security->xss_clean($this->input->post('desc'))
		);
		if($data['name'])
		{
			$this->MProducts->update_product($id,$data);
			redirect('product/','refresh');
		}else{
			redirect('product/edit','refresh');
		}
	}
	function delete()
	{
		//implement
	}
}
/* End of file product.php */
/* Location: ./application/controllers/product.php */