<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

    </div>
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Siswa Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($siswa) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Alumni</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($siswaa) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Tanggal Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= tanggal_hari_ini() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas bi bi-calendar-date-fill text-primary fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!---Container Fluid-->