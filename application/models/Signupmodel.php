<?php

class Signupmodel extends CI_Model{


	public function inserUser(){
		try { 
		  	$this->load->database();
		  	
		  	$pwd_hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		  	$data = array(
			   'name' => $this->input->post('name') ,
			   'emailid' => $this->input->post('email') ,
			   'password' => $pwd_hash
			);
			$this->db->insert('user', $data); 
			if($this->db->affected_rows() > 0)
			{
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
	}

}

?>
