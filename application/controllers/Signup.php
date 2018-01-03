<?php

class Signup extends CI_Controller{


  public function index(){
    $this->load->view('signup');   // load login view
  }

  public function insert(){
  	$this->load->model('signupmodel');	// load signupmodel module 
  	$status = $this->signupmodel->inserUser();	// calling inserUser() method from signupmodel module
  	if($status)
	{
		$data = "success";
		$this->session->set_flashdata('signupstatus',$data);   // send user sign up successfully status to view throught $data 
		redirect('login',$data);
	}else{
		$data = "failure";
		$this->session->set_flashdata('signupstatus',$data);	// send user sign up failed status to view throught $data
		redirect('login',$data);
	}
  }  

}


?>
