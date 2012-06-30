<?php
class MClients extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MDealers');
	}
	function get_all_salesperson()
	{
		$query=$this->MDealers->listall();
		return $query;
	}
	function get_salesperson($id)
	{
		$row=$this->MDealers->get_dealer($id);
		if($row)
		{
			return $row;
		}else{
			return false;
		}
	}
	function client_exists($cus_id)
	{
		$this->db->from('clients');
		$this->db->where('cus_id', $cus_id);
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function client_add($data)
	{
		$now=date("Y-m-d H:i:s");
		$data['created']=$now;
		$data['modified']=$now;
		$this->db->insert('clients',$data);
	}
	function get_client($id)
	{
		$this->db->from('clients');
		$this->db->where('id', $id); 
		$query=$this->db->get();
		$row = $query->row();
		return $row;
	}
	function client_update($id,$data)
	{
		$now=date("Y-m-d H:i:s");
		$data['modified']=$now;
		$this->db->where('id', $id);
		$this->db->update('clients', $data); 		
	}
	function listall()
	{
		$this->db->from('clients');
		$this->db->order_by('name','asc'); 
		//$this->db->where('status', 'Active'); 
		//$this->db->limit($limit, $offset);
		$query=$this->db->get();
		return $query;
	}
}
/* End of file mclients.php */
/* Location: ./application/models/mclients.php */