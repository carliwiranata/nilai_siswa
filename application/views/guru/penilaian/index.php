<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Siswa Prakrin</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>

    <!-- Data Table -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa Prakrin</h6>
                <a target="_blank" href="<?= base_url('guru/printall') ?>" class="btn btn-primary "><i class="fas fa-print"></i> Print All</a>
            </div>
            <div class="table-responsive p-3">
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
                                <td><?= $no++ ?></td>
                                <td><?= $p['nisn'] ?></td>
                                <td><?= $p['nama_siswa'] ?></td>
                                <td><?= $p['kelas'] ?></td>
                                <td><?= $bulan['bulan'] ?> bulan</td>

                                <td>
                                    <?php if ($p['penilaian'] == 1) : ?>
                                        <a href="<?= base_url('guru/nilai/' . $p['id_prakrin']) ?>" class="btn btn-primary mb-2"><i class="fas fa-eye"></i></a>
                                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal<?= $p['id_prakrin'] ?>" id="#myBtn">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                    <?php else : ?>
                                        <a href="<?= base_url('guru/tambahnilai/' . $p['id_prakrin']) ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal<?= $p['id_prakrin'] ?>" id="#myBtn">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                    <?php endif ?>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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