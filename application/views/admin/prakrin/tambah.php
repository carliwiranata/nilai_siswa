<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Siswa Prakrin</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa Prakrin</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/tambahprakrin') ?>" method="post">

                        <div class="form-group">
                            <label for="select2Multiple">Pilih Siswa</label>
                            <select class="select2-multiple form-control" name="nisn[]" multiple="multiple" id="select2Multiple">
                                <?php foreach ($siswa as $s) : ?>
                                    <option value="<?= $s['nisn'] ?>" <?= set_value('nisn[]') == $s['nisn'] ? 'selected' : '' ?>><?= $s['nama_siswa'] ?></option>
                                <?php endforeach  ?>
                            </select>
                            <small class="text-danger"><?= form_error('nisn[]') ?></small>
                        </div>
                        <div class="form-group">
                            <select class="select2-single form-control" name="id_kelas" id="select2Single">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $k) : ?>
                                    <option value="<?= $k['id_kelas'] ?>" <?= set_value('id_kelas') == $k['id_kelas'] ? 'selected' : '' ?>><?= $k['kelas'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="text-danger"><?= form_error('id_kelas') ?></small>
                        </div>
                        <div class="form-group">
                            <select class="select2-single form-control" name="id_sekolah" id="select2Single1">
                                <option value="">Pilih Sekolah</option>
                                <?php foreach ($sekolah as $s) : ?>
                                    <option value="<?= $s['id_sekolah'] ?>" <?= set_value('id_sekolah') == $s['id_sekolah'] ? 'selected' : '' ?>><?= $s['sekolah'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="text-danger"><?= form_error('id_sekolah') ?></small>
                        </div>


                        <div class="form-group">
                            <select class="select2-single form-control" name="id_guru" id="select2Single2">
                                <option value="">Pilih Instruktur</option>
                                <?php foreach ($guru as $g) : ?>
                                    <option value="<?= $g['id_guru'] ?>" <?= set_value('id_guru') == $g['id_guru'] ? 'selected' : '' ?>><?= $g['nama_guru'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="text-danger"><?= form_error('id_guru') ?></small>
                        </div>
                        <div class="form-group" id="simple-date4">
                            <label for="dateRangePicker">Periode</label>
                            <div class="input-daterange input-group">
                                <input type="date" value="<?= set_value('tgl_masuk') ?>" class="input-sm form-control" name="tgl_masuk" />

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Sampai</span>
                                </div>
                                <input type="date" value="<?= set_value('tgl_keluar') ?>" class="input-sm form-control" name="tgl_keluar" />
                            </div>
                        </div>
                        <small style="margin-top: -15px;" class="text-danger d-flex justify-content-between"><?= form_error('tgl_masuk') ?> <?= form_error('tgl_keluar') ?></small>
                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>