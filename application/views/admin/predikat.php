<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Predikat</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Setting Predikat</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" >
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nilai</th>
                            <th>Predikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($predikat as $p) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['nilai1'] ?> - <?= $p['nilai2']  ?></td>
                                <td><?= $p['predikat'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/editpredikat/' . $p['id_predikat']) ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>