<?php

class Testresource extends CI_Controller{


  public function index(){
  	if(!empty($this->session->userdata('sessiontoken'))){

  		$this->load->model('applicationsmodel');
    	$data['testresourcedata'] = $this->applicationsmodel->getTestResourceList();
  		$this->load->view('testresource' , $data);

  	}else{
  		$data = "failure";
		  $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
  		$this->load->view('login');
  	}
  }

  public function addtestresource(){
    if(!empty($this->session->userdata('sessiontoken'))){
      $this->load->model('applicationsmodel');
      
        $status = $this->applicationsmodel->addtestresource();
        if($status){
          $data = "success";
          $this->session->set_flashdata('testresourcecreatestatus',$data);   // send test suite successfully created status to view throught $data 
        }else{
          $data = "failure";
          $this->session->set_flashdata('testresourcecreatestatus',$data);   // send test suite creation failed status to view throught $data 
        }
        redirect('testresource?app='. $this->input->post('appname'));
      }else{
        $data = "failure";
        $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
        $this->load->view('login');
    }
  }


  public function updateordeletetestresource(){
    if(!empty($this->session->userdata('sessiontoken'))){
      if(isset($_POST['update'])){ 
        $this->load->model('applicationsmodel');
      
        $status = $this->applicationsmodel->updatetestresource();
        if($status){
          $data = "success";
          $this->session->set_flashdata('testresourceupdatestatus',$data);   // send test suite successfully created status to view throught $data 
        }else{
          $data = "failure";
          $this->session->set_flashdata('testresourceupdatestatus',$data);   // send test suite creation failed status to view throught $data 
        }
        redirect('testresource?app='. $this->input->post('appname'));

      }else if(isset($_POST['delete'])){ 
        $this->load->model('applicationsmodel');
      
        $status = $this->applicationsmodel->deletetestresource();
        if($status){
          $data = "success";
          $this->session->set_flashdata('testresourcedeletestatus',$data);   // send test suite successfully created status to view throught $data 
        }else{
          $data = "failure";
          $this->session->set_flashdata('testresourcedeletestatus',$data);   // send test suite creation failed status to view throught $data 
        }
        redirect('testresource?app='. $this->input->post('appname'));
      }
    }else{
      $data = "failure";
      $this->session->set_flashdata('sessionexpire',$data);   // User login session not available or is expired 
      $this->load->view('login');
    }
  }
}


?>
