<?php

class Testmanager extends CI_Controller{


  public function index(){
  	if(!empty($this->session->userdata('sessiontoken'))){

  		$this->load->model('testmanagermodel');
    	$data['testcasedata'] = $this->testmanagermodel->getTestCaseList();

  		$this->load->view('testmanager', $data);

  	}else{
  		$data = "failure";
		  $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
  		$this->load->view('login');
  	}
  }

  public function testcasefromexcel(){
    if(!empty($this->session->userdata('sessiontoken'))){

      $this->load->model('testmanagermodel');
      $status = $this->testmanagermodel->importFromExcel();
      
      if($status){
        $data = "success";
        $this->session->set_flashdata('testcaseuploadstatus',$data);   // send test suite successfully created status to view throught $data 
      }else{
        $data = "failure";
        $this->session->set_flashdata('testcaseuploadstatus',$data);   // send test suite creation failed status to view throught $data 
      }
      redirect('testmanager?app='. $this->input->post('appname'));
    }else{
      $data = "failure";
      $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
      $this->load->view('login');
    }
  }


  public function test(){
    $this->load->model('testmanagermodel');
    $this->testmanagermodel->testExecute();
  }
}


?>
