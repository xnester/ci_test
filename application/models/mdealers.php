<?php
class MDealers extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function dealer_exists($email)
	{
		$this->db->from('dealers');
		$this->db->where('email', $email);
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function dealer_add($data)
	{
		$now=date("Y-m-d H:i:s");
		$data['created']=$now;
		$data['modified']=$now;
		$this->db->insert('dealers',$data);
	}
	function get_dealer($id)
	{
		$this->db->from('dealers');
		$this->db->where('id', $id); 
		$query=$this->db->get();
		$row = $query->row();
		return $row;
	}
	function dealer_update($id,$data)
	{
		$now=date("Y-m-d H:i:s");
		$data['modified']=$now;
		$this->db->where('id', $id);
		$this->db->update('dealers', $data); 		
	}
	function listall()
	{
		$this->db->from('dealers');
		$this->db->order_by('name','asc'); 
		//$this->db->where('status', 'Active'); 
		//$this->db->limit($limit, $offset);
		$query=$this->db->get();
		return $query;
	}
}
/* End of file mdealers.php */
/* Location: ./application/models/mdealers.php */