<?php
class MUtils extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function check_exists($tbl,$field,$data)
	{
		$this->db->from($tbl);
		$this->db->where($field, $data);
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}