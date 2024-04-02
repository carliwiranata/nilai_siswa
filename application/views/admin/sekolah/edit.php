<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sekolah</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Sekolah</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/editsekolah/' . $sekolah['id_sekolah']) ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Sekolah</label>
                            <input required type="text" name="sekolah" value="<?= $sekolah['sekolah'] ?>" class="form-control" id="exampleInputsekolah1" aria-describedby="sekolahHelp" placeholder="Masukkan sekolah">
                            <small class="text-danger"><?= form_error('sekolah')  ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>