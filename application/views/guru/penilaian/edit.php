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
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Sekolah</th>
                            <th>Kelas</th>
                            <th>Lama</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $bulan = $this->prakrin->lamabulan($siswa['nisn'])->row_array()  ?>
                        <tr>
                            <td><?= $siswa['nisn'] ?></td>
                            <td><?= $siswa['nama_siswa'] ?></td>
                            <td><?= $siswa['sekolah'] ?></td>
                            <td><?= $siswa['kelas'] ?></td>
                            <td><?= $bulan['bulan'] ?> bulan</td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Nilai Siswa -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Penilaian Siswa</h6>
            </div>
            <div class="table-responsive p-3">
                <form action="<?= base_url('guru/editnilai/' . $siswa['id_prakrin']) ?>" method="post" id="nilaiForm">
                    <input type="hidden" name="nisn" value="<?= $siswa['nisn'] ?>">
                    <input type="hidden" name="id_kelas" value="<?= $siswa['id_kelas'] ?>">
                    <input type="hidden" name="id_sekolah" value="<?= $siswa['id_sekolah'] ?>">
                    <input type="hidden" name="id_guru" value="<?= $guru['id_guru'] ?>">
                    <table class="table align-items-center table-flush table-hover">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Materi Pembelajaran</th>
                                <th>KKM</th>
                                <th>Nilai</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nilai as $n) : ?>
                                <input type="hidden" name="id_nilai[]" value="<?= $n['id_nilai']?>">
                                <input type="hidden" name="id_mapel[]" value="<?= $n['id_mapel'] ?>">
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $n['nama_mapel'] ?></td>
                                    <td><?= $n['kkm'] ?></td>
                                    <td>
                                        <input maxlength="3" value="<?= $n['nilai'] ?>" type="number" name="nilai[]" class="form-control nilai" id="exampleInputkelas1" aria-describedby="kelasHelp" required>
                                        <small class="text-danger"><?= form_error('nilai[]') ?></small>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3" class="text-center">Total</td>
                                <td>
                                    <p id="totalNilai">0</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center">Rata-Rata</td>
                                <td>
                                    <p id="rataRata">0</p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>

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