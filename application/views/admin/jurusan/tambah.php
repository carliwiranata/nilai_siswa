<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jurusan</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Jurusan</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/tambahjurusan') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jurusan</label>
                            <input type="text" name="jurusan" value="<?= set_value('jurusan') ?>" class="form-control" id="exampleInputjurusan1" aria-describedby="jurusanHelp" placeholder="Masukkan jurusan">
                            <small class="text-danger"><?= form_error('jurusan')  ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>