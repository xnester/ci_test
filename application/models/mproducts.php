<?php
class MProducts extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function get_all()
	{
		$this->db->from('products');
		$this->db->order_by('name','asc'); 
		//$this->db->where('status', 'Active'); 
		//$this->db->limit($limit, $offset);
		$query=$this->db->get();
		return $query;
	}
	function get_product($id)
	{
		$this->db->from('products');
		$this->db->where('id', $id); 
		$query=$this->db->get();
		$row = $query->row();
		return $row;
	}
	function add_product($data)
	{
		$now=date("Y-m-d H:i:s");
		$data['stamp']=$now;
		$this->db->insert('products',$data);
	}
	function update_product($id,$data)
	{
		$now=date("Y-m-d H:i:s");
		$data['stamp']=$now;
		$this->db->where('id', $id);
		$this->db->update('products', $data); 		
	}
}
/* End of file mproducts.php */
/* Location: ./application/models/mproducts.php */