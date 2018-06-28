<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pm');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	function ceklogin(){
		if (isset($_POST['login'])) {
			$user=$this->input->post('user',true);
			$pass=md5($this->input->post('pass',true));
			$cek=$this->pm->proseslogin($user, $pass);
			$hasil=count($cek);
			if ($hasil > 0) {
				$yglogin=$this->db->get_where('akun',array('username'=>$user, 'password'=>$pass))->row();
				$data = array('udhmasuk' => true,
				'username'=>$yglogin->username,
				'kampus' => $yglogin->pt,
				'role' => $yglogin->status);
				$this->session->set_userdata($data);
				$this->session->set_tempdata('login', true, 810);
				if ($yglogin->status == 'admin') {
					redirect('admin');
				}elseif ($yglogin->status == 'institusi') {
					redirect('institusi');
				}
				else{
					echo "<script type='text/javascript'>alert ('Maaf Username Dan Password Anda Salah !');
				document.location='index';
				</script>";
				}
			}else {
				echo "<script type='text/javascript'>alert ('Maaf Username Dan Password Anda Salah !');
				document.location='index';
				</script>";
			}
		}
	}

	function keluar(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
