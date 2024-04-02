<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{

    public function GetSiswaAktifPrakrin()
    {
        $query = "SELECT * FROM tb_siswa WHERE status = 'Aktif' AND status_prakrin = 0  ORDER BY nama_siswa ASC ";
        return $this->db->query($query);
    }
    public function GetSiswa()
    {
        $query = "SELECT * FROM tb_siswa ORDER BY nama_siswa ASC ";
        return $this->db->query($query);
    }
    public function GetSiswaAktif()
    {
        $query = "SELECT * FROM tb_siswa WHERE status = 'Aktif'  ORDER BY nama_siswa ASC ";
        return $this->db->query($query);
    }
  
    public function GetSiswaByid($id_user)
    {
        $query = "SELECT * FROM tb_siswa
        WHERE id_user = '$id_user'";
        return $this->db->query($query);
    }

    
}

/* End of file Model_siswa.php */
