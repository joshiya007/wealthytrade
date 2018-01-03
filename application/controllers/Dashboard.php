<?php

class Dashboard extends CI_Controller{


  public function index(){
  	if(!empty($this->session->userdata('sessiontoken'))){
  		$this->load->model('dashboardmodel');
    	$data['applistdata'] = $this->dashboardmodel->getAppList();

  		$this->load->view('dashboard',$data);   // load dashboard view	
  	}else{
  		$data = "failure";
		  $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
  		$this->load->view('login');
  	}
  }
}


?>
