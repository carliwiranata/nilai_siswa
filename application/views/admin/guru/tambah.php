<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Instruktur</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Instruktur</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/tambahguru') ?>" method="post">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input required type="email" name="email" value="<?= set_value('email') ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email">
                                    <small class="text-danger"><?= form_error('email')  ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input required value="<?= set_value('nama_guru') ?>" name="nama_guru" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan nama">
                                    <small class="text-danger"><?= form_error('nama_guru') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea placeholder="Masukkan alamat" name="alamat_guru" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= set_value('alamat_guru') ?></textarea>
                                    <small class="text-danger"><?= form_error('alamat_guru') ?></small>
                                </div>
                            </div>
                            <div class="col-lg">
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
                                    <label for="exampleInputPassword1">Tanggal Lahir</label>
                                    <input required value="<?= set_value('tanggal_lahir') ?>" name="tanggal_lahir" type="date" class="form-control" id="exampleInputPassword1">
                                    <small class="text-danger"><?= form_error('tanggal_lahir') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">No HP</label>
                                    <input required value="<?= set_value('no_hp') ?>" name="no_hp" type="number" class="form-control" id="exampleInputPassword1" placeholder="08xxxxxxxxxx">
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