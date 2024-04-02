<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelas</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                <a href="<?= base_url('admin/tambahkelas') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kelas</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kelas as $k) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['kelas'] ?></td>
                                <td><?= $k['jurusan'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/editkelas/' . $k['id_kelas']) ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModal1<?= $k['id_kelas'] ?>" id="#myBtn">
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



<!-- Modal Hapus -->
<?php foreach ($kelas as $k) : ?>
    <div class="modal fade" id="exampleModal1<?= $k['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data kelas <br> <b><?= $k['kelas'] ?></b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/hapuskelas/' . $k['id_kelas']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach  ?>
