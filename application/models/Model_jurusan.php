<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jurusan extends CI_Model
{

    public function GetJurusan()
    {
        $query = "SELECT * FROM tb_jurusan";
        return $this->db->query($query);
    }
    public function GetJurusanById($id_jurusan)
    {
        $query = "SELECT * FROM tb_jurusan WHERE id_jurusan = '$id_jurusan'";
        return $this->db->query($query);
    }
}

/* End of file Model_jurusan.php */
