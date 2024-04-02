<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    // ------------------------------------------------------------------------
    // ------------------------------------------------------------------------
    // LOGIN
    // ------------------------------------------------------------------------
    // ------------------------------------------------------------------------

    public function index()
    {
        if ($this->session->userdata('level') == 'admin') {
            redirect('admin', 'refresh');
        } elseif ($this->session->userdata('level') == 'guru') {
            redirect('guru', 'refresh');
        } elseif ($this->session->userdata('level') == 'siswa') {
            redirect('siswa', 'refresh');
        }

        $data['title'] = 'Penilaian Siswa';
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username  Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password  Tidak Boleh Kosong'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            //  CEK USERNAME

            if ($user) {

                //  CEK PASSWORD

                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata('username', $user['username']);
                    $this->session->set_userdata('level', $user['level']);
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->set_flashdata('pesan', 'Anda berhasil login');
                    switch ($user['level']) {
                        case 'admin':
                            redirect('admin');
                            break;
                        case 'guru':
                            redirect('guru');
                            break;
                        default:
                            redirect('siswa');
                            break;
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'Password anda salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Username anda belum terdaftar');
                redirect('auth');
            }
        }
    }

    //////////////////////////
    //       LOGOUT         //
    ////////////////////////

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('pesan', 'Anda berhasil logout');
        redirect('auth');
    }

    // ------------------------------------------------------------------------
    // Error
    // ------------------------------------------------------------------------
    public function error()
    {
        $data['title'] = 'Penilaian siswa';
        $this->load->view('templates/header', $data);
        $this->load->view('errors/error', $data);
    }
}
