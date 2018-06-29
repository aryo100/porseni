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

	function regis(){
		if (isset($_POST['regis'])) {

			// upload foto
			$config['upload_path'] = realpath(APPPATH . '../assets/upload/ss');
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2048;//~mb
			$config['max_width'] = 2732;//~px
			$config['max_height'] = 1536;//~px
			$this->load->library('upload',$config);

			if($this->upload->do_upload('ss')){
			$ss['bukti'] = $this->upload->data('file_name');
			}else{
			echo $this->upload->display_errors();
			}
			$this->session->set_flashdata('error_status', 'success');

			$email=$this->input->post('email',true);
			$nama_pt=$this->input->post('nama_pt',true);
			$alamat=$this->input->post('alamat',true);
			$no_telp_pt=$this->input->post('no_telp_pt',true);
			$no_telp_pj=$this->input->post('no_telp_kon',true);
			$nama_pj=$this->input->post('nama_pj',true);
			$ss_bukti_pay =$ss['bukti'];

			$data = array(
				'email' => $email,
				'nama_pt' => $nama_pt,
				'nama_pj' => $nama_pj,
				'alamat_pt' =>  $alamat,
				'no_telp_pt' => $no_telp_pt,
				'no_telp_pj' => $no_telp_pj
			);

			$data['ss_bukti_pay'] = $ss_bukti_pay;

			$this->pm->simpan_pt($data);
			echo '
			<html>
				<style>
				::selection { background-color: #E13300; color: white; }
				::-moz-selection { background-color: #E13300; color: white; }

				body {
					background-color: #fff;
					margin: 40px;
					font: 13px/20px normal Helvetica, Arial, sans-serif;
					color: #4F5155;
				}

				a {
					color: #003399;
					background-color: transparent;
					font-weight: normal;
				}

				h1 {
					color: #444;
					background-color: transparent;
					border-bottom: 1px solid #D0D0D0;
					font-size: 19px;
					font-weight: normal;
					margin: 0 0 14px 0;
					padding: 14px 15px 10px 15px;
				}

				code {
					font-family: Consolas, Monaco, Courier New, Courier, monospace;
					font-size: 12px;
					background-color: #f9f9f9;
					border: 1px solid #D0D0D0;
					color: #002166;
					display: block;
					margin: 14px 0 14px 0;
					padding: 12px 10px 12px 10px;
				}

				#container {
					margin: 10px;
					border: 1px solid #D0D0D0;
					box-shadow: 0 0 8px #D0D0D0;
				}

				p {
					margin: 12px 15px 12px 15px;
				}
				</style>
				<body>
					<div>
						<h1>
							Terima Kasih telah Mendaftar
						</h1>
						<p>
							Data telah berhasil Terkirim, Akun untuk pendaftaran peserta<br>
							PORSENI XII akan segera dikirim lewat email yang sudah diberikan.
							<br>
							<br>
							Terima kasih.
							<br>
							<a href="..">Back</a>
						</p>
					</div>

				</body>
			</html>
			';

			$this->load->library('email');

			$subject = 'This is a test';
			$message = '<p>This message has been sent for testing purposes.</p>';

			// Get full html:
			$body ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			 <html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
				    <title>' . html_escape($subject) . '</title>
				    <style type="text/css">
				        body {
				            font-family: Arial, Verdana, Helvetica, sans-serif;
				            font-size: 16px;
				        }
				    </style>
				</head>
				
				<body>
				' . $message . '
				</body>
			</html>';


			$result = $this->email
			    ->from('yourusername@gmail.com')
			    ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
			    ->to('therecipient@otherdomain.com')
			    ->subject($subject)
			    ->message($body)
			    ->send();

			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();

exit;
		}
	}

	function keluar(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
