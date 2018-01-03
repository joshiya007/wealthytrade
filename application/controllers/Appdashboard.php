<?php

class Appdashboard extends CI_Controller{


  public function index(){
  	if(!empty($this->session->userdata('sessiontoken'))){
  		$this->load->view('appdashboard');
  	}else{
  		$data = "failure";
		  $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
  		$this->load->view('login');
  	}
  }
}


?>
