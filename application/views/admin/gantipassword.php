<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
        <div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/gantipassword') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password lama</label>
                            <input type="password" name="passwordlama" class="form-control" id="exampleInputpasswordlama1" aria-describedby="passwordlamaHelp">
                            <small class="text-danger"><?= form_error('passwordlama')  ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password baru</label>
                            <input type="password" name="passwordbaru" class="form-control" id="exampleInputpasswordbaru1" aria-describedby="passwordbaruHelp">
                            <small class="text-danger"><?= form_error('passwordbaru')  ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Konfirmasi password</label>
                            <input type="password" name="konfirmasipassword" class="form-control" id="exampleInputkonfirmasipassword1" aria-describedby="konfirmasipasswordHelp">
                            <small class="text-danger"><?= form_error('konfirmasipassword')  ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>