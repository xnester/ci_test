<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autowhois
{
	var $CI;
	
	public function __construct()
	{
		//To access CodeIgniter's native resources within your library use the get_instance() function
		$this->CI =& get_instance();
	
		// Load whois library
		$this->CI->load->library('phpwhois/whois','','LWhois');		
	}
	/**
	 * showObject
	 * Disply whois raw data
	 * @param $obj 
	 */
	function showObject(&$obj)
	{
		$r = $this->debugObject($obj);
		return "<pre>$r</pre>\n";
	}
	/**
	 * debugObject
	 * Expand data in array
	 * @param $obj
	 * @param $indent
	 */
	function debugObject($obj,$indent=0)
	{
		if (is_Array($obj))
		{
			$return = '';
			foreach($obj as $k => $v)
			{
				$return .= str_repeat('&nbsp;',$indent);
				$return .= '<b>'.$k.'</b>'."->$v\n";
				$return .= $this->debugObject($v,$indent+1);
			}
			return $return;
		}
	}
	function Whois($domain)
	{
		$result=$this->CI->LWhois->Lookup($domain);
		//print_r($result);
		//echo $this->showObject($result);
		if($result['regrinfo']['registered']=='yes')
		{
			return $result;
		}else{
			return false;
		}
	}
}

/* End of file Autowhois.php */
/* Location: ./application/libraries/Autowhois.php */