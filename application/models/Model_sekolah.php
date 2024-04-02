<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_sekolah extends CI_Model
{

    public function GetSekolah()
    {
        $query = "SELECT * FROM tb_sekolah";
        return $this->db->query($query);
    }
    public function GetSekolahById($id_sekolah)
    {
        $query = "SELECT * FROM tb_sekolah WHERE id_sekolah = '$id_sekolah'";
        return $this->db->query($query);
    }
}

/* End of file Model_sekolah.php */
