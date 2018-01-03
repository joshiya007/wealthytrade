<?php

class Loginmodel extends CI_Model{


	public function userlogin(){
		try {
		  	$this->load->database();
		  	//load the session library
			$this->load->driver('session');
			
			$pwd_hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			log_message('debug',$pwd_hash);

			$this->db->select('name,emailid,password');
			$this->db->from('user');
			$this->db->where('emailid', $this->input->post('emailid'));

			$getuserquery = $this->db->get();
			
			$usersession = "";	

			if($getuserquery->num_rows() === 1)
			{	$verify = false;
				foreach($getuserquery->result() as $row){
					$verify = password_verify( $this->input->post('password'), $row->password);
				}
				if($verify){
					$sessiontoken = bin2hex(openssl_random_pseudo_bytes(16));
				    $sessionusername = $getuserquery->row()->name;
				    $sessionemailid = $getuserquery->row()->emailid;
				    $this->session->set_userdata('sessiontoken', $sessiontoken);
				    $this->session->set_userdata('sessionusername', $sessionusername);
				    $this->session->set_userdata('sessionemailid', $sessionemailid);
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

}

?>
