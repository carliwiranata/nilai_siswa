<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Siswa</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/tambahsiswa') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NISN</label>
                                    <input value="<?= set_value('nisn') ?>" required name="nisn" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="xxxxxxxxxx">
                                    <small class="text-danger"><?= form_error('nisn') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input value="<?= set_value('nama_siswa') ?>" required name="nama_siswa" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama">
                                    <small class="text-danger"><?= form_error('nama_siswa') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" <?= set_value('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= set_value('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                    <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat_siswa" class="form-control" id="exampleFormControlTextarea1" placeholder="Masukkan Alamat" rows="3"><?= set_value('alamat_siswa') ?></textarea>
                                    <small class="text-danger"><?= form_error('alamat') ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6">


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal Lahir</label>
                                    <input value="<?= set_value('tanggal_lahir') ?>" name="tanggal_lahir" required type="date" class="form-control" id="exampleInputPassword1">
                                    <small class="text-danger"><?= form_error('tanggal_lahir') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No Hp</label>
                                    <input value="<?= set_value('no_hp') ?>" name="no_hp" required type="number" class="form-control" id="exampleInputPassword1" placeholder="08xxxxxxxxxx">
                                    <small class="text-danger"><?= form_error('no_hp') ?></small>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>