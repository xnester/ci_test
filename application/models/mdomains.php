<?php
class MDomains extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		
	}
	function getallDomain($limit,$offset)
	{
		$this->db->from('domains');
		$this->db->order_by('expires','asc'); 
		$this->db->where('status', 'Active'); 
		$this->db->limit($limit, $offset);
		$query=$this->db->get();
		return $query;
	}
	function addDomain($data)
	{
		$now=date("Y-m-d H:i:s");
		$data['stamp']=$now;
		// Insert to database
		$this->db->insert('domains',$data);
		
	}
	function deleteDomain($id)
	{
		$now=date("Y-m-d H:i:s");
		$data['status']='Suspend';
		$data['stamp']=$now;
		
		$this->db->where('id',$id); 
		$query=$this->db->update('domains', $data);
		return $query;
	}
	function updateDomain($id,$data)
	{
		$now=date("Y-m-d H:i:s");
		$data['stamp']=$now;
		$this->db->where('id', $id);
		$this->db->update('domains', $data); 
	}
	function getdomain($id)
	{
		$this->db->from('domains');
		$this->db->where('id', $id); 
		$query=$this->db->get();
		$row = $query->row();
		return $row;
	}
	function checkExists($domain)
	{
		$this->db->from('domains');
		$this->db->where('name', $domain);
		$query=$this->db->get();
		//$row = $query->row();
		//return $row;
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file mdomains.php */
/* Location: ./application/models/mdomains.php */