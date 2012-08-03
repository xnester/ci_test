<?php
class MDomains extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MClients');
	}
	function check_expires($id,$date_whois)
	{
		$row=$this->getdomain($id);
		$cur_date=strtotime($row->expires);
		$new_date=strtotime($date_whois);
		// If $date_db > $date_new no update to database
		if($cur_date <= $new_date)
		{
			return true;
			//return 'Current date='.$row->expires.' <= New date='.$date_whois." = UPDATE";
		}else{
			return false;
			//return 'Current date='.$row->expires.' > New date='.$date_whois." = noUPDATE";
		}
		
	}
	function get_all_client()
	{
		$query=$this->MClients->listall();
		return $query;
	}
	function get_client($id)
	{
		$row=$this->MClients->get_client($id);
		if($row)
		{
			return $row;
		}else{
			return false;
		}
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
		$data['name']=strtolower($data['name']);
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
		$data['name']=strtolower($data['name']);
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
	function get_domain_detail($name)
	{
		$this->db->from('domains');
		$this->db->where('name', $name);
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