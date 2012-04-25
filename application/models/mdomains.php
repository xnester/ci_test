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
		$this->db->limit($limit, $offset);
		$query=$this->db->get();
		return $query;
	}
	function addDomain()
	{
		$now=date("Y-m-d H:i:s");
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('domain')),
			'created'=>$this->security->xss_clean($this->input->post('created')),
			'expires'=>$this->security->xss_clean($this->input->post('expires')),
			'changed'=>$this->security->xss_clean($this->input->post('changed')),
			'registrar'=>$this->security->xss_clean($this->input->post('registrar')),
			'nserver'=>$this->security->xss_clean($this->input->post('nserver')),
			'stamp'=>$now
		);
		$this->db->insert('domains',$data);
		
	}
	function deleteDomain($id)
	{
		
	}
	function updateDomain($id)
	{
		$now=date("Y-m-d H:i:s");
		$data=array(
			'name'=>$this->security->xss_clean($this->input->post('domain')),
			'created'=>$this->security->xss_clean($this->input->post('created')),
			'expires'=>$this->security->xss_clean($this->input->post('expires')),
			'changed'=>$this->security->xss_clean($this->input->post('changed')),
			'registrar'=>$this->security->xss_clean($this->input->post('registrar')),
			'nserver'=>$this->security->xss_clean($this->input->post('nserver')),
			'stamp'=>$now
		);
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
		$row = $query->row();
		return $row;
	}
}