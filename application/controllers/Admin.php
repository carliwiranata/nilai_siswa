<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruAktif()->result_array();
        $data['siswa'] = $this->siswa->GetSiswaAktif()->result_array();
        $data['siswaa'] = $this->prakrin->GetPrakrinNonAktif()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    // ------------------------------------------------------------------------
    // SISWA
    // ------------------------------------------------------------------------
    public function siswa($offset = null)
    {
        if ($offset != null) {
            redirect('admin/siswa', 'refresh');
        }

        $data['title'] = 'Penilaian Siswa';
        $data['siswa'] = $this->siswa->GetSiswa()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('templates/footer', $data);
    }

  

    public function tambahsiswa()
    {
        $data['title'] = 'Penilaian Siswa';

        $this->form_validation->set_rules('nisn', 'Nisn', 'trim|required|min_length[10]|max_length[10]|is_unique[tb_siswa.nisn]', [
            'required' => 'Kolom NISN wajib diisi',
            'min_length' => 'NISN minimal 10 digit angka',
            'max_length' => 'NISN maksimal 10 digit angka',
            'is_unique' => 'NISN sudah terdaftar'
        ]);
        $this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'trim|required', [
            'required' => 'Kolom nama siswa wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required', [
            'required' => 'Kolom jenis kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat_siswa', 'Alamat ', 'trim|required', [
            'required' => 'Kolom alamat wajib diisi'
        ]);

        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'trim|required', [
            'required' => 'Kolom tanggal lahir wajib diisi'
        ]);

        $this->form_validation->set_rules('no_hp', 'No hp', 'trim|required|min_length[12]|max_length[15]', [
            'required' => 'Kolom no hp masuk wajib diisi',
            'min_length' => 'No hp minimal 12 digit angka',
            'max_length' => 'No hp maksimal 15 digit angka'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/siswa/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nisn = htmlspecialchars($this->input->post('nisn'));
            $nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $alamat_siswa = htmlspecialchars($this->input->post('alamat_siswa'));
            $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));

            $data = [
                'username' => $nisn,
                'password' => password_hash($nisn, PASSWORD_DEFAULT),
                'level' => 'siswa'
            ];

            $this->mm->tambah_data('user', $data);

            $id_user = $this->db->insert_id();
            $data = [
                'nisn' => $nisn,
                'nama_siswa' => $nama_siswa,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat_siswa' => $alamat_siswa,
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp' => $no_hp,
                'status' => 'Aktif',
                'penilaian' => 0,
                'id_user' => $id_user
            ];

            $this->mm->tambah_data('tb_siswa', $data);
            $this->session->set_flashdata('pesan', 'Data siswa berhasil tambah');

            redirect('admin/siswa', 'refresh');
        }
    }

    public function editsiswa($id_user = null)
    {
        if ($id_user == null) {
            redirect('admin/siswa');
        }

        $data['title'] = 'Penilaian Siswa';
        $data['siswa'] = $this->siswa->GetSiswaByid($id_user)->row_array();
        if ($data['siswa'] == null) {
            redirect('admin/siswa');
        }
        $this->form_validation->set_rules('nisn', 'Nisn', 'trim|required|min_length[10]|max_length[10]', [
            'required' => 'Kolom NISN wajib diisi',
            'min_length' => 'NISN minimal 10 digit angka',
            'max_length' => 'NISN maksimal 10 digit angka',

        ]);
        $this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'trim|required', [
            'required' => 'Kolom nama siswa wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required', [
            'required' => 'Kolom jenis kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat_siswa', 'Alamat ', 'trim|required', [
            'required' => 'Kolom alamat wajib diisi'
        ]);

        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'trim|required', [
            'required' => 'Kolom tanggal lahir wajib diisi'
        ]);

        $this->form_validation->set_rules('no_hp', 'No hp', 'trim|required|min_length[12]|max_length[15]', [
            'required' => 'Kolom no hp masuk wajib diisi',
            'min_length' => 'No hp minimal 12 digit angka',
            'max_length' => 'No hp maksimal 15 digit angka',
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/siswa/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nisn = htmlspecialchars($this->input->post('nisn'));
            $nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $alamat_siswa = htmlspecialchars($this->input->post('alamat_siswa'));
            $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));

            $data = [
                'nisn' => $nisn,
                'nama_siswa' => $nama_siswa,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat_siswa' => $alamat_siswa,
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp' => $no_hp,
                'status' => 'Aktif',
                'penilaian' => 0
            ];

            $where = ['id_user' => $id_user];

            $this->mm->edit_data('tb_siswa', $where, $data);
            $this->session->set_flashdata('pesan', 'Data siswa berhasil diedit');

            redirect('admin/siswa', 'refresh');
        }
    }


    public function hapussiswa($id_user = null)
    {
        if ($id_user == null) {
            redirect('admin/siswa', 'refresh');
        }
        $data['siswa'] = $this->siswa->GetSiswaByid($id_user)->row_array();
        if ($data['siswa'] == null) {
            redirect('admin/siswa');
        }

        $where = ['id_user' => $id_user];
        $this->mm->hapus_data('tb_siswa', $where);
        $this->mm->hapus_data('user', $where);
        $this->session->set_flashdata('pesan', 'Data siswa berhasil dihapus');

        redirect('admin/siswa', 'refresh');
    }

    // ------------------------------------------------------------------------
    // END SISWA
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // INSTRUKTUR
    // ------------------------------------------------------------------------

    public function guru($offset = null)
    {
        if ($offset != null) {
            redirect('admin/guru', 'refresh');
        }
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruAktif()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/guru/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahguru($offset = null)
    {
        if ($offset != null) {
            redirect('admin/guru', 'refresh');
        }
        $data['title'] = 'Penilaian Siswa';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.username]|valid_email', [
            'required' => 'Kolom email wajib diisi',
            'is_unique' => 'Email sudah terdaftar',
            'valid_email' => 'Harus alamat email'
        ]);
        $this->form_validation->set_rules('nama_guru', 'Nama', 'trim|required', [
            'required' => 'Kolom nama wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat_guru', 'Alamat', 'trim|required', [
            'required' => 'Kolom alamat wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required', [
            'required' => 'Kolom jenis kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No hp', 'trim|required|min_length[12]|max_length[15]', [
            'required' => 'Kolom no hp wajib diisi',
            'min_length' => 'No hp minimal 12 digit angka',
            'max_length' => 'No hp maksimal 15 digit angka'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/guru/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $nama_guru = htmlspecialchars($this->input->post('nama_guru'));
            $alamat = htmlspecialchars($this->input->post('alamat_guru'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));

            $data = [
                'username' => $email,
                'password' => password_hash($no_hp, PASSWORD_DEFAULT),
                'level' => 'guru'
            ];

            $this->mm->tambah_data('user', $data);
            $id_user = $this->db->insert_id();

            $data = [
                'email' => $email,
                'nama_guru' => $nama_guru,
                'alamat_guru' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp' => $no_hp,
                'id_user' => $id_user,
                'status' => 'Aktif'
            ];

            $this->mm->tambah_data('tb_guru', $data);
            $this->session->set_flashdata('pesan', 'Data instruktur berhasil ditambah');
            redirect('admin/guru', 'refresh');
        }
    }

    public function editguru($id_user = null)
    {
        if ($id_user == null) {
            redirect('admin/guru', 'refresh');
        }

        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruById($id_user)->row_array();

        if ($data['guru'] == null) {
            redirect('admin/guru', 'refresh');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Kolom email wajib diisi',
            'valid_email' => 'Harus alamat email'
        ]);
        $this->form_validation->set_rules('nama_guru', 'Nama', 'trim|required', [
            'required' => 'Kolom nama wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat_guru', 'Alamat', 'trim|required', [
            'required' => 'Kolom alamat wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required', [
            'required' => 'Kolom jenis kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No hp', 'trim|required|min_length[12]|max_length[15]', [
            'required' => 'Kolom no hp wajib diisi',
            'min_length' => 'No hp minimal 12 digit angka',
            'max_length' => 'No hp maksimal 15 digit angka'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/guru/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $nama_guru = htmlspecialchars($this->input->post('nama_guru'));
            $alamat = htmlspecialchars($this->input->post('alamat_guru'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));
            $where = ['id_user' => $id_user];
            $data = [
                'username' => $email,
                'password' => password_hash($no_hp, PASSWORD_DEFAULT),
                'level' => 'guru'
            ];

            $this->mm->edit_data('user', $where, $data);
            $data = [
                'email' => $email,
                'nama_guru' => $nama_guru,
                'alamat_guru' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp' => $no_hp,
                'status' => 'Aktif'
            ];

            $this->mm->edit_data('tb_guru', $where, $data);
            $this->session->set_flashdata('pesan', 'Data instruktur berhasil diedit');
            redirect('admin/guru', 'refresh');
        }
    }

    public function hapusguru($id_user = null)
    {
        if ($id_user == null) {
            redirect('admin/guru', 'refresh');
        }
        $where = ['id_user' => $id_user];
        $this->mm->hapus_data('user', $where);
        $this->mm->hapus_data('tb_guru', $where);
        $this->session->set_flashdata('pesan', 'Data instruktur berhasil dihapus');
        redirect('admin/guru', 'refresh');
    }

    // ------------------------------------------------------------------------
    // SEKOLAH
    // ------------------------------------------------------------------------

    public function sekolah()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['sekolah'] = $this->sekolah->GetSekolah()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/sekolah/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahsekolah()
    {
        $data['title'] = 'Penilaian Siswa';

        $this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required|is_unique[tb_sekolah.sekolah]', [
            'required' => 'Kolom sekolah wajib diisi',
            'is_unique' => 'Nama sekolah sudah ada'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/sekolah/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $sekolah = htmlspecialchars($this->input->post('sekolah'));
            $data = ['sekolah' => $sekolah];
            $this->mm->tambah_data('tb_sekolah', $data);
            $this->session->set_flashdata('pesan', 'Data sekolah berhasil ditambah');

            redirect('admin/sekolah', 'refresh');
        }
    }

    public function editsekolah($id_sekolah = null)
    {
        if ($id_sekolah == null) {
            redirect('admin/sekolah', 'refresh');
        }

        $data['title'] = 'Penilaian Siswa';
        $data['sekolah'] = $this->sekolah->GetSekolahById($id_sekolah)->row_array();
        if ($data['sekolah'] == null) {
            redirect('admin/sekolah', 'refresh');
        }
        $this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required', [
            'required' => 'Kolom sekolah wajib diisi',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/sekolah/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $sekolah = htmlspecialchars($this->input->post('sekolah'));
            $data = ['sekolah' => $sekolah];
            $where = ['id_sekolah' => $id_sekolah];
            $this->mm->edit_data('tb_sekolah', $where, $data);
            $this->session->set_flashdata('pesan', 'Data sekolah berhasil diedit');

            redirect('admin/sekolah', 'refresh');
        }
    }

    public function hapussekolah($id_sekolah = null)
    {
        if ($id_sekolah == null) {
            redirect('admin/sekolah', 'refresh');
        }

        $where = ['id_sekolah' => $id_sekolah];
        $this->mm->hapus_data('tb_sekolah', $where);
        $this->session->set_flashdata('pesan', 'Data sekolah berhasil dihapus');
        redirect('admin/sekolah', 'refresh');
    }
    // ------------------------------------------------------------------------
    // END SEKOLAH
    // ------------------------------------------------------------------------
    // ------------------------------------------------------------------------
    // KELAS
    // ------------------------------------------------------------------------
    public function kelas()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['kelas'] = $this->kelas->GetKelas()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kelas/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahkelas()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['jurusan'] = $this->jurusan->GetJurusan()->result_array();
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required|is_unique[tb_kelas.kelas]', [
            'required' => 'Kolom kelas wajib diisi',
            'is_unique' => 'Kelas sudah ada'
        ]);
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required|is_unique[tb_kelas.kelas]', [
            'required' => 'Kolom jurusan wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/kelas/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $kelas = htmlspecialchars($this->input->post('kelas'));
            $id_jurusan = htmlspecialchars($this->input->post('id_jurusan'));

            $data = [
                'kelas' => $kelas,
                'id_jurusan' => $id_jurusan
            ];

            $this->mm->tambah_data('tb_kelas', $data);
            $this->session->set_flashdata('pesan', 'Data kelas berhasil ditambah');

            redirect('admin/kelas', 'refresh');
        }
    }


    public function editkelas($id_kelas = null)
    {
        if ($id_kelas == null) {
            redirect('admin/kelas', 'refresh');
        }
        $data['title'] = 'Penilaian Siswa';
        $data['jurusan'] = $this->jurusan->GetJurusan()->result_array();
        $data['kelas'] = $this->kelas->GetKelasById($id_kelas)->row_array();
        if ($data['kelas'] == null) {
            redirect('admin/kelas', 'refresh');
        }
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required', [
            'required' => 'Kolom kelas wajib diisi'
        ]);
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required|is_unique[tb_kelas.kelas]', [
            'required' => 'Kolom jurusan wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/kelas/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $kelas = htmlspecialchars($this->input->post('kelas'));
            $id_jurusan = htmlspecialchars($this->input->post('id_jurusan'));

            $data = [
                'kelas' => $kelas,
                'id_jurusan' => $id_jurusan
            ];
            $where = ['id_kelas' => $id_kelas];
            $this->mm->edit_data('tb_kelas', $where, $data);
            $this->session->set_flashdata('pesan', 'Data kelas berhasil diedit');

            redirect('admin/kelas', 'refresh');
        }
    }

    public function hapuskelas($id_kelas = null)
    {
        if ($id_kelas == null) {
            redirect('admin/kelas', 'refresh');
        }
        $data['kelas'] = $this->kelas->GetKelasById($id_kelas)->row_array();
        if ($data['kelas'] == null) {
            redirect('admin/kelas', 'refresh');
        }

        $where = ['id_kelas' => $id_kelas];
        $this->mm->hapus_data('tb_kelas', $where);
        $this->session->set_flashdata('pesan', 'Data kelas berhasil dihapus');

        redirect('admin/kelas', 'refresh');
    }

    // ------------------------------------------------------------------------
    // END KELAS
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // PRAKRIN
    // ------------------------------------------------------------------------

    public function prakrin()
    {
        $id_guru = htmlspecialchars($this->input->post('id_guru'));
        $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
        $bln = htmlspecialchars($this->input->post('bln'));
        $tahun = htmlspecialchars($this->input->post('tahun'));

        $data['title'] = 'Penilaian Siswa';
        if ($id_guru == null or $id_kelas == null or $bln == null or $tahun == null) {
            $data['prakrin'] = $this->prakrin->GetPrakrinAktif()->result_array();
        } else {
            $data['prakrin'] = $this->prakrin->GetPrakrinFilterAktif($id_guru, $id_kelas, $bln, $tahun, null)->result_array();
        }
        $data['data'] = ['tahun' => $tahun, 'bulan' => bulan_panjang($bln)];
        $data['guru'] = $this->guru->GetGuruAktif()->result_array();
        $data['kelas'] = $this->kelas->GetKelas()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/prakrin/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function tambahprakrin()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['siswa'] = $this->siswa->GetSiswaAktifPrakrin()->result_array();
        $data['kelas'] = $this->kelas->GetKelas()->result_array();
        $data['sekolah'] = $this->sekolah->GetSekolah()->result_array();
        $data['guru'] = $this->guru->GetGuruAktif()->result_array();

        $this->form_validation->set_rules('nisn[]', 'NISN', 'trim|required', [
            'required' => 'Kolom siswa wajib diisi'
        ]);
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required', [
            'required' => 'Kolom kelas wajib diisi'
        ]);
        $this->form_validation->set_rules('id_sekolah', 'Sekolah', 'trim|required', [
            'required' => 'Kolom sekolah wajib diisi'
        ]);
        $this->form_validation->set_rules('id_guru', 'Sekolah', 'trim|required', [
            'required' => 'Kolom instruktur wajib diisi'
        ]);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal masuk', 'trim|required', [
            'required' => 'Kolom tanggal masuk wajib diisi'
        ]);
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'trim|required', [
            'required' => 'Kolom tanggal keluar wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/prakrin/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nisn = count($this->input->post('nisn'));
            $id_kelas = htmlentities($this->input->post('id_kelas'));
            $id_sekolah = htmlentities($this->input->post('id_sekolah'));
            $id_guru = htmlentities($this->input->post('id_guru'));
            $tgl_masuk = htmlentities($this->input->post('tgl_masuk'));
            $tgl_keluar = htmlentities($this->input->post('tgl_keluar'));

            for ($a = 0; $a < $nisn; $a++) {
                $data[$a] = [
                    'nisn' => $this->input->post('nisn[' . $a . ']'),
                    'id_kelas' => $id_kelas,
                    'id_sekolah' => $id_sekolah,
                    'id_guru' => $id_guru,
                    'tgl_masuk' => $tgl_masuk,
                    'tgl_keluar' => $tgl_keluar
                ];
                $this->mm->tambah_data('tb_prakrin', $data[$a]);
                $where[$a] = ['nisn' => $this->input->post('nisn[' . $a . ']')];
                $data[$a] = ['status_prakrin' => 1];
                $this->mm->edit_data('tb_siswa', $where[$a], $data[$a]);
            }
            $this->session->set_flashdata('pesan', 'Data siswa prakrin berhasil ditambah');

            redirect('admin/prakrin', 'refresh');
        }
    }
    public function editprakrin($id_prakrin = null)
    {
        if ($id_prakrin == null) {
            redirect('admin/prakrin', 'refresh');
        }
        $data['title'] = 'Penilaian Siswa';
        $data['siswa'] = $this->prakrin->GetPrakrinAktifById($id_prakrin)->row_array();
        if ($data['siswa'] == null) {
            redirect('admin/prakrin', 'refresh');
        }
        $data['kelas'] = $this->kelas->GetKelas()->result_array();
        $data['sekolah'] = $this->sekolah->GetSekolah()->result_array();
        $data['guru'] = $this->guru->GetGuruAktif()->result_array();

        $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required', [
            'required' => 'Kolom kelas wajib diisi'
        ]);
        $this->form_validation->set_rules('id_sekolah', 'Sekolah', 'trim|required', [
            'required' => 'Kolom sekolah wajib diisi'
        ]);
        $this->form_validation->set_rules('id_guru', 'Sekolah', 'trim|required', [
            'required' => 'Kolom instruktur wajib diisi'
        ]);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal masuk', 'trim|required', [
            'required' => 'Kolom tanggal masuk wajib diisi'
        ]);
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'trim|required', [
            'required' => 'Kolom tanggal keluar wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/prakrin/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_kelas = htmlentities($this->input->post('id_kelas'));
            $id_sekolah = htmlentities($this->input->post('id_sekolah'));
            $id_guru = htmlentities($this->input->post('id_guru'));
            $tgl_masuk = htmlentities($this->input->post('tgl_masuk'));
            $tgl_keluar = htmlentities($this->input->post('tgl_keluar'));

            $data = [
                'id_kelas' => $id_kelas,
                'id_sekolah' => $id_sekolah,
                'id_guru' => $id_guru,
                'tgl_masuk' => $tgl_masuk,
                'tgl_keluar' => $tgl_keluar
            ];
            $where = ['id_prakrin' => $id_prakrin];
            $this->mm->edit_data('tb_prakrin', $where, $data);
            $this->session->set_flashdata('pesan', 'Data siswa prakrin berhasil diedit');

            redirect('admin/prakrin', 'refresh');
        }
    }

    public function hapusprakrin($id_prakrin = null)
    {
        if ($id_prakrin == null) {
            redirect('admin/prakrin', 'refresh');
        }
        $siswa = $this->prakrin->GetPrakrinAktifById($id_prakrin)->row_array();
        if ($siswa == null) {
            redirect('admin/prakrin', 'refresh');
        }
        $data = ['status_prakrin' => 0];
        $where = ['nisn' => intval($siswa['nisn'])];
        $this->mm->edit_data('tb_siswa', $where, $data);
        $where = ['id_prakrin' => $id_prakrin];
        $this->mm->hapus_data('tb_prakrin', $where);
        $this->session->set_flashdata('pesan', 'Data siswa prakrin berhasil dihapus');

        redirect('admin/prakrin', 'refresh');
    }

    public function nonaktif()
    {
        $cek = $this->input->post('nisn');
        if ($cek == null) {
            redirect('admin/prakrin', 'refresh');
        }
        $nisn = count($this->input->post('nisn'));
        for ($a = 0; $a < $nisn; $a++) {
            $data[$a] = ['status' => 'Tidak Aktif'];
            $where[$a] = ['nisn' => intval($this->input->post('nisn[' . $a . ']'))];
            $this->mm->edit_data('tb_siswa', $where[$a], $data[$a]);
        }
        $this->session->set_flashdata('pesan', 'Siswa berhasil dinonaktifkan');
        redirect('admin/prakrin', 'refresh');
    }
    public function aktif()
    {
        $cek = $this->input->post('nisn');
        if ($cek == null) {
            redirect('admin/prakrin', 'refresh');
        }
        $nisn = count($this->input->post('nisn'));
        for ($a = 0; $a < $nisn; $a++) {
            $data[$a] = ['status' => 'Aktif'];
            $where[$a] = ['nisn' => intval($this->input->post('nisn[' . $a . ']'))];
            $this->mm->edit_data('tb_siswa', $where[$a], $data[$a]);
        }
        $this->session->set_flashdata('pesan', 'Siswa berhasil dinonaktifkan');
        redirect('admin/alumni', 'refresh');
    }

    // ------------------------------------------------------------------------
    // JURUSAN
    // ------------------------------------------------------------------------

    public function jurusan()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['jurusan'] = $this->jurusan->GetJurusan()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/jurusan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahjurusan()
    {
        $data['title'] = 'Penilaian Siswa';

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required|is_unique[tb_jurusan.jurusan]', [
            'required' => 'Kolom jurusan wajib diisi',
            'is_unique' => 'Jurusan sudah ada'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/jurusan/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $data = ['jurusan' => htmlspecialchars($this->input->post('jurusan'))];

            $this->mm->tambah_data('tb_jurusan', $data);
            $this->session->set_flashdata('pesan', 'Data jurusan berhasil ditambah');

            redirect('admin/jurusan', 'refresh');
        }
    }
    public function editjurusan($id_jurusan = null)
    {
        if ($id_jurusan == null) {
            redirect('admin/jurusan', 'refresh');
        }
        $data['title'] = 'Penilaian Siswa';
        $data['jurusan'] = $this->jurusan->GetJurusanById($id_jurusan)->row_array();
        if ($data['jurusan'] == null) {
            redirect('admin/jurusan', 'refresh');
        }
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required', [
            'required' => 'Kolom jurusan wajib diisi',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/jurusan/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = ['jurusan' => htmlspecialchars($this->input->post('jurusan'))];
            $where = ['id_jurusan' => $id_jurusan];
            $this->mm->edit_data('tb_jurusan', $where, $data);
            $this->session->set_flashdata('pesan', 'Data jurusan berhasil diedit');
            redirect('admin/jurusan', 'refresh');
        }
    }

    public function hapusjurusan($id_jurusan = null)
    {
        if ($id_jurusan == null) {
            redirect('admin/jurusan', 'refresh');
        }
        $data['jurusan'] = $this->jurusan->GetJurusanById($id_jurusan)->row_array();
        if ($data['jurusan'] == null) {
            redirect('admin/jurusan', 'refresh');
        }

        $where = ['id_jurusan' => $id_jurusan];
        $this->mm->hapus_data('tb_jurusan', $where);
        $this->session->set_flashdata('pesan', 'Data jurusan berhasil dihapus');

        redirect('admin/jurusan', 'refresh');
    }

    // ------------------------------------------------------------------------
    // END JURUSAN
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // MATERI
    // ------------------------------------------------------------------------

    public function materi()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['mapel'] = $this->mapel->GetMapel()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/materi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahmateri()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['jurusan'] = $this->jurusan->GetJurusan()->result_array();

        $this->form_validation->set_rules('nama_mapel', 'Mata Pelajaran', 'trim|required|is_unique[tb_mapel.nama_mapel]', [
            'required' => 'Kolom materi pembelajaran wajib diisi',
            'is_unique' => 'Materi sudah ada'
        ]);
        $this->form_validation->set_rules('kkm', 'Mata Pelajaran', 'trim|required|max_length[2]', [
            'required' => 'Kolom materi pembelajaran wajib diisi',
            'max_length' => 'Nilai maskimal 2 digit angka'
        ]);
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required', [
            'required' => 'Kolom jurusan wajib diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/materi/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_mapel = htmlspecialchars($this->input->post('nama_mapel'));
            $kkm = htmlspecialchars($this->input->post('kkm'));
            $id_jurusan = htmlspecialchars($this->input->post('id_jurusan'));
            if ($kkm >= 100 or $kkm <= 60) {
                $this->session->set_flashdata('gagal', 'KKM yang anda input melebihi nilai 100');
                redirect('admin/materi', 'refresh');
            }
            $data = [
                'nama_mapel' => $nama_mapel,
                'kkm' => $kkm,
                'id_jurusan' => $id_jurusan
            ];

            $this->mm->tambah_data('tb_mapel', $data);
            $this->session->set_flashdata('pesan', 'Data mata pelajaran berhasil ditambah');

            redirect('admin/materi', 'refresh');
        }
    }

    public function editmateri($id_mapel)
    {
        if ($id_mapel == null) {
            redirect('admin/materi', 'refresh');
        }

        $data['title'] = 'Penilaian Siswa';
        $data['jurusan'] = $this->jurusan->GetJurusan()->result_array();
        $data['mapel'] = $this->mapel->GetMapelById($id_mapel)->row_array();
        if ($data['mapel'] == null) {
            redirect('admin/materi', 'refresh');
        }

        $this->form_validation->set_rules('nama_mapel', 'Mata Pelajaran', 'trim|required', [
            'required' => 'Kolom materi pembelajaran wajib diisi',
        ]);
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required', [
            'required' => 'Kolom jurusan wajib diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/materi/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_mapel = htmlspecialchars($this->input->post('nama_mapel'));
            $id_jurusan = htmlspecialchars($this->input->post('id_jurusan'));
            $kkm = htmlspecialchars($this->input->post('kkm'));
            if ($kkm >= 100 or $kkm < 60) {
                $this->session->set_flashdata('gagal', 'KKM yang anda input melebihi nilai 100 atau lebih kecil dari nilai 60');
                redirect('admin/materi', 'refresh');
            }
            $data = [
                'nama_mapel' => $nama_mapel,
                'kkm' => $kkm,
                'id_jurusan' => $id_jurusan
            ];
            $where = ['id_mapel' => $id_mapel];
            $this->mm->edit_data('tb_mapel', $where, $data);
            $this->session->set_flashdata('pesan', 'Data mata pelajaran berhasil diedit');

            redirect('admin/materi', 'refresh');
        }
    }

    public function hapusmateri($id_mapel = null)
    {
        if ($id_mapel == null) {
            redirect('admin/materi', 'refresh');
        }
        $data['mapel'] = $this->mapel->GetMapelById($id_mapel)->row_array();
        if ($data['mapel'] == null) {
            redirect('admin/materi', 'refresh');
        }

        $where = ['id_mapel' => $id_mapel];
        $this->mm->hapus_data('tb_mapel', $where);
        $this->session->set_flashdata('pesan', 'Data mata pelajaran berhasil dihapus');

        redirect('admin/materi', 'refresh');
    }

    // ------------------------------------------------------------------------
    // END MATERI
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // PREDIKAT
    // ------------------------------------------------------------------------
    public function predikat()
    {
        $data['title'] = 'Penilaian Siswa';
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/predikat', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editpredikat($id_predikat = null)
    {
        if ($id_predikat == null) {
            redirect('admin/predikat', 'refresh');
        }
        $data['title'] = 'Penilaian Siswa';
        $data['predikat'] = $this->predikat->GetPredikatById($id_predikat)->row_array();
        if ($data['predikat'] == null) {
            redirect('admin/predikat', 'refresh');
        }

        $this->form_validation->set_rules('nilai1', 'Nilai 1', 'trim|required|min_length[1]|max_length[3]', [
            'required' => 'Wajib diisi',
            'min_length' => 'Minimal 1 karakter angka',
            'max_length' => 'Maksimal 2 karakter angka'
        ]);
        $this->form_validation->set_rules('nilai2', 'Nilai 2', 'trim|required|min_length[1]|max_length[3]', [
            'required' => 'Wajib diisi',
            'min_length' => 'Minimal 1 karakter angka',
            'max_length' => 'Maksimal 2 karakter angka'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editpredikat', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nilai1 = htmlspecialchars($this->input->post('nilai1'));
            $nilai2 = htmlspecialchars($this->input->post('nilai2'));
            if ($nilai1 >= 101 or $nilai2 >= 101) {
                $this->session->set_flashdata('gagal', 'Nilai yang anda input melebihi nilai 100');
                redirect('admin/predikat', 'refresh');
            }
            $data = [
                'nilai1' => $nilai1,
                'nilai2' => $nilai2
            ];
            $where = ['id_predikat' => $id_predikat];
            $this->mm->edit_data('tb_predikat', $where, $data);
            $this->session->set_flashdata('pesan', 'Predikat berhasil diedit');

            redirect('admin/predikat', 'refresh');
        }
    }

    // ------------------------------------------------------------------------
    // END PREDIKAT
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // ALUMNI
    // ------------------------------------------------------------------------

    public function alumni()
    {
        $id_guru = htmlspecialchars($this->input->post('id_guru'));
        $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
        $bln = htmlspecialchars($this->input->post('bln'));
        $tahun = htmlspecialchars($this->input->post('tahun'));


        $data['title'] = 'Penilaian Siswa';
        if ($id_guru == null or $id_kelas == null or $bln == null or $tahun == null) {
            $data['prakrin'] = $this->prakrin->GetPrakrinNonAktif()->result_array();
        } else {
            $data['prakrin'] = $this->prakrin->GetPrakrinFilterNonAktif($id_guru, $id_kelas, $bln, $tahun, null)->result_array();
        }
        $data['data'] = ['tahun' => $tahun, 'bulan' => bulan_panjang($bln)];
        $data['guru'] = $this->guru->GetGuruAktif()->result_array();
        $data['kelas'] = $this->kelas->GetKelas()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/alumni', $data);
        $this->load->view('templates/footer', $data);
    }

    // ------------------------------------------------------------------------
    // END ALUMNI
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // Ganti Password
    // ------------------------------------------------------------------------

    public function gantipassword()
    {
        $data['title'] = 'Penilaian Siswa';
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
            $this->load->view('admin/gantipassword', $data);
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
                redirect('admin/gantipassword', 'refresh');
            } else {
                $this->session->set_flashdata('gagal', 'Password lama tidak sesuai');
                redirect('admin/gantipassword', 'refresh');
            }
        }
    }

    // ------------------------------------------------------------------------
    // End Password
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // Nilai
    // ------------------------------------------------------------------------

    public function nilai()
    {
        $id_guru = htmlspecialchars($this->input->post('id_guru'));
        $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
        $bln = htmlspecialchars($this->input->post('bln'));
        $tahun = htmlspecialchars($this->input->post('tahun'));


        $data['title'] = 'Penilaian Siswa';
        if ($id_guru == null or $id_kelas == null or $bln == null or $tahun == null) {
            $data['prakrin'] = $this->prakrin->GetPrakrin()->result_array();
            $data['url'] = null;
        } else {
            $data['prakrin'] = $this->prakrin->GetPrakrinFilter($id_guru, $id_kelas, $bln, $tahun, null)->result_array();
        }
        $data['data'] = ['tahun' => $tahun, 'bulan' => bulan_panjang($bln), 'bln' => $bln, 'id_kelas' => $id_kelas, 'id_guru' => $id_guru];
        $data['guru'] = $this->guru->GetGuruAktif()->result_array();
        $data['kelas'] = $this->kelas->GetKelas()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/nilai', $data);
        $this->load->view('templates/footer', $data);
    }

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
        $data['title'] = 'Penilaian Siswa';
        $data['guru'] = $this->guru->GetGuruByIdGuru(intval($data['siswa']['id_guru']))->row_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = $data['siswa']['nama_siswa'] . ".pdf";
        $this->pdf->load_view('admin/print', $data);
    }

    public function printall()
    {
        $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
        $id_guru = htmlspecialchars($this->input->post('id_guru'));
        $bln = htmlspecialchars($this->input->post('bln'));
        $tahun = htmlspecialchars($this->input->post('tahun'));

        $data['title'] = 'Penilaian Siswa';
        $data['siswa'] = $this->prakrin->GetPrakrinFilter($id_guru, $id_kelas, $bln, $tahun, null)->result_array();
        $data['predikat'] = $this->predikat->GetPredikat()->result_array();
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = $data['siswa'][0]['sekolah'] . ".pdf";
        $this->pdf->load_view('admin/printall', $data);
    }
}
