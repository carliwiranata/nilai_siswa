<?php

$bulan = [
    ['bln' => 1, 'bulan' => 'Januari'],
    ['bln' => 2, 'bulan' => 'Februari'],
    ['bln' => 3, 'bulan' => 'Maret'],
    ['bln' => 4, 'bulan' => 'April'],
    ['bln' => 5, 'bulan' => 'Mei'],
    ['bln' => 6, 'bulan' => 'Juni'],
    ['bln' => 7, 'bulan' => 'Juli'],
    ['bln' => 8, 'bulan' => 'Agustus'],
    ['bln' => 9, 'bulan' => 'September'],
    ['bln' => 10, 'bulan' => 'Oktober'],
    ['bln' => 11, 'bulan' => 'November'],
    ['bln' => 12, 'bulan' => 'Desember']
];

?>



<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Siswa Alumni</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>

    <!-- Filter -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Filter Data Siswa Alumni </h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/alumni') ?>" method="post">
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <select class="select2-single form-control" name="id_guru" id="select2Single">
                                    <option value="">Pilih Instruktur</option>
                                    <?php foreach ($guru as $g) : ?>
                                        <option value="<?= $g['id_guru'] ?>" <?= set_value('id_guru') == $g['id_guru'] ? 'selected' : ''  ?>><?= $g['nama_guru'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <select class="select2-single form-control" name="id_kelas" id="select2Single1">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($kelas as $k) : ?>
                                        <option value="<?= $k['id_kelas'] ?>" <?= set_value('id_kelas') == $k['id_kelas'] ? 'selected' : '' ?>><?= $k['kelas'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <select class="select2-single form-control" name="bln" id="select2Single2">
                                    <option value="">Pilih Bulan</option>
                                    <?php foreach ($bulan as $b) : ?>
                                        <option value="<?= $b['bln'] ?>" <?= set_value('bln') == $b['bln'] ? 'selected' : '' ?>><?= $b['bulan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <select class="select2-single form-control" name="tahun" id="select2Single3">
                                    <option value="">Pilih Tahun</option>
                                    <?php for ($i = date("Y"); $i >= 2020; $i--) : ?>
                                        <option value="<?= $i ?>" <?= set_value('tahun') == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right ml-3"><i class="fas fa-search"></i> Cari</button>
                    <a href="<?= base_url('admin/alumni') ?>" class="btn btn-secondary float-right ml-3"><i class="fas fa-sync"></i></a>
                </form>
            </div>
        </div>
    </div>

    <!-- Data -->
    <?php if ($data['tahun'] != null and $data['bulan'] != null) : ?>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <h6 class="m-0 font-weight-bold text-primary">Keterangan</h6>
                </div>
                <div class="card-body">
                    <?php if ($prakrin == null) : ?>
                        <h4 class="text-center text-danger">Data tidak ditemukan</h4>
                    <?php else : ?>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instruktur</label>
                                    <input type="text" value="<?= $prakrin[0]['nama_guru'] ?>" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kelas</label>
                                    <input type="text" value="<?= $prakrin[0]['kelas'] ?>" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bulan</label>
                                    <input type="text" value="<?= $data['bulan'] ?>" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tahun</label>
                                    <input type="text" value="<?= $data['tahun'] ?>" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
    <?php endif ?>
    <!-- Data Table -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa Alumni</h6>
            </div>
            <div class="table-responsive p-3">
                <form action="<?= base_url('admin/aktif') ?>" method="post">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Lama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($prakrin as $p) : ?>
                                <?php $bulan = $this->prakrin->lamabulan($p['nisn'])->row_array()  ?>
                                <tr>
                                    <td><input type="checkbox" class="check-item" value="<?= $p['nisn'] ?>" name="nisn[]" id="customControlAutosizing"> <?= $no++ ?></td>
                                    <td><?= $p['nisn'] ?></td>
                                    <td><?= $p['nama_siswa'] ?></td>
                                    <td><?= $p['kelas'] ?></td>
                                    <td><?= $bulan['bulan'] ?> bulan</td>

                                    <td>
                                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal<?= $p['id_prakrin'] ?>" id="#myBtn">
                                            <i class="fas fa-info-circle"></i>
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <label><input type="checkbox" id="check-all"> Pilih Semua</label>
                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin aktifkan?')" class="btn btn-primary float-right my-3">Aktif</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <?php foreach ($prakrin as $p) : ?>
        <?php $bulan = $this->prakrin->lamabulan($p['nisn'])->row_array()  ?>
        <div class="modal fade" id="exampleModal<?= $p['id_prakrin'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <table class="table">
                                    <tr>
                                        <td>NISN</td>
                                        <td>:</td>
                                        <td><?= $p['nisn'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $p['nama_siswa'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?= $p['jenis_kelamin'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $p['alamat_siswa'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?= tanggal_indonesia($p['tanggal_lahir'])  ?></td>
                                    </tr>
                                    <tr>
                                        <td>No HP</td>
                                        <td>:</td>
                                        <td><?= $p['no_hp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><?= $p['status'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg">
                                <table class="table">
                                    <tr>
                                        <td>Instruktur</td>
                                        <td>:</td>
                                        <td><?= $p['nama_guru'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sekolah</td>
                                        <td>:</td>
                                        <td><?= $p['sekolah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td><?= $p['kelas'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>:</td>
                                        <td><?= $p['jurusan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Periode</td>
                                        <td>:</td>
                                        <td><?= tanggal_indonesia_medium($p['tgl_masuk']) . ' - ' . tanggal_indonesia_medium($p['tgl_keluar'])  ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lama</td>
                                        <td>:</td>
                                        <td><?= $bulan['bulan'] . ' Bulan' ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>




</div>