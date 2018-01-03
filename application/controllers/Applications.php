<?php

class Applications extends CI_Controller{

  

  public function index(){
    if(!empty($this->session->userdata('sessiontoken'))){
      $this->load->model('applicationsmodel');
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
      	$status = $this->applicationsmodel->createApplication();
      	if($status){
      		$data = "success";
      	  $this->session->set_flashdata('appcreatestatus',$data);   // send application successfully created status to view throught $data 
      	}else{
        	$data = "failure";
        	$this->session->set_flashdata('appcreatestatus',$data);   // send application creation failed status to view throught $data 
      	}
      	redirect('dashboard');
      }else{
        $data = "failure";
        $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
        $this->load->view('login');
      }
    }
  }

  public function deleteapp(){
    if(!empty($this->session->userdata('sessiontoken'))){
      $this->load->model('applicationsmodel');
      $status = $this->applicationsmodel->deleteapplication();
        if($status){
          $data = "success";
          $this->session->set_flashdata('appdeletestatus',$data);   // send application successfully created status to view throught $data 
        }else{
          $data = "failure";
          $this->session->set_flashdata('appdeletestatus',$data);   // send application creation failed status to view throught $data 
        }
        redirect('dashboard');
    }
  }

  

  
  
}


?>
