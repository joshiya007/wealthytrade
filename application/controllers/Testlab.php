<?php

class Testlab extends CI_Controller{


  public function index(){
  	if(!empty($this->session->userdata('sessiontoken'))){

  		$this->load->model('applicationsmodel');
    	$data['testsuitesdata'] = $this->applicationsmodel->getTestSuiteList();

      $this->load->model('testmanagermodel');
      $data['testcasedata'] = $this->testmanagermodel->getTestCaseList();
      
  		$this->load->view('testlab' , $data);

  	}else{
  		$data = "failure";
		  $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
  		$this->load->view('login');
  	}
  }

  public function addtestsuite(){
    if(!empty($this->session->userdata('sessiontoken'))){
      $this->load->model('applicationsmodel');
      
        $status = $this->applicationsmodel->addtestsuite();
        if($status){
          $data = "success";
          $this->session->set_flashdata('testsuitecreatestatus',$data);   // send test suite successfully created status to view throught $data 
        }else{
          $data = "failure";
          $this->session->set_flashdata('testsuitecreatestatus',$data);   // send test suite creation failed status to view throught $data 
        }
        redirect('testlab?app='. $this->input->post('appname'));
      }else{
        $data = "failure";
        $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
        $this->load->view('login');
    }
  }

  function testexecute(){
    $this->load->model('testmanagermodel');
    echo $this->testmanagermodel->getJsonTestCase();
  }


  function executesuite(){
    $this->load->model(testmanagermodel);
    if($this->testmanagermodel->executeTestSuite()){
      $data = "success";
      $this->session->set_flashdata('executionstartstatus',$data);   // send user sign up successfully status to view throught $data 
      redirect('testlab?app='. $this->input->get('app'),$data);
    }else{
      $data = "failure";
      $this->session->set_flashdata('executionstartstatus',$data);   // send user sign up successfully status to view throught $data 
      redirect('testlab?app='. $this->input->get('app'),$data);
    }
  }

}


?>
