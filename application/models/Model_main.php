<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_main extends CI_Model
{

    public function tambah_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function edit_data($table, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }
}

/* End of file Model_main.php */
