<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">kelas</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Kelas</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/editkelas/' . $kelas['id_kelas']) ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" name="kelas" value="<?= $kelas['kelas'] ?>" class="form-control" id="exampleInputkelas1" aria-describedby="kelasHelp" placeholder="Masukkan kelas">
                            <small class="text-danger"><?= form_error('kelas')  ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jurusan</label>
                            <select name="id_jurusan" class="form-control" id="exampleFormControlSelect1">
                                <option value="">Pilih Jurusan</option>
                                <?php foreach ($jurusan as $j) :  ?>
                                    <option value="<?= $j['id_jurusan'] ?>" <?= $j['id_jurusan'] == $kelas['id_jurusan'] ? 'selected' : '' ?>><?= $j['jurusan'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="text-danger"><?= form_error('id_jurusan') ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>