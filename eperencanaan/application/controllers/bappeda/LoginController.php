<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('MyConfig');
		
    }
    
    public function login($setDomain){
		$this->myconfig->header($setDomain);
		$this->load->library('encryption');
		
		$status = false;
		
        $username = $this->input->post('user');
		$pass = $this->input->post('pass');
		// echo "sdf";
		if($this->input->post()){
			// print_r($this->input->post());
			$this->db->where('username', $username);
			$user = $this->db->get('ref_users')->row();
			if($user){
				if (password_verify($pass, $user->password)) {
					// $this->AkunModel->userRiwayat($user->id);
                    $userLevel = $user->level_id;
                    $userAkun = $user->akun_id;
					if($userLevel != 0)
						$status = true;
				}
			}
		}
		if($status){
			
			$dataSession = array(
                'id' => $user->user_id,
                'level' => $userLevel,
                'akun' => $user->akun_id,
				'status' => true,
				'domain' => $setDomain,
			);
            $this->session->set_userdata($dataSession);
            if($user->akun_id == 3){
                redirect(base_url("bappeda"));
            }else if($user->akun_id == 4){
                redirect(base_url("opd"));
            }
		}else{
			redirect(base_url("login"));
		}
    }
}