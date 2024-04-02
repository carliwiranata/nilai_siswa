<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Siswa Prakrin</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>




    <!-- Nilai Siswa -->
    <?php if ($nilai == null) : ?>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Penilaian Siswa</h6>
                    <div>
                        <button type="button" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="top" data-content="Anda dapat melakukan cetak pdf ketika nilai anda sudah selesai">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="text-center text-warning">Mohon maaf nilai anda masih dalam proses penilaian...</h3>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Penilaian Siswa</h6>
                    <div>
                        <a target="_blank" href="<?= base_url('siswa/print/' . $prakrin['id_prakrin']) ?>" class="btn btn-primary "><i class="fas fa-print"></i> Print</a>
                    </div>

                </div>
                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush table-hover">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Materi Pembelajaran</th>
                                <th>KKM</th>
                                <th>Nilai</th>
                                <th>Predikat</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nilai as $n) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $n['nama_mapel'] ?></td>
                                    <td><?= $n['kkm'] ?></td>
                                    <td><?= $n['nilai']  ?></td>
                                    <td><?= $n['predikat_nilai']  ?></td>

                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3" class="text-center">Total</td>
                                <td>
                                    <?php $totalnilai = $this->penilaian->totalnilai($siswa['nisn']) ?>
                                    <?= $totalnilai['total_nilai'] ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center">Rata-Rata</td>
                                <td>
                                    <?php $ratarata = $this->penilaian->ratarata($siswa['nisn']) ?>
                                    <?= number_format($ratarata['ratarata_nilai'], 2)  ?>
                                </td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    <?php endif ?>

    <!-- Predikat -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Keterangan Predikat</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nilai</th>
                            <th>Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($predikat as $p) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['nilai1'] ?> - <?= $p['nilai2'] ?></td>
                                <td><?= $p['predikat'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






</div>