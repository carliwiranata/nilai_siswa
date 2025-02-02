<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url('assets/') ?>img/logo/lkp2.png" rel="icon">
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>

                                    </div>
                                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
                                    <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
                                    <form class="user" action="<?= base_url('auth') ?>" method="post">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" value="<?= set_value('username') ?>">
                                            <?= form_error('username', '<small class="text-danger ">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger ">', '</small>') ?>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>


                                    </form>
                                    <hr>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/ruang-admin.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/myscript.js"></script>
</body>

</html>