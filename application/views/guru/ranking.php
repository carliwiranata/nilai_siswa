<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ranking Siswa Prakrin</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>

    <!-- Data Table -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Ranking Siswa Prakrin</h6>
                <a target="_blank" href="<?= base_url('guru/printrank') ?>" class="btn btn-primary "><i class="fas fa-print"></i> Print</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" >

                    <thead class="thead-light">
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Total</th>
                            <th>Rata-Rata</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($ranking as $r) : ?>
                            <tr>
                                <td><?= $r['nisn'] ?></td>
                                <td><?= $r['nama_siswa'] ?></td>
                                <td><?= $r['kelas'] ?></td>
                                <td><?= $r['total_nilai'] ?></td>
                                <td><?= number_format($r['rata_rata'],2)  ?></td>
                                <td><?= $r['ranking'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
   



</div>