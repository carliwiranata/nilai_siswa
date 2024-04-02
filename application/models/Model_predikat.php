<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_predikat extends CI_Model
{
    public function GetPredikat()
    {
        $query = "SELECT * FROM tb_predikat";
        return $this->db->query($query);
    }

    public function GetPredikatById($id_predikat)
    {
        $query = "SELECT * FROM tb_predikat WHERE id_predikat = '$id_predikat' ";
        return $this->db->query($query);
    }
}

/* End of file Model_predikat.php */
