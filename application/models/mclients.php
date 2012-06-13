<?php
class MClients extends CI_Model
{
	function __construct()
	{
		parent::__construct();
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
	function add()
	{
		
	}
}
/* End of file mclients.php */
/* Location: ./application/controllers/mclients.php */