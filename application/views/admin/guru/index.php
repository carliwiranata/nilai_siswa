<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Instruktur</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Data Instruktur</h6>
                <a href="<?= base_url('admin/tambahguru') ?>" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Instruktur</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($guru as $g) :  ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $g['nama_guru'] ?></td>
                                <td><?= $g['jenis_kelamin'] ?></td>
                                <td><?= tanggal_indonesia_medium($g['tanggal_lahir'])  ?></td>
                                <td><?= $g['alamat_guru'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/editguru/' . $g['id_user']) ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal<?= $g['id_user'] ?>" id="#myBtn">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModal1<?= $g['id_user'] ?>" id="#myBtn">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

<!-- Modal Detail -->
<?php foreach ($guru as $g) : ?>
    <div class="modal fade" id="exampleModal<?= $g['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Instruktur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg">
                            <table class="table">
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $g['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $g['nama_guru'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $g['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $g['alamat_guru'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg">
                            <table class="table">
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= tanggal_indonesia($g['tanggal_lahir'])  ?></td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>:</td>
                                    <td><?= $g['no_hp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><?= $g['status'] ?></td>
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

<!-- Modal Hapus -->
<?php foreach ($guru as $g) : ?>
    <div class="modal fade" id="exampleModal1<?= $g['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data guru <br> <b><?= $g['nama_guru'] ?></b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/hapusguru/' . $g['id_user']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach  ?>