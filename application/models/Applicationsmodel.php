<?php

class Applicationsmodel extends CI_Model{


	public function createApplication(){
		try { 
		  	$this->load->database();
		  	$data = array(
			   'emailid' => $this->input->post('emailid') ,
			   'appname' => $this->input->post('appname') ,
			   'slaveurl' => $this->input->post('slaveurl'),
			   'appurl' => $this->input->post('appurl'),
			   'variant' => $this->input->post('variant')
			);
			$this->db->insert('application', $data); 
			if($this->db->affected_rows() > 0)
			{
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
	}
	
	public function deleteapplication(){
	    try {
	      log_message("debug","Application delete started for ". $this->input->post('appname'));
	      $this->load->database();
	      if($this->cleanUpApplicationDependents($this->input->post('appname'), $this->session->userdata('sessionemailid'))){
		      $this->db->delete("application",array('appname'=> $this->input->post('appname'), 'emailid' => $this->session->userdata('sessionemailid')));  
		      if($this->db->affected_rows() > 0)
		      {
		        return true;
		      }else{
		        return false;
		      }
		  }else{
		  	return false;
		  }
	    }catch(Exception $e){
	      var_dump($e->getMessage());
	      return false;
	    }
  	}

	function cleanUpApplicationDependents($appname, $emailid){
  		$resourceflag = false;
  		$testcaseflag = false;
  		$testsuiteflag = false;

  		// clearning up testresources for appname+emailid 
  		try {
	      $this->load->database();
	      
	      $this->db->delete("testresource",array('appname'=> $appname, 'emailid' => $emailid));  

	      if($this->db->affected_rows() >= 0)
	      {
	        $resourceflag = true;
	      }else{
	        $resourceflag = false;
	      }
	    }catch(Exception $e){
	      var_dump($e->getMessage());
	      $resourceflag = false;
	    }

	    // clearning up testsuite for appname+emailid 
	    try {
	      $this->load->database();
	      
	      $this->db->delete("testsuite",array('appname'=> $appname, 'emailid' => $emailid));  

	      if($this->db->affected_rows() >= 0)
	      {
	        $testsuiteflag = true;
	      }else{
	        $testsuiteflag = false;
	      }
	    }catch(Exception $e){
	      var_dump($e->getMessage());
	      $testsuiteflag = false;
	    }

	    // clearning up testcase for appname+emailid 
	    $flag = true;
	    try {
		  	$this->load->database();
			$this->db->where('emailid', $emailid);
			$this->db->where('appname', $appname);
			$query = $this->db->get('testcase');
			 
			foreach ($query->result() as $row)
			{
				$status = $this->deleteteststeps((string)$row->tc_id);
				log_message('debug','step delete status: ', $status);
			    if(!$status)
		      	{
		        	$flag = false;
		        	break;
		      	}else{
	       			$flag = true;
		      	}
			}
			if($flag){
				$this->load->database();
				$this->db->where('emailid', $emailid);
				$this->db->where('appname', $appname);
				$query = $this->db->delete('testcase');
				if($this->db->affected_rows() >= 0)
		      	{
		        	$testcaseflag = true;
		      	}else{
	       			$testcaseflag = false;
		      	}
			}else{
				$testcaseflag = false;
			}
		}catch(Exception $e){
			var_dump($e->getMessage());
			$testcaseflag = false;
		}
		log_message('debug', 'getting flag as '. $flag);
		log_message('debug', 'getting -- '. $resourceflag . ' -- '.$testcaseflag. ' -- '.$testsuiteflag);

  		if($resourceflag and $testcaseflag and $testsuiteflag){
  			return true;
  		}else{
  			return false;
  		}
  	}

  	function deleteteststeps($id){
  		log_message("debug","trying to delete tc_id ". $id);
		$teststeps = array();
		try {
		  	$this->load->database();
			$this->db->where('tc_id', $id);
			$query = $this->db->delete('teststep');
			if($this->db->affected_rows() >= 0)
	      	{
        		return true;
	      	}else{
       			return false;
	      	}
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
	}

  	public function addtestsuite(){
  		try { 
		  	$this->load->database();
		  	$data = array(
		  	   'suiteid' => md5($this->input->post('testsuitename'). $this->input->post('emailid'). $this->input->post('appname')),
		  	   'emailid' => $this->input->post('emailid') ,
			   'appname' => $this->input->post('appname') ,
			   'testsuitename' => $this->input->post('testsuitename'),
			   'description' => $this->input->post('desc') 
			);
			$this->db->insert('testsuite', $data); 
			if($this->db->affected_rows() > 0)
			{
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
  	}

  	public function getTestSuiteList(){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$testsuites = array();
		try {
		  	$this->load->database();
			$this->db->where('emailid', $this->session->userdata('sessionemailid'));
			$this->db->where('appname', $this->input->get('app'));
			$this->db->order_by('testsuite.testsuitename', 'ASC');
			$query = $this->db->get('testsuite');
			
			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'suiteid' => $row->suiteid,
			    	'testsuitename' => $row->testsuitename,
			    	'description' => $row->description
			    );
			    $testsuites[] = $temp;
			}
			return $testsuites;
		}catch(Exception $e){
			var_dump($e->getMessage());
			return $testsuites;
		}
	}


	public function addtestresource(){
  		try { 
		  	$this->load->database();
		  	$data = array(
		  	   'resourceid' => md5($this->input->post('testresourcename'). $this->input->post('emailid'). $this->input->post('appname')),
		  	   'emailid' => $this->input->post('emailid') ,
			   'appname' => $this->input->post('appname') ,
			   'testresource' => $this->input->post('testresourcename'),
			   'identifier' => $this->input->post('resourceidentifier'),
			   'value' => $this->input->post('resourcevalue'),
			   'pagename' => $this->input->post('pagename'),
			   'description' => $this->input->post('desc') 
			);
			$this->db->insert('testresource', $data); 
			if($this->db->affected_rows() > 0)
			{
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
  	}

  	public function updatetestresource(){
  		try { 
		  	$this->load->database();
		  	$data = array(
		  	   'resourceid' => md5($this->input->post('testresourcename'). $this->input->post('emailid'). $this->input->post('appname')),
		  	   'testresource' => $this->input->post('testresourcename'),
		  	   'identifier' => $this->input->post('resourceidentifier'),
			   'value' => $this->input->post('resourcevalue'),
			   'pagename' => $this->input->post('pagename'),
			   'description' => $this->input->post('desc') 
			);

			$this->db->where('resourceid',$this->input->post('resourceidbkup'));
			$this->db->update('testresource',$data);
			log_message('debug','Query '. $this->db->last_query());
			log_message('debug', 'affected rows '. $this->db->affected_rows());
			if($this->db->affected_rows() > 0)
			{
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
  	}

  	public function deletetestresource(){
	    try {
	      $this->load->database();
	      $this->db->delete("testresource",
	      	array(
	      		'appname'=> $this->input->post('appname'), 
	      		'emailid' => $this->input->post('emailid'),
	      		'resourceid' => $this->input->post('resourceid')
	      ));  

	      if($this->db->affected_rows() > 0)
	      {
	        return true;
	      }else{
	        return false;
	      }
	    }catch(Exception $e){
	      var_dump($e->getMessage());
	      return false;
	    }
  	}

  	public function getTestResourceList(){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$testresources = array();
		try {
		  	$this->load->database();
			$this->db->where('emailid', $this->session->userdata('sessionemailid'));
			$this->db->where('appname', $this->input->get('app'));
			$query = $this->db->get('testresource');
			
			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'resourceid' => $row->resourceid,
			    	'testresourcename' => $row->testresource,
			    	'identifier' => $row->identifier,
			    	'value' => $row->value,
			    	'pagename' => $row->pagename,
			    	'description' => $row->description
			    );
			    $testresources[] = $temp;
			}
			return $testresources;
		}catch(Exception $e){
			var_dump($e->getMessage());
			return $testresources;
		}
	}
}

?>
