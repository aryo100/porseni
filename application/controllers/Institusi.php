<?php

class Institusi extends CI_Controller
{

  function __construct(){
    parent::__construct();
    $this->load->model('pm');
    if (($this->session->userdata('udhmasuk')==false && $this->session->tempdata('login') !== true) ||  $this->session->userdata('role')!='institusi') {
      redirect('login');
    }
  }

  function index(){
    redirect('institusi/view_atlet');
  }

  function view_atlet(){
    $data['title'] = "Daftar Atlet";
    $data['sql1']=$this->pm->get_atlet($this->session->userdata('kampus'));
    $data['sql2']=$this->pm->get_pt($this->session->userdata('id'));
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/institusi_view_data_atlet',$data);
    $this->load->view('layout/footer');
  }

  function add_atlet(){
    $data['title'] = "Tambah data Atlet";
    $data['op'] = 'tambah';
    $data['atlet'] = $this->pm->get_atlet($this->session->userdata('kampus'));
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/institusi_add_data_atlet',$data);
    $this->load->view('layout/footer');
  }

  function add_siswa(){
    $data['title'] = "Tambah data Siswa";
    $data['op'] = 'tambah';
    $data['kelas'] = $this->pm->get_kelas();
    $data['ortu'] = $this->pm->get_ortu();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_siswa',$data);
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
  
  public function atlet_simpan()
	{
		$op = $this->input->post('op');
    
    //upload foto
    $config['upload_path'] = realpath(APPPATH . '../assets/upload/foto');
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;//~mb
    $config['max_width'] = 2732;//~px
    $config['max_height'] = 1536;//~px
    $this->load->library('upload',$config);

    if($this->upload->do_upload('foto')){
      $files = $this->upload->data('file_name');
      $data1['gambar'] = $files;
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    //upload ss
    $config1['upload_path'] = realpath(APPPATH . '../assets/upload/ss');
    $config1['allowed_types'] = 'gif|jpg|png';
    $config1['max_size'] = 2048;//~mb
    $this->upload->initialize($config1);

    if($this->upload->do_upload('ss_forlap')){
      $data1['ss_forlap'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    $config1['upload_path'] = realpath(APPPATH . '../assets/upload/ss');
    $config1['allowed_types'] = 'gif|jpg|png';
    $config1['max_size'] = 2048;//~mb
    $this->upload->initialize($config1);

    if($this->upload->do_upload('ss_ktm')){
      $data1['ss_ktm'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    $config1['upload_path'] = realpath(APPPATH . '../assets/upload/ss');
    $config1['allowed_types'] = 'gif|jpg|png';
    $config1['max_size'] = 2048;//~mb
    $this->upload->initialize($config1);

    if($this->upload->do_upload('ss_ktp')){
      $data1['ss_ktp'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    $id_atlet = $this->input->post('id_atlet');
    $nama = $this->input->post('nama');
    $npm = $this->input->post('npm');
    $gender = $this->input->post('gender');
    $berat = $this->input->post('berat');
    $tinggi = $this->input->post('tinggi');
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $email = $this->input->post('email');
    $no_hp = $this->input->post('no_hp');
    $pt = $this->session->userdata('kampus');
    $foto = $data1['gambar'];
    $ss_forlap = $data1['ss_forlap'];
    $ss_ktp = $data1['ss_ktp'];
    $ss_ktm = $data1['ss_ktm'];
    // $ss = $this->input->post('ss');
    $cabang = $this->input->post('cabang');
		$data = array(
      'nama' => $nama,
      'npm' => $npm,
      'gender' => $gender,
      'berat' => $berat,
      'tinggi' => $tinggi,
      'tanggal_lahir' => $tanggal_lahir,
      'email' => $email,
      'no_hp' => $no_hp,
      'pt' => $pt,
      'cabang' => $cabang,
      'status' => ''
    );
    if($foto != ""){
      $data['foto'] = $foto;
    }
    if($ss_forlap != ""){
      $data['ss_forlap'] = $ss_forlap;
    }
    if($ss_ktm != ""){
      $data['ss_ktm'] = $ss_ktm;
    }
    if($ss_ktp != ""){
      $data['ss_ktp'] = $ss_ktp;
    }
    // redirect('institusi/asal/'.$foto.'/'.$data['ss']);
    if ($op=="tambah") {
      $this->pm->simpan_atlet($data);
		}else{
			$this->pm->update_atlet($id_atlet,$data);
		}
		redirect('institusi/view_atlet');
  }
  
	public function atlet_hapus($id){
		$this->pm->hapus_atlet($id);
		redirect('institusi/view_atlet');
	}

	public function atlet_edit($id){
    $data['title'] = "Edit data Atlet";
		$data['op'] = 'edit';
		$data['sql'] = $this->pm->edit_atlet($id);
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/institusi_add_data_atlet',$data);
    $this->load->view('layout/footer');
	}

  public function bukti_atlet_simpan()
	{
    // upload foto
    $n_atlet = $this->input->post('jml_atlet');
    $config['upload_path'] = realpath(APPPATH . '../assets/upload/galeri');
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;//~mb
    $this->load->library('upload',$config);

    if($this->upload->do_upload('file')){
      $data1['gambar'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    $foto = $data1['gambar'];
		$data = array(
      'ss_bukti_atlet' => $foto,
      'n_atlet' => $n_atlet
      );
    echo $data['ss_bukti_atlet'].' '.$this->session->userdata('id');

    $this->pm->unapprove($this->session->userdata('id'),$data);
		
		// redirect('institusi/view_atlet');
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
    $this->load->view('pages/institusi_data_lengkap',$data);
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

  public function saveData()	{
    

    redirect('institusi/view_atlet');
  }
}
?>
