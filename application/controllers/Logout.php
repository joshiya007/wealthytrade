<?php

class Logout extends CI_Controller{


  public function index(){
  	$this->session->unset_userdata('sessiontoken');
  	$this->session->unset_userdata('sessionusername');
  	$this->session->unset_userdata('sessionemailid');
    $this->load->view('login');   // load login view
  }
}


?>
