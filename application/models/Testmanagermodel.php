<?php
require('ExcelImport/excel_reader2.php');
require('ExcelImport/SpreadsheetReader_XLSX.php');


class Testmanagermodel extends CI_Model{

	public function importFromExcel(){
		try {
			$this->load->database();
			$file = $_FILES['tsexcel']['tmp_name'];
			$Reader = new SpreadsheetReader_XLSX($file);
			foreach($Reader as $Row){
				$tc_id = "";
			    $tc_name = "";
			    $tc_obj = "";
			    $tc_precondition = "";
			    $tc_suite = "";

			    $ts_steps = "";
			    $ts_step_desc = "";
			    $ts_action = "";
			    $ts_assert_resource_name = "";
			    $ts_exp_value = "";

			    $c = 0;
			    $flag = false;
			    foreach ($Reader as $Row)
			    {	
			    	if($c > 0){			
					    // Insert into teststep while loop untill ts_steps column isn't last one for that $Row
					    // while(!empty($Row[4])){
					    if(!empty($Row[0])){

					    	$tc_name = $Row[0];    		
				    		$tc_id = md5($tc_name.$this->input->post('emailid').$this->input->post('appname').time());
				    		$tc_obj = $Row[1];
						    $tc_precondition = $Row[2];
						    $tc_suite = $Row[3];
							// Insert into testcase once only check with MD5 of test case name and if not available in table
							// Then only insert record of that test case

					    	$data = array(					    	
						    	"emailid" => $this->input->post('emailid'),
						    	"appname" => $this->input->post('appname'),
						    	"tc_id" => $tc_id,
						    	"tc_name" => $tc_name,
						    	"tc_obj" => $tc_obj,
						    	"tc_precondition" => $tc_precondition,
						    	"tc_suite" => $tc_suite
				 		    );

						    $this->db->insert('testcase', $data); 
						    if($this->db->affected_rows() > 0)
							{
								$flag = true;
							}else{
								$flag = false;
							}
					    	
					    	// Insert step 1 here 
					    	$data = array(					    	
						    	"tc_id" => $tc_id,
						    	"ts_steps" => $Row[4],
						    	"ts_step_desc" => $Row[5],
						    	"ts_action" => $Row[6],
						    	"ts_assert_resource_name" => $Row[7],
						    	"ts_resource_value" => $Row[8]
				 		    );

						    $this->db->insert('teststep', $data);
						    if($this->db->affected_rows() > 0)
							{
								$flag = true;
							}else{
								$flag = false;
								return false;
							}
					    }else{
					    	// Insert from step 2
					    	$data = array(					    	
						    	"tc_id" => $tc_id,
						    	"ts_steps" => $Row[4],
						    	"ts_step_desc" => $Row[5],
						    	"ts_action" => $Row[6],
						    	"ts_assert_resource_name" => $Row[7],
						    	"ts_resource_value" => $Row[8]
				 		    );

						    $this->db->insert('teststep', $data); 
						    if($this->db->affected_rows() > 0)
							{
								$flag = true;
							}else{
								$flag = false;
								return false;
							}
					    }
			        }
			        $c = $c + 1;
			    }
			    if($flag){
			    	return true;
			    }else{
			    	return false;
			    }

			}
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
	}

	public function getTestCaseList(){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$testcases = array();
		try {
		  	$this->load->database();
			$this->db->where('emailid', $this->session->userdata('sessionemailid'));
			$this->db->where('appname', $this->input->get('app'));
			$query = $this->db->get('testcase');
			
			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'tc_id' => $row->tc_id,
			    	'tc_name' => $row->tc_name,
			    	'tc_obj' => $row->tc_obj,
			    	'tc_precondition' => $row->tc_precondition,
			    	'tc_suite' => $row->tc_suite
			    );
			    $testcases[] = $temp;
			}
			return $testcases;
		}catch(Exception $e){
			var_dump($e->getMessage());
			return $testcases;
		}
	}


	function executeTestSuite(){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$testcases = array();
		try {
		  	$this->load->database();
			$this->db->where('emailid', $this->input->get('emailid'));
			$this->db->where('appname', $this->input->get('app'));
			$this->db->where('tc_suite', $this->input->get('suite'));
			$query = $this->db->get('testcase');
			
			$executionId = $this->getRandom();

			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'appName' => $this->input->get('app'),
			    	'emailid' => $this->input->get('emailid'),
			    	'executionId' => ''.$executionId.'',
			    	'browserType' => 'chrome',
			    	'browserVersion' => '53',
			    	'javascriptEnabled' => 'true',
			    	'tcId' => $row->tc_id,
			    	'tc_name' => $row->tc_name,
			    	'tc_obj' => $row->tc_obj,
			    	'tc_precondition' => $row->tc_precondition,
			    	'tc_suite' => $row->tc_suite,
			    	'tc_steps'=> $this->getteststeps((string)$row->tc_id)
			    );

			    $tcData = array(
			       'tc_id' => $row->tc_id,
				   'executionId' => $executionId,
				   'tc_status' => 'In Progress',
				   'ts_error_text' => '',
				   'time' => time()
				);
				$this->db->insert('testexecutionstatus', $tcData); 

			    $testcases[] = $temp;
			}
			$finalTestcaseArray = array('TestCases' => $testcases, 'Locators' => $this->getlocators($this->input->get('emailid'),$this->input->get('app')));


			if(!empty($testcases)){
				$data = array(
				   'executionId' => $executionId,
				   'testcaseobj' => json_encode($finalTestcaseArray),
				   'slave' => 'cloudmachine1'
				);
				$this->db->insert('testexecutionqueue', $data); 
				if($this->db->affected_rows() > 0)
				{
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
			//$finalLocatorsArray = array('Locators' => $this->getlocators($this->input->get('emailid'),$this->input->get('app')));
			//return json_encode($finalTestcaseArray);
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
	}


	// For POC Only
	function getJsonTestCase(){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$testcases = array();
		try {
		  	$this->load->database();
			$this->db->where('emailid', $this->input->get('emailid'));
			$this->db->where('appname', $this->input->get('app'));
			$this->db->where('tc_suite', $this->input->get('suite'));
			$query = $this->db->get('testcase');
			
			$executionId = $this->getRandom();

			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'appName' => $this->input->get('app'),
			    	'emailid' => $this->input->get('emailid'),
			    	'executionId' => ''.$executionId.'',
			    	'browserType' => 'chrome',
			    	'browserVersion' => '53',
			    	'javascriptEnabled' => 'true',
			    	'tcId' => $row->tc_id,
			    	'tc_name' => $row->tc_name,
			    	'tc_obj' => $row->tc_obj,
			    	'tc_precondition' => $row->tc_precondition,
			    	'tc_suite' => $row->tc_suite,
			    	'tc_steps'=> $this->getteststeps((string)$row->tc_id)
			    );

			    $tcData = array(
			       'tc_id' => $row->tc_id,
				   'executionId' => $executionId,
				   'tc_status' => 'In Progress',
				   'ts_error_text' => '',
				   'time' => time()
				);

			    $testcases[] = $temp;
			}
			$finalTestcaseArray = json_encode(array('TestCases' => $testcases, 'Locators' => $this->getlocators($this->input->get('emailid'),$this->input->get('app'))));
 			return $finalTestcaseArray;

			//$finalLocatorsArray = array('Locators' => $this->getlocators($this->input->get('emailid'),$this->input->get('app')));
			//return json_encode($finalTestcaseArray);
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
	}

	function getteststeps($id){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$teststeps = array();
		try {
		  	$this->load->database();
			$this->db->where('tc_id', $id);
			$query = $this->db->get('teststep');
			
			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'tc_id' => $row->tc_id,
			    	'desc' => $row->ts_step_desc,
			    	'action' => $row->ts_action,
			    	'resource_name' => $row->ts_assert_resource_name,
			    	'resource_value' => $row->ts_resource_value
			    );
			    $teststeps[] = $temp;
			}
			return $teststeps;
		}catch(Exception $e){
			var_dump($e->getMessage());
			return $teststeps;
		}
	}

	function getlocators($emailid, $appname){
		// You have to load array helper to use it in codeigniter
	    $this->load->helper('array');
		$resources = array();
		try {
		  	$this->load->database();
			$this->db->where('emailid', $emailid);
			$this->db->where('appname', $appname);
			$query = $this->db->get('testresource');
			
			foreach ($query->result() as $row)
			{
			    $temp = array(
			    	'name' => $row->testresource,
			    	'identifier' => $row->identifier,
			    	'identifierValue' => $row->value
			    );
			    $resources[] = $temp;
			}
			return $resources;
		}catch(Exception $e){
			var_dump($e->getMessage());
			return $resources;
		}
	}

	function gettccurrentstatus($tcId){
		try {
		  	$this->load->database();
			$this->db->where('tc_id', $tcId);
			$this->db->order_by("tc_id", "desc"); 
			$query = $this->db->get('testexecutionstatus');
			
			foreach ($query->result() as $row)
			{
		    	return $row->tc_status;
			}

			return "No Run";
		}catch(Exception $e){
			var_dump($e->getMessage());
			return "No Run";
		}
	}

	function getRandom(){
		date_default_timezone_set("UTC"); 
		return time();
	}
	

}

?>
