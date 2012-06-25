<?php
class MHosts extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getall()
	{
		$this->db->from('hosts');
		$this->db->order_by('name','asc'); 
		//$this->db->where('status', 'Active'); 
		//$this->db->limit($limit, $offset);
		$query=$this->db->get();
		return $query;
	}
	function getip($host)
	{
		$this->db->from('ips');
		$this->db->where('host_id', $host); 
		$query=$this->db->get();
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			return $row;
		}else{
			return 0;
		}
		
	}
	function gethost($id)
	{
		$this->db->from('hosts');
		$this->db->where('id', $id); 
		$query=$this->db->get();
		$row = $query->row();
		return $row;
	}
	function get_status($id)
	{
		$this->db->from('hosts');
		$this->db->where('id', $id); 
		$query=$this->db->get();
		$row = $query->row();
		return $row;
	}
	function addhost($data)
	{
		$now=date("Y-m-d H:i:s");
		$data['stamp']=$now;
		$this->db->insert('hosts',$data);
	}
	function updatehost($id,$data)
	{
		$now=date("Y-m-d H:i:s");
		$data['stamp']=$now;
		$this->db->where('id', $id);
		$this->db->update('hosts', $data); 		
	}
	function check_exists($name)
	{
		$this->db->from('hosts');
		$this->db->where('name', $name);
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
/* End of file mhosts.php */
/* Location: ./application/models/mhosts.php */