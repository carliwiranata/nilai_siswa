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


        .nilai table {
            margin-top: 20px;
            width: 100%;
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

<body>

    <div class="nilai">
        <table border="1" cellpadding="5" align="center">
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Total</th>
                <th>Rata-Rata</th>
                <th>Ranking</th>
            </tr>
            <?php $no = 1;
            foreach ($ranking as $r) : ?>
                <tr>
                    <td><?= $r['nisn'] ?></td>
                    <td><?= $r['nama_siswa'] ?></td>
                    <td class="text-center"><?= $r['kelas'] ?></td>
                    <td class="text-center"><?= $r['total_nilai']  ?></td>
                    <td class="text-center"><?= number_format($r['rata_rata'],2)   ?></td>
                    <td class="text-center"><?= $r['ranking']  ?></td>

                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <div class="ttd text-center">
        <p>Instruktur, <?= tanggal_hari_ini() ?></p>
        <p class="ttd-guru"></p>
        <p><?= $guru['nama_guru'] ?></p>
    </div>
</body>

</html>