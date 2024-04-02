<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kelas extends CI_Model {

    public function GetKelas()
    {
        $query = "SELECT * FROM tb_kelas
        JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_kelas.id_jurusan ORDER BY kelas ASC";
        return $this->db->query($query);
    }
    public function GetKelasById($id_kelas)
    {
        $query = "SELECT * FROM tb_kelas
        JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_kelas.id_jurusan WHERE id_kelas = '$id_kelas' ORDER BY kelas ASC";
        return $this->db->query($query);
    }

}

/* End of file Model_kelas.php */
