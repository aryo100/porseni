<?php

class Admin extends CI_Controller
{

  function __construct(){
    parent::__construct();
    $this->load->model('pm');
    if(($this->session->userdata('udhmasuk')==false && $this->session->tempdata('login') !== true) ||  $this->session->userdata('role')!='admin') {
      redirect('login');
    }
  }

  function index(){ 
    $data['title'] = "Dashboard";
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    // $this->load->view('layout/dashboard');
    $this->load->view('layout/footer');
    redirect('admin/view_atlet');
  }

  function view_atlet(){
    $data['title'] = "Daftar Atlet";
    $data['sql1']=$this->pm->atlet();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_atlet',$data);
    $this->load->view('layout/footer');
  }

  function view_pt(){
    $data['title'] = "Daftar Institusi";
    $data['sql1']=$this->pm->get_pt('');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_institusi',$data);
    $this->load->view('layout/footer');
  }

  function view_gallery(){
    $data['title'] = "Gallery";
    $data['sql1']=$this->pm->get_gallery();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_gallery',$data);
    $this->load->view('layout/footer');
  }

  function view_akun(){
    $data['title'] = "Data Akun";
    $data['sql1']=$this->pm->get_akun();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_akun',$data);
    $this->load->view('layout/footer');
  }

  function view_berita(){
    $data['title'] = "Daftar Berita";
    $data['sql1']=$this->pm->get_berita();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_berita',$data);
    $this->load->view('layout/footer');
  }

  function add_atlet(){
    $data['title'] = "Tambah data Atlet";
    $data['op'] = 'tambah';
    $data['atlet'] = $this->pm->get_atlet();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_atlet',$data);
    $this->load->view('layout/footer');
  }

  function add_akun(){
    $data['title'] = "Tambah data Akun";
    $data['op'] = 'tambah';
    $data['atlet'] = $this->pm->get_akun();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_akun',$data);
    $this->load->view('layout/footer');
  }

  function add_berita(){
    $data['title'] = "Tambah data Berita";
    $data['op'] = 'tambah';
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_berita',$data);
    $this->load->view('layout/footer');
  }

  function view_calendar()
  {
    $data['title'] = "Kalender event";
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_calendar');
    $this->load->view('layout/footer');
  }

  // public function randomKey($length) 
  // {
  //   $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));

  //   for($i=0; $i < $length; $i++) {
  //       $key .= $pool[mt_rand(0, count($pool) - 1)];
  //   }
  //   return $key;
  // }

  public function akun_simpan()
	{
		$op = $this->input->post('op');
    $id_akun = $this->input->post('id_akun');
		$username = $this->input->post('username');
    // $password = $this->input->post('password');
    $this->load->helper('string');
    $myfile = fopen("pass.txt", "a") or die("Unable to open file!");
    $password = random_string('alnum',7);
    $txt = $username."  ".$password."\r\n";
    fwrite($myfile, $txt);
    fclose($myfile);
		$pt = $this->input->post('pt');
		$data = array(
      'id_akun' => $id_akun,
      'username' => $username,
      'password' =>  md5($password),
      'pt' => $pt,
      'status' => 'institusi'
			);
		if ($op=="tambah") {
			$this->pm->simpan_akun($data);
		}else{
			$this->pm->update_akun($id_akun,$data);
		}
		redirect('admin/view_akun');
  }

  public function atlet_approve($id)
	{
    $data['status']='approved';
		$this->pm->approve($id,$data);
		redirect('admin/view_atlet');
  }

  public function atlet_unapprove($id)
	{
    $data['status']='unapproved';
		$this->pm->approve($id,$data);
		redirect('admin/view_atlet');
  }

