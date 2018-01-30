<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Madmin');
	}

	public function index()
	{
		$this->load->view('login/vlogin');
	}


	public function daftar(){

		$this->load->view('login/vdaftar');
	}

	public function ProsesLogin(){
		$user = $this->input->post('email');
		$pass = md5($this->input->post('password'));
		$where=array(
			'email' => $user,
			'password' => $pass 
			);

		// $cek= $this->Mpenjual->getuser('where email="'.$user.'" and password="'.$pass.'"')->result_array();
		$cek= $this->Madmin->getuser($where)->result_array();
		if ($cek) {
			$data_session = array(
				'email' => $user,
				'id_admin' => $cek[0]['id_admin'],
			
				'status' => 'login'
				);
			$this->session->set_userdata($data_session);
			redirect('cadmin','refresh');
		}
		else{
			echo "<script>alert('email atau password salah silahkan ulangi kembali..!');</script>";
			$this->load->view('login/vdaftar');
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */