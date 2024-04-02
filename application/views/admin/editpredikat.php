<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Predikat</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Predikat</h6>
                </div>
                <div class="card-body">



                    <form action="<?= base_url('admin/editpredikat/' . $predikat['id_predikat']) ?>" method="post">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input required type="number" name="nilai1" value="<?= $predikat['nilai1'] ?>" class="form-control" id="exampleInputsekolah1" aria-describedby="sekolahHelp" placeholder="nilai">
                                    <small class="text-danger"><?= form_error('nilai1')  ?></small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input required type="number" name="nilai2" value="<?= $predikat['nilai2'] ?>" class="form-control" id="exampleInputsekolah1" aria-describedby="sekolahHelp" placeholder="nilai">
                                    <small class="text-danger"><?= form_error('nilai2')  ?></small>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input required type="text" readonly name="predikat" value="<?= $predikat['predikat'] ?>" class="form-control" id="exampleInputsekolah1" aria-describedby="sekolahHelp" placeholder="Masukkan sekolah">
                                    <small class="text-danger"><?= form_error('predikat')  ?></small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary float-right">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>