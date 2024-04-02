<div id="wrapper">
    <!-- Sidebar -->
    <?php if ($this->session->userdata('level') == 'admin') : ?>
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $title ?></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data</h6>
                        <a class="collapse-item" href="<?= base_url('admin/siswa') ?>"><i class="fas fa-users mx-2"></i>Siswa</a>
                        <a class="collapse-item" href="<?= base_url('admin/guru') ?>"><i class="fas fa-users mx-2"></i>Instruktur</a>
                        <a class="collapse-item" href="<?= base_url('admin/sekolah') ?>"><i class="fas fa-school mx-2"></i>Sekolah</a>
                        <a class="collapse-item" href="<?= base_url('admin/kelas') ?>"><i class="fas fa-school mx-2"></i>Kelas</a>
                        <a class="collapse-item" href="<?= base_url('admin/prakrin') ?>"><i class="fas fa-school mx-2"></i>Prakrin</a>
                        <a class="collapse-item" href="<?= base_url('admin/alumni') ?>"><i class="fas fa-graduation-cap mx-2"></i>Alumni</a>
                        <a class="collapse-item" href="<?= base_url('admin/jurusan') ?>"><i class="fas fa-laptop-code mx-2"></i>Jurusan</a>
                        <a class="collapse-item" href="<?= base_url('admin/materi') ?>"><i class="fas fa-book mx-2"></i> Materi</a>
                        <a class="collapse-item" href="<?= base_url('admin/predikat') ?>"><i class="fas fa-cogs mx-2"></i> Predikat</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Laporan Nilai</span>
                </a>
                <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan Nilai</h6>
                        <a class="collapse-item" href="<?= base_url('admin/nilai') ?>"><i class="fas fa-award mx-2"></i>Nilai Siswa</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
        </ul>
    <?php elseif ($this->session->userdata('level') == 'guru') : ?>
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('guru') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $title ?></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('guru') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data</h6>
                        <a class="collapse-item" href="<?= base_url('guru/penilaian') ?>"><i class="fas fa-award mx-2"></i>Penilaian</a>
                        <a class="collapse-item" href="<?= base_url('guru/ranking') ?>"><i class="fas fa-award mx-2"></i>Ranking</a>
                        <a class="collapse-item" href="<?= base_url('guru/alumni') ?>"><i class="fas fa-users mx-2"></i>Alumni</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
        </ul>
    <?php else : ?>
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('siswa') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $title ?></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('siswa') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('siswa/nilai') ?>">
                    <i class="fas fa-fw fa-award"></i>
                    <span>Nilai</span>
                </a>
            </li>
            <hr class="sidebar-divider">
        </ul>
    <?php endif ?>

    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>
                    <?php if ($this->session->userdata('level') == 'admin') : ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/boy.png" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small"><?= $this->session->userdata('username') ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('admin/gantipassword') ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    <?php elseif ($this->session->userdata('level') == 'guru') : ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($guru['jenis_kelamin'] == 'Laki-laki') : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/boy.png" style="max-width: 60px">
                                <?php else : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/girl.png" style="max-width: 60px">
                                <?php endif ?>
                                <span class="ml-2 d-none d-lg-inline text-white small"><?= $guru['nama_guru'] ?><br>Instruktur</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="<?= base_url('guru/gantipassword') ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($siswa['jenis_kelamin'] == 'Laki-laki') : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/boy.png" style="max-width: 60px">
                                <?php else : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/girl.png" style="max-width: 60px">
                                <?php endif ?>
                                <span class="ml-2 d-none d-lg-inline text-white small"><?= $siswa['nama_siswa'] ?><br>Siswa</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
            </nav>
            <!-- Topbar -->