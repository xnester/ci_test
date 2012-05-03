<?php
class MClients extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	function listClient()
	{
		$this->db->from('clients');
		//$this->db->order_by('expires','asc'); 
		//$this->db->where('status', 'Active'); 
		//$this->db->limit($limit, $offset);
		$query=$this->db->get();
		return $query;
	}
	function client_exists($cus_id)
	{
		$this->db->where('cus_id',$cus_id);
		$this->db->from('clients');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
/* End of file mclients.php */
/* Location: ./application/models/mclients.php */