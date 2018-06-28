<?php
Class Pdf_atlet extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }

    function index(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(270,7,'Data Atlet',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(270,7,'Yohanes A M @ M Aryo Mujahid',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,10,'NIM/NPM',1,0);
        $pdf->Cell(50,10,'Nama Lengkap',1,0);
        $pdf->Cell(10,10,'TTL',1,1);
        $pdf->Cell(12,10,'Jenis Kelamin',1,0);
        $pdf->Cell(85,10,'Cabang Olahraga',1,0);
        $pdf->Cell(85,10,'Perguruan Tinggi',1,0);
        $pdf->Cell(85,10,'Email',1,0);
        $pdf->Cell(85,10,'No. Telp',1,0);
        $pdf->Cell(85,10,'Status',1,0);
        $pdf->SetFont('Arial','',10);
        $sql=$this->db->query("SELECT* FROM atlet");
        $atlet = $sql->result();
        foreach ($atlet as $row){
            $pdf->Cell(30,10,$row->npm,1,0);
            $pdf->Cell(50,10,$row->nama,1,0);
            $pdf->Cell(10,10,$row->tanggal_lahir,1,1);
            $pdf->Cell(85,10,$row->gender,1,0);
            $pdf->Cell(85,10,$row->pt,1,0);
            $pdf->Cell(85,10,$row->email,1,0);
            $pdf->Cell(85,10,$row->no_hp,1,0);
        }
        $pdf->Output();
    }
}
