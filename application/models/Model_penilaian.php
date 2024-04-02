<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_penilaian extends CI_Model
{


    public function NilaiByNisn($nisn)
    {
        $query = "SELECT tg.nama_guru,tm.nama_mapel,tm.kkm,tm.id_mapel,tn.nilai,tn.predikat_nilai,tn.id_nilai,tp.tgl_masuk,tp.tgl_keluar,tsk.sekolah,ts.nama_siswa,ts.nisn,ts.jenis_kelamin,ts.alamat_siswa,ts.tanggal_lahir,ts.no_hp,ts.status,tk.kelas,tj.jurusan FROM tb_nilai as tn
        JOIN tb_mapel as tm ON tm.id_mapel = tn.id_mapel
        JOIN tb_guru as tg ON tg.id_guru = tn.id_guru
        JOIN tb_kelas as tk ON tk.id_kelas = tn.id_kelas
        JOIN tb_jurusan  as tj ON tj.id_jurusan = tk.id_jurusan
        JOIN tb_sekolah as tsk ON tsk.id_sekolah = tn.id_sekolah
        JOIN tb_siswa as ts ON ts.nisn = tn.nisn
        JOIN tb_prakrin as tp ON tp.nisn = ts.nisn WHERE tn.nisn = '$nisn'";
        return $this->db->query($query);
    }

    public function Ranking($id_guru)
    {
        $query = "SELECT ts.nisn,ts.nama_siswa,tk.kelas,tsk.sekolah, SUM(tn.nilai) AS total_nilai, AVG(tn.nilai) AS rata_rata, RANK() OVER (ORDER BY SUM(tn.nilai) DESC , ts.id_user) AS ranking FROM tb_nilai as tn JOIN tb_mapel as tm ON tm.id_mapel = tn.id_mapel JOIN tb_guru as tg ON tg.id_guru = tn.id_guru JOIN tb_kelas as tk ON tk.id_kelas = tn.id_kelas JOIN tb_jurusan as tj ON tj.id_jurusan = tk.id_jurusan JOIN tb_sekolah as tsk ON tsk.id_sekolah = tn.id_sekolah JOIN tb_siswa as ts ON ts.nisn = tn.nisn JOIN tb_prakrin as tp ON tp.nisn = ts.nisn WHERE tg.id_guru = '$id_guru' AND ts.status = 'Aktif' GROUP BY tn.nisn ORDER BY ranking ASC LIMIT 10";
        return $this->db->query($query);
    }

    public function totalnilai($nisn)
    {
        $query = "SELECT SUM(nilai) AS total_nilai FROM tb_nilai WHERE nisn = '$nisn'";
        return $this->db->query($query)->row_array();
    }
    public function ratarata($nisn)
    {
        $query = "SELECT AVG(nilai) AS ratarata_nilai FROM tb_nilai WHERE nisn = '$nisn'";
        return $this->db->query($query)->row_array();
    }
}

/* End of file Model_penilaian.php */
