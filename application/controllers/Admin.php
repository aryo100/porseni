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
    $data['sql1']=$this->pm->get_pt();
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
    $data['status']='approved';
		$this->pm->unapprove($id,$data);
		redirect('admin/view_pt');
  }

  public function pt_unapprove($id)
	{
    $data['status']='unapproved';
		$this->pm->unapprove($id,$data);
		redirect('admin/view_pt');
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
			$this->pm->update_berita($id_akun,$data);
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
