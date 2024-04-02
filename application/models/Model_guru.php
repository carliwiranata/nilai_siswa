<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru extends CI_Model
{

    public function GetGuruAktif()
    {
        $query = "SELECT * FROM tb_guru WHERE status = 'Aktif'";
        return $this->db->query($query);
    }

    public function GetGuruById($id_user)
    {
        $query = "SELECT * FROM tb_guru WHERE id_user = '$id_user'";
        return $this->db->query($query);
    }

    public function GetGuruByIdGuru($id_guru)
    {
        $query = "SELECT * FROM tb_guru WHERE id_guru = '$id_guru'";
        return $this->db->query($query);
    }
}

/* End of file Model_guru.php */
