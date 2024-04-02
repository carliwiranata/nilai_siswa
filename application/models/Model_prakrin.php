<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_prakrin extends CI_Model
{

    public function GetPrakrinAktif()
    {
        $query = "SELECT tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tgl_masuk,tgl_keluar FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.status = 'Aktif'";
        return $this->db->query($query);
    }

    public function GetPrakrin()
    {
        $query = "SELECT penilaian,tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tgl_masuk,tgl_keluar FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru ";
        return $this->db->query($query);
    }

    public function GetPrakrinAktifByGuru($id_guru)
    {
        $query = "SELECT tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tgl_masuk,tgl_keluar,tb_siswa.penilaian FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.status = 'Aktif' AND tb_prakrin.id_guru = '$id_guru'";
        return $this->db->query($query);
    }

    public function GetPrakrinNonktifByGuru($id_guru)
    {
        $query = "SELECT tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tgl_masuk,tgl_keluar,tb_siswa.penilaian FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.status = 'Tidak Aktif' AND tb_prakrin.id_guru = '$id_guru'";
        return $this->db->query($query);
    }

    public function GetPrakrinSiswa($nisn)
    {
        $query = "SELECT tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tgl_masuk,tgl_keluar,tb_siswa.penilaian FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.nisn = '$nisn'";
        return $this->db->query($query);
    }
    public function GetPrakrinNonAktif()
    {
        $query = "SELECT tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tgl_masuk,tgl_keluar FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.status = 'Tidak Aktif'";
        return $this->db->query($query);
    }
    public function GetPrakrinAktifById($id_prakrin)
    {
        $query = "SELECT tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tb_guru.id_guru,tgl_masuk,tgl_keluar,tb_jurusan.id_jurusan,tb_prakrin.id_kelas,tb_prakrin.id_sekolah,tb_siswa.penilaian FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.status = 'Aktif' AND tb_prakrin.id_prakrin = '$id_prakrin'";
        return $this->db->query($query);
    }

    public function GetPrakrinById($id_prakrin)
    {
        $query = "SELECT tb_prakrin.id_guru,tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_sekolah.sekolah,tb_guru.nama_guru,tgl_masuk,tgl_keluar,tb_jurusan.id_jurusan,tb_prakrin.id_kelas,tb_prakrin.id_sekolah,tb_siswa.penilaian FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_prakrin.id_prakrin = '$id_prakrin'";
        return $this->db->query($query);
    }

    public function GetPrakrinFilterAktif($id_guru, $id_kelas, $bln, $tahun, $id_sekolah)
    {
        $query = "SELECT tgl_masuk,tgl_keluar,penilaian,tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_guru.nama_guru,tb_sekolah.sekolah,tb_kelas.kelas FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.status = 'Aktif' AND tb_prakrin.id_guru = '$id_guru' AND tb_prakrin.id_kelas = '$id_kelas' AND MONTH(tb_prakrin.tgl_masuk) = '$bln'  AND YEAR(tb_prakrin.tgl_masuk) = '$tahun' AND ( tb_prakrin.id_sekolah = '$id_sekolah' OR tb_prakrin.id_sekolah IS NULL OR tb_prakrin.id_sekolah = '' OR '$id_sekolah' = '')";

        return $this->db->query($query);
    }

    public function GetPrakrinFilter($id_guru, $id_kelas, $bln, $tahun, $id_sekolah)
    {
        $query = "SELECT tgl_masuk,tgl_keluar,tb_sekolah.sekolah,penilaian,tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_guru.nama_guru FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_prakrin.id_guru = '$id_guru' AND tb_prakrin.id_kelas = '$id_kelas' AND MONTH(tb_prakrin.tgl_masuk) = '$bln'  AND YEAR(tb_prakrin.tgl_masuk) = '$tahun' AND ( tb_prakrin.id_sekolah = '$id_sekolah' OR tb_prakrin.id_sekolah IS NULL OR tb_prakrin.id_sekolah = '' OR '$id_sekolah' = '')";

        return $this->db->query($query);
    }

    public function GetPrakrinFilterNonAktif($id_guru, $id_kelas, $bln, $tahun, $id_sekolah)
    {
        $query = "SELECT tgl_masuk,tgl_keluar,penilaian,tb_prakrin.nisn,nama_siswa,tb_siswa.jenis_kelamin,tb_siswa.tanggal_lahir,alamat_siswa,tb_siswa.no_hp,tb_siswa.status,id_prakrin,tb_kelas.kelas,tb_jurusan.jurusan,tb_guru.nama_guru,tb_sekolah.sekolah,tb_kelas.kelas FROM tb_prakrin 
        JOIN tb_siswa ON   tb_prakrin.nisn = tb_siswa.nisn
        JOIN tb_kelas ON tb_prakrin.id_kelas =  tb_kelas.id_kelas
        JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan
        JOIN tb_sekolah ON  tb_prakrin.id_sekolah =  tb_sekolah.id_sekolah
        JOIN tb_guru ON  tb_prakrin.id_guru =  tb_guru.id_guru  WHERE tb_siswa.status = 'Tidak Aktif' AND tb_prakrin.id_guru = '$id_guru' AND tb_prakrin.id_kelas = '$id_kelas' AND MONTH(tb_prakrin.tgl_masuk) = '$bln'  AND YEAR(tb_prakrin.tgl_masuk) = '$tahun' AND ( tb_prakrin.id_sekolah = '$id_sekolah' OR tb_prakrin.id_sekolah IS NULL OR tb_prakrin.id_sekolah = '' OR '$id_sekolah' = '')";
        return $this->db->query($query);
    }

    public function lamabulan($nisn)
    {
        $query = "SELECT TIMESTAMPDIFF(MONTH, tgl_masuk, tgl_keluar) AS bulan FROM tb_prakrin WHERE nisn = '$nisn'";
        return $this->db->query($query);
    }
}

/* End of file Model_prakrin.php */