  public function pt_approve($id)
	{
    $data1['status']='approved';
    $id_pt = $this->uri->segment(3);
    //use for send email
    $this->load->library('email');
    //use for random string
    $this->load->helper('string');

    // $password = $this->input->post('password');
    $get['akun'] = $this->pm->get_pt($id_pt);
    foreach ($get['akun'] as $obj1) {
      $username = $obj1->email;
      $pt = $obj1->nama_pt;
    }
    $password = random_string('alnum',7);
    $subject = 'Konfirmasi Akun PORSENI XII';
    // $message = '<p>Selamat Mail nya Berhasil Yey :) <br> Username : '.$username.'<br> Password : '.$password.'</p>';
    $body = 
    '<html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width">
        <title>720572 - Confirm your Tapwater email address</title>
        <style type="text/css">
        
          @media (min-width: 500px) {
            .avatar__media .media__fluid {
              margin-top: 3px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .button,
            .button__shadow {
              font-size: 16px !important;
              display: inline-block !important;
              width: auto !important;
            }
          }
    
    
          @media (min-width: 500px) {
            footer li {
              display: inline-block !important;
              margin-right: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt1--lg {
              margin-top: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt2--lg {
              margin-top: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt3--lg {
              margin-top: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt4--lg {
              margin-top: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb1--lg {
              margin-bottom: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb2--lg {
              margin-bottom: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb3--lg {
              margin-bottom: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb4--lg {
              margin-bottom: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt1--lg {
              padding-top: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt2--lg {
              padding-top: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt3--lg {
              padding-top: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt4--lg {
              padding-top: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb1--lg {
              padding-bottom: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb2--lg {
              padding-bottom: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb3--lg {
              padding-bottom: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb4--lg {
              padding-bottom: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            pre {
              font-size: 14px !important;
            }
            .body {
              font-size: 14px !important;
              line-height: 24px !important;
            }
            h1 {
              font-size: 22px !important;
            }
            h2 {
              font-size: 16px !important;
            }
            small {
              font-size: 12px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .user-content pre,
            .user-content code {
              font-size: 14px !important;
              line-height: 24px !important;
            }
            .user-content ul,
            .user-content ol,
            .user-content pre {
              margin-top: 12px !important;
              margin-bottom: 12px !important;
            }
            .user-content hr {
              margin: 12px 0 !important;
            }
            .user-content h1 {
              font-size: 22px !important;
            }
            .user-content h2 {
              font-size: 16px !important;
            }
            .user-content h3 {
              font-size: 14px !important;
            }
          }
        </style>
      </head>
  
      <body class="body" style="font-family: -apple-system, BlinkMacSystemFont, Roboto, Ubuntu, Helvetica, sans-serif; line-height: initial; max-width: 580px;">
        <header class="mt2 mb2" style="margin-bottom: 20px; margin-top: 20px;">
          <img src="assets/images/logo-porseni1.png" style="height: auto; width: 42px;">
        </header>
    
        <h1 style="box-sizing: border-box; font-size: 1.25rem; margin: 0; margin-bottom: 0.5em; padding: 0; color: #333;">Terima Kasih telah Mendaftar di PORSENI XII</h1>
        <p style="color: #999; box-sizing: border-box; margin: 0; margin-bottom: 0.5em; padding: 0; margin-bottom: 24px;">Berikut Ini Username dan Password yang dapat digunakan untuk login di website admin PORSENI XII 2018</p>
        
        <div style="padding: 12px 14px; border: 1px solid #dadada; margin-bottom: 24px; display: inline-block;">
          <div style="display: inline-block">
            <h2 style="color: #333; font-size: 16px; font-weight: 400; margin: 0;">Username</h2>
            <p style="color: #999; font-size: 14px; font-weight: 400; margin: 0;">'.$username.'</p>
          </div>
          
          <div style="display: inline-block; margin-left: 42px;">
              <h2 style="color: #333; font-size: 16px; font-weight: 400; margin: 0;">Password</h2>
              <p style="color: #999; font-size: 14px; font-weight: 400; margin: 0;">'.$password.'</p>
          </div>
        </div>
        
        <p class="db mb1 gray" style="box-sizing: border-box; color: #999; display: block; margin: 0; margin-bottom: 10px; padding: 0;">Harap Segera Login untuk memasukkan data mahasiswa yang akan mengikuti lomba PORSENI XII 2018. klik <a href="https://porseni.pnj.ac.id/index.php/login">Disini</a> untuk kehalaman login.</p>
        
        <footer class="mt2 mt4--lg" style="border-top: 1px solid #D9D9D9; margin-top: 20px; padding: 20px 0;">
          <ul style="box-sizing: border-box; list-style: none; margin: 0; margin-bottom: 0; padding: 0;">
            <li style="box-sizing: border-box; margin: 0; margin-bottom: 10px; padding: 0;">
              <small style="box-sizing: border-box; color: #999;"><a href="https://tapwater.co" style="border-bottom: 1px solid #E6E6E6; box-sizing: border-box; color: inherit; text-decoration: none;" target="_blank">PORSENI</a></small>
            </li>
            <li style="box-sizing: border-box; margin: 0; margin-bottom: 10px; padding: 0;">
              <small style="box-sizing: border-box; color: #999;"><a href="https://tapwater.co/privacy" style="border-bottom: 1px solid #E6E6E6; box-sizing: border-box; color: inherit; text-decoration: none;" target="_blank">Berita Terbaru</a></small>
            </li>
          </ul>
        </footer>
      </body>
    </html>';
    // Also, for getting full html you may use the following internal method:
    $body = $this->email->full_html($subject, $body);

    $result = $this->email
        ->from('porseni@pnj.ac.id')
        // ->reply_to('aryo100@gmail.com')    // Optional, an account where a human being reads.
        ->to($username)
        ->subject($subject)
        ->message($body)
        ->send();
    var_dump($result);
    echo '<br />';
    echo $this->email->print_debugger();

    $data = array(
      'username' => $username,
      'password' =>  md5($password),
      'id_user' => $id_pt,
      'pt' => $pt,
      'status' => 'institusi'
			);
    $this->pm->simpan_akun($data);
		$this->pm->unapprove($id_pt,$data1);
		// redirect('admin/view_pt');
  }

  public function pt_unapprove($id)
	{
    $id_pt = $this->uri->segment(3);
    $data['status']='unapproved';
    $this->pm->unapprove($id,$data);
    $cok;
		// redirect('admin/view_pt');
  }

  public function berita_simpan()
	{
    $op = $this->input->post('op');
    // upload foto
    $config['upload_path'] = realpath(APPPATH . '../assets/upload/berita');
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;//~mb
    $config['max_width'] = 2732;//~px
    $config['max_height'] = 1536;//~px
    $this->load->library('upload',$config);

    if($this->upload->do_upload('foto')){
      $data1['gambar'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    $id_berita = $this->input->post('id_berita');
		$judul = $this->input->post('judul');
    $content = $this->input->post('content');
    $foto = $data1['gambar'];
		$data = array(
      'id_berita' => $id_berita,
      'judul' => $judul,
      'content' => $content
      );
      
    if($foto != ""){
      $data['foto'] = $foto;
    }

		if ($op=="tambah") {
			$this->pm->simpan_berita($data);
		}else{
			$this->pm->update_berita($id_berita,$data);
		}
		redirect('admin/view_berita');
  }

  public function gallery_simpan()
	{
    // upload foto
    $config['upload_path'] = realpath(APPPATH . '../assets/upload/galeri');
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;//~mb
    $config['max_width'] = 2732;//~px
    $config['max_height'] = 1536;//~px
    $this->load->library('upload',$config);

    if($this->upload->do_upload('file')){
      $data1['gambar'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    $foto = $data1['gambar'];
		$data = array(
      'id_gambar'=>'',
      'nama_g' => $foto,
      'alamat_g' => '../assets/upload/galeri'
      );

    $this->pm->simpan_galeri($data);
		
		redirect('admin/view_gallery');
  }

	public function berita_hapus($id){
		$this->pm->hapus_berita($id);
		redirect('admin/view_berita');
  }
  
  public function akun_hapus($id){
		$this->pm->hapus_akun($id);
		redirect('admin/view_akun');
	}

  public function berita_edit($id){
    $data['title'] = "Edit data Berita";
		$data['op'] = 'edit';
		$data['sql'] = $this->pm->edit_berita($id);
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_berita',$data);
    $this->load->view('layout/footer');
  }

  public function view_kelas(){
    $data['title'] = "kelas";
    $data['sql'] = $this->pm->get_kelas();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_kelas',$data);
    $this->load->view('layout/footer');
  }

  public function hapus_kelas($id){
		$this->pm->hapus_kelas($id);
		redirect('admin/view_kelas');
	}

  public function simpan_kelas(){
    $kelas = $this->input->post('kelas');
    $data['nama_kelas'] = $kelas;
    $this->pm->simpan_kelas($data);
    redirect('admin/view_kelas');
  }

  public function view_mapel(){
    $data['title'] = "mata pelajaran";
    $data['sql'] = $this->pm->get_mata_pelajaran();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_mapel',$data);
    $this->load->view('layout/footer');
  }

  public function hapus_mapel($id){
		$this->pm->hapus_mapel($id);
		redirect('admin/view_mapel');
	}

  public function simpan_mapel(){
    $mapel = $this->input->post('mapel');
    $data['nama_mapel'] = $mapel;
    $this->pm->simpan_mapel($data);
    redirect('admin/view_mapel');
  }

  public function atlet_data_lengkap()
  {
    $data['title'] = "Data Lengkap Atlet";
    $data['sql']=$this->pm->detail_atlet($this->uri->segment(3));
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_data_lengkap',$data);
    $this->load->view('layout/footer');
  }

  public function siswa_data_lengkap()
  {
    $data['title'] = "Data Lengkap Siswa";
    $data['sql']=$this->pm->detail_Siswa($this->uri->segment(3));
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_data_lengkap_siswa',$data);
    $this->load->view('layout/footer');
  }

}
?>
