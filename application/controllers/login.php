<?php

class Login extends CI_Controller{


  public function index(){
    $sessionToken = $this->session->userdata('sessiontoken');
    if(!empty($sessiontoken)){
      redirect('dashboard');   // load login view  
    }else{
      $this->load->view('login');
    }
  }

  public function userlogin(){
  	$this->load->model('loginmodel');	// load loginmodel module 
  	$status = $this->loginmodel->userlogin();	// calling userlogin() method from loginmodel module
  	log_message('debug', 'Authentication Status recieved : '. $status);
	  if($status){
  		redirect('dashboard');   // After successful login goto User dashboard page	
  	}else{
  		$data = "failure";
		$this->session->set_flashdata('loginstatus',$data);   // send user login failure status to view throught $data 
  		redirect('login');// After failure login goto User login page again with error message	
  	}
  }  

 
}

?>
