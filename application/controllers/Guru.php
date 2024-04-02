<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'guru') {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect('auth');
        }
    }


    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['siswa'] = $this->prakrin->GetPrakrinAktifByGuru($data['guru']['id_guru'])->result_array();
        $data['siswaa'] = $this->prakrin->GetPrakrinNonktifByGuru($data['guru']['id_guru'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    // ------------------------------------------------------------------------
    // Penilaian
    // ------------------------------------------------------------------------

    public function penilaian()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['prakrin'] = $this->prakrin->GetPrakrinAktifByGuru($data['guru']['id_guru'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/penilaian/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahnilai($id_prakrin = null)
    {
        if ($id_prakrin == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $data['siswa'] = $this->prakrin->GetPrakrinAktifById($id_prakrin)->row_array();
        if ($data['siswa'] == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->form_validation->set_rules('nisn', 'nisn', 'trim|required');
        $this->form_validation->set_rules('id_guru', 'id_guru', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim|required');
        $this->form_validation->set_rules('id_sekolah', 'id_sekolah', 'trim|required');
        $this->form_validation->set_rules('nilai[]', 'nilai', 'trim|required|max_length[3]', [
            'max_length' => 'Nilai melebihi 3 digit angka'
        ]);
        $this->form_validation->set_rules('id_mapel[]', 'id_mapel', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('guru/penilaian/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_mapel = count($this->input->post('id_mapel'));
            $id_guru = htmlspecialchars($this->input->post('id_guru'));
            $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
            $id_sekolah = htmlspecialchars($this->input->post('id_sekolah'));
            $nisn = htmlspecialchars($this->input->post('nisn'));
            $nilai_predikat = $this->predikat->GetPredikat()->result_array();
            for ($i = 0; $i < $id_mapel; $i++) {
                $nilai[$i] = $this->input->post('nilai[' . $i . ']');
                if ($nilai[$i] >= 101) {
                    $this->session->set_flashdata('gagal', 'Nilai inputan melebihi 100');
                    redirect('guru/tambahnilai/' . $id_prakrin, 'refresh');
                }
            }
            for ($i = 0; $i < $id_mapel; $i++) {
                $nilai[$i] = $this->input->post('nilai[' . $i . ']');
                if ($nilai[$i] >= $nilai_predikat[0]['nilai1'] and $nilai[$i] <= $nilai_predikat[0]['nilai2']) {
                    $predikat[$i] = $nilai_predikat[0]['predikat'];
                } elseif ($nilai[$i] >= $nilai_predikat[1]['nilai1'] and $nilai[$i] <= $nilai_predikat[1]['nilai2']) {
                    $predikat[$i] = $nilai_predikat[1]['predikat'];
                } elseif ($nilai[$i] >= $nilai_predikat[2]['nilai1'] and $nilai[$i] <= $nilai_predikat[2]['nilai2']) {
                    $predikat[$i] = $nilai_predikat[2]['predikat'];
                } else {
                    $predikat[$i] =  $nilai_predikat[3]['predikat'];
                }
                $data[$i] = [
                    'nisn' => $nisn,
                    'id_mapel' => $this->input->post('id_mapel[' . $i . ']'),
                    'id_guru' => $id_guru,
                    'id_kelas' => $id_kelas,
                    'id_sekolah' => $id_sekolah,
                    'nilai' => $nilai[$i],
                    'predikat_nilai' => $predikat[$i]
                ];
                $this->mm->tambah_data('tb_nilai', $data[$i]);
            }
            $data = ['penilaian' => 1];
            $where = ['nisn' => intval($nisn)];
            $this->mm->edit_data('tb_siswa', $where, $data);
            $this->session->set_flashdata('pesan', 'Tambah nilai berhasil');

            redirect('guru/nilai/' . $id_prakrin, 'refresh');
        }
    }

    public function editnilai($id_prakrin = null)
    {
        if ($id_prakrin == null) {
            redirect('guru/penilaian', 'refresh');
        }

        if ($id_prakrin == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $data['siswa'] = $this->prakrin->GetPrakrinById($id_prakrin)->row_array();
        if ($data['siswa'] == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['nilai'] = $this->penilaian->NilaiByNisn($data['siswa']['nisn'])->result_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->form_validation->set_rules('nisn', 'nisn', 'trim|required');
        $this->form_validation->set_rules('id_guru', 'id_guru', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim|required');
        $this->form_validation->set_rules('id_sekolah', 'id_sekolah', 'trim|required');
        $this->form_validation->set_rules('nilai[]', 'nilai', 'trim|required|max_length[3]', [
            'max_length' => 'Nilai melebihi 3 digit angka'
        ]);
        $this->form_validation->set_rules('id_mapel[]', 'id_mapel', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('guru/penilaian/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_mapel = count($this->input->post('id_mapel'));
            $id_guru = htmlspecialchars($this->input->post('id_guru'));
            $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
            $id_sekolah = htmlspecialchars($this->input->post('id_sekolah'));
            $nisn = htmlspecialchars($this->input->post('nisn'));
            $nilai_predikat = $this->predikat->GetPredikat()->result_array();
            for ($i = 0; $i < $id_mapel; $i++) {
                $nilai[$i] = $this->input->post('nilai[' . $i . ']');
                if ($nilai[$i] >= 101) {
                    $this->session->set_flashdata('gagal', 'Nilai inputan melebihi 100');
                    redirect('guru/editnilai/' . $id_prakrin, 'refresh');
                }
            }
            for ($i = 0; $i < $id_mapel; $i++) {
                $nilai[$i] = $this->input->post('nilai[' . $i . ']');
                if ($nilai[$i] >= $nilai_predikat[0]['nilai1'] and $nilai[$i] <= $nilai_predikat[0]['nilai2']) {
                    $predikat[$i] = $nilai_predikat[0]['predikat'];
                } elseif ($nilai[$i] >= $nilai_predikat[1]['nilai1'] and $nilai[$i] <= $nilai_predikat[1]['nilai2']) {
                    $predikat[$i] = $nilai_predikat[1]['predikat'];
                } elseif ($nilai[$i] >= $nilai_predikat[2]['nilai1'] and $nilai[$i] <= $nilai_predikat[2]['nilai2']) {
                    $predikat[$i] = $nilai_predikat[2]['predikat'];
                } else {
                    $predikat[$i] =  $nilai_predikat[3]['predikat'];
                }
                $data[$i] = [
                    'nisn' => $nisn,
                    'id_mapel' => $this->input->post('id_mapel[' . $i . ']'),
                    'id_guru' => $id_guru,
                    'id_kelas' => $id_kelas,
                    'id_sekolah' => $id_sekolah,
                    'nilai' => $nilai[$i],
                    'predikat_nilai' => $predikat[$i]
                ];
                $where[$i] = ['id_nilai' => $this->input->post('id_nilai[' . $i . ']')];
                $this->mm->edit_data('tb_nilai', $where[$i], $data[$i]);
            }
            $data = ['penilaian' => 1];
            $where = ['nisn' => intval($nisn)];
            $this->mm->edit_data('tb_siswa', $where, $data);
            $this->session->set_flashdata('pesan', 'Nilai berhasil diedit');

            redirect('guru/nilai/' . $id_prakrin, 'refresh');
        }
    }

    public function nilai($id_prakrin = null)
    {
        if ($id_prakrin == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $data['siswa'] = $this->prakrin->GetPrakrinById($id_prakrin)->row_array();
        if ($data['siswa'] == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $data['nilai'] = $this->penilaian->NilaiByNisn($data['siswa']['nisn'])->result_array();
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/penilaian/nilai', $data);
        $this->load->view('templates/footer', $data);
    }

    // ------------------------------------------------------------------------
    // End Penilaian
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // Sertifikat
    // ------------------------------------------------------------------------
    public function print($id_prakrin = null)
    {
        if ($id_prakrin == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $data['siswa'] = $this->prakrin->GetPrakrinById($id_prakrin)->row_array();
        if ($data['siswa'] == null) {
            redirect('guru/penilaian', 'refresh');
        }
        $data['nilai'] = $this->penilaian->NilaiByNisn($data['siswa']['nisn'])->result_array();
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = $data['siswa']['nama_siswa'] . ".pdf";
        $this->pdf->load_view('guru/print', $data);
    }

    public function printall()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $data['prakrin'] = $this->prakrin->GetPrakrinAktifByGuru($data['guru']['id_guru'])->result_array();
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = $data['prakrin'][0]['sekolah'] . ".pdf";
        $this->pdf->load_view('guru/printall', $data);
    }
    // ------------------------------------------------------------------------
    // End Sertifikat
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // Alumni
    // ------------------------------------------------------------------------

    public function alumni()
    {
        $id_sekolah = htmlspecialchars($this->input->post('id_sekolah'));
        $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
        $bln = htmlspecialchars($this->input->post('bln'));
        $tahun = htmlspecialchars($this->input->post('tahun'));

        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['kelas'] = $this->kelas->GetKelas()->result_array();
        $data['sekolah'] = $this->sekolah->GetSekolah()->result_array();
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $id_guru = $data['guru']['id_guru'];
        $data['data'] = ['tahun' => $tahun, 'bulan' => bulan_panjang($bln)];
        if ($id_guru == null or $id_kelas == null or $bln == null or $tahun == null) {
            $data['prakrin'] = $this->prakrin->GetPrakrinNonktifByGuru($data['guru']['id_guru'])->result_array();
        } else {
            $data['prakrin'] = $this->prakrin->GetPrakrinFilterNonAktif($id_guru, $id_kelas, $bln, $tahun, $id_sekolah)->result_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/alumni', $data);
        $this->load->view('templates/footer', $data);
    }

    // ------------------------------------------------------------------------
    // End Alumni
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // Ranking
    // ------------------------------------------------------------------------
    public function ranking()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['ranking'] = $this->penilaian->Ranking($data['guru']['id_guru'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/ranking', $data);
        $this->load->view('templates/footer', $data);
    }

    public function printrank()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $data['ranking'] = $this->penilaian->Ranking($data['guru']['id_guru'])->result_array();
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = $data['ranking'][0]['sekolah'] . "-ranking" . ".pdf";
        $this->pdf->load_view('guru/printrank', $data);
    }

    // ------------------------------------------------------------------------
    // Ganti Password
    // ------------------------------------------------------------------------

    public function gantipassword()
    {
        $data['title'] = 'Penilaian Siswa';
        $id_user = $this->session->userdata('id_user');
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();
        $this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required', [
            'required' => 'Kolom password lama wajib diisi'
        ]);
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required|matches[konfirmasipassword]', [
            'required' => 'Kolom password baru wajib diisi',
            'matches' => 'Password baru tidak sama dengan konfirmasi password'
        ]);
        $this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi password', 'trim|required', [
            'required' => 'Kolom konfirmasi password wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('guru/gantipassword', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_user = $this->session->userdata('id_user');
            $passwordlama = htmlspecialchars($this->input->post('passwordlama'));
            $passwordbaru = htmlspecialchars($this->input->post('passwordbaru'));
            $user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
            if (password_verify($passwordlama, $user['password'])) {
                $data = ['password' => password_hash($passwordbaru, PASSWORD_DEFAULT)];
                $where = ['id_user' => $id_user];
                $this->mm->edit_data('user', $where, $data);
                $this->session->set_flashdata('pesan', 'Password berhasil diganti');
                redirect('guru/gantipassword', 'refresh');
            } else {
                $this->session->set_flashdata('gagal', 'Password lama tidak sesuai');
                redirect('guru/gantipassword', 'refresh');
            }
        }
    }
}

/* End of file Guru.php */
