<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect('auth');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['siswa'] = $this->siswa->GetSiswaByid($id_user)->row_array();
        $data['prakrin'] = $this->prakrin->GetPrakrinSiswa($data['siswa']['nisn'])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('siswa/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function nilai()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['siswa'] = $this->siswa->GetSiswaByid($id_user)->row_array();
        $data['nilai'] = $this->penilaian->NilaiByNisn($data['siswa']['nisn'])->result_array();
        $data['prakrin'] = $this->prakrin->GetPrakrinSiswa($data['siswa']['nisn'])->row_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer', $data);
    }


    public function print($id_prakrin = null)
    {
        if ($id_prakrin == null) {
            redirect('siswa/penilaian', 'refresh');
        }
        $data['siswa'] = $this->prakrin->GetPrakrinById($id_prakrin)->row_array();
        if ($data['siswa'] == null) {
            redirect('siswa/penilaian', 'refresh');
        }
        $data['nilai'] = $this->penilaian->NilaiByNisn($data['siswa']['nisn'])->result_array();
        $data['title'] = 'Penilaian Siswa';
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $data['guru'] = $this->penilaian->NilaiByNisn($data['siswa']['nisn'])->row_array();
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->set_option('isHtml5ParserEnabled', TRUE);
        $this->pdf->set_option('isPhpEnabled', TRUE);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = $data['siswa']['nama_siswa'] . ".pdf";
        $this->pdf->load_view('siswa/print', $data);
    }
}

/* End of file Siswa.php */
