<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/') ?>img/logo/lkp2.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .data-diri table {
            width: 50%;
        }

        .nilai table {
            margin-top: 20px;
            width: 80%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        .nilai table tr,
        .nilai table td,
        .nilai table th {
            border: 1px solid black;
        }

        .text-center {
            text-align: center;
        }

        .ttd-guru {
            height: 20px;
        }

        .ttd {
            max-width: 40%;
            margin-left: auto;
            margin-top: 15px;
        }
    </style>
</head>
<?php foreach ($prakrin as $p) : ?>
<?php $nilai = $this->penilaian->NilaiByNisn($p['nisn'])->result_array(); ?>
    <body>
        <div class="data-diri">
            <table>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?= $p['nisn'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $p['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $p['kelas'] ?></td>
                </tr>
                <tr>
                    <td>Sekolah</td>
                    <td>:</td>
                    <td><?= $p['sekolah'] ?></td>
                </tr>
            </table>
        </div>
        <div class="nilai">
            <table border="1" cellpadding="5" align="center">
                <tr>
                    <th>No</th>
                    <th>Materi Pembelajaran</th>
                    <th>KKM</th>
                    <th>Nilai</th>
                    <th>Predikat</th>
                </tr>
                <?php $no = 1;
                foreach ($nilai as $n) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $n['nama_mapel'] ?></td>
                        <td class="text-center"><?= $n['kkm'] ?></td>
                        <td class="text-center"><?= $n['nilai']  ?></td>
                        <td class="text-center"><?= $n['predikat_nilai']  ?></td>

                    </tr>
                <?php endforeach ?>
                <tr>
                    <td colspan="3" class="text-center">Total</td>
                    <td class="text-center">
                        <?php $totalnilai = $this->penilaian->totalnilai($p['nisn']) ?>
                        <?= $totalnilai['total_nilai'] ?>
                    </td>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">Rata-Rata</td>
                    <td class="text-center">
                        <?php $ratarata = $this->penilaian->ratarata($p['nisn']) ?>
                        <?= number_format($ratarata['ratarata_nilai'], 2, ',', '.')  ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="ttd text-center">
            <p>Instruktur, <?= tanggal_hari_ini() ?></p>
            <p class="ttd-guru"></p>
            <p><?= $guru['nama_guru'] ?></p>
        </div>
    </body>
<?php endforeach ?>

</html>