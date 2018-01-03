<?php

class Dashboardmodel extends CI_Model{


	public function getAppList(){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$applications = array();
		try {
		  	$this->load->database();
			$this->db->where('emailid', $this->session->userdata('sessionemailid'));
			$query = $this->db->get('application');
			
			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'appname' => $row->appname,
			    	'slaveurl' => $row->slaveurl,
			    	'appurl' => $row->appurl,
			    	'variant' => $row->variant,
			    );
			    $applications[] = $temp;
			}
			return $applications;
		}catch(Exception $e){
			var_dump($e->getMessage());
			return $applications;
		}
	}

	
}


?>