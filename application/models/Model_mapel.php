<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_mapel extends CI_Model
{

    public function GetMapel()
    {
        $query = "SELECT * FROM tb_mapel JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_mapel.id_jurusan ORDER BY nama_mapel,jurusan ASC";
        return $this->db->query($query);
    }
    public function GetMapelByJurusan($id_jurusan)
    {
        $query = "SELECT * FROM tb_mapel JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_mapel.id_jurusan WHERE tb_jurusan.id_jurusan = '$id_jurusan' ORDER BY nama_mapel,jurusan ASC";
        return $this->db->query($query);
    }

    public function GetMapelById($id_mapel)
    {
        $query = "SELECT * FROM tb_mapel JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_mapel.id_jurusan WHERE id_mapel = '$id_mapel' ORDER BY nama_mapel,jurusan ASC ";
        return $this->db->query($query);
    }
}

/* End of file Model_materi.php */
