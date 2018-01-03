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
			if($this->userExist($this->input->post('name'))){
				$this->db->insert('user', $data); 
				if($this->db->affected_rows() > 0)
				{
					return true;
				}else{
					return false;
				}	
			}else{
				return false;
			}
			
			
		}catch(Exception $e){
			var_dump($e->getMessage());
			return false;
		}
	}


	function userExist($key)
	{
	    $this->db->where('emailid',$key);
	    $query = $this->db->get('user');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

}

?>
