<!-- Container Fluid-->
<?php
$bulan = $this->prakrin->lamabulan($siswa['nisn'])->row_array()
?>


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

    </div>
    <div class="row mb-3">

        <div class="alert alert-primary" role="alert">
            Hallo, <?= $siswa['nama_siswa']  ?>
        </div>

    </div>

    <div class="row">
        <!-- Alerts Basic -->
        <div class="col-lg-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>NISN</td>
                            <td><?= $siswa['nisn'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?= $siswa['nama_siswa'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= $siswa['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $siswa['alamat_siswa'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?= tanggal_indonesia($siswa['tanggal_lahir'])  ?></td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td><?= $siswa['no_hp'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Prakrin</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Instruktur</td>
                            <td><?= $prakrin['nama_guru'] ?></td>
                        </tr>
                        <tr>
                            <td>Sekolah</td>
                            <td><?= $prakrin['sekolah'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td><?= $prakrin['kelas'] ?></td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td><?= $prakrin['jurusan'] ?></td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td><?= tanggal_indonesia_medium($prakrin['tgl_masuk'])  ?> - <?= tanggal_indonesia_medium($prakrin['tgl_keluar']) ?></td>
                        </tr>
                        <tr>
                            <td>Lama</td>
                            <td><?= $bulan['bulan'] ?> Bulan</td>
                        </tr>
                        

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!---Container Fluid-->