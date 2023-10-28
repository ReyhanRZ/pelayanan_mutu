<!-- Header -->

<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <title>PDF</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .tabel {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .tabel td,
        .tabel th {
            text-align: center;
            padding: 8px;
        }

        .tabel td {
            border: 1px solid black;
            font-size: 12px;
        }

        /* .tabel thead th {
            color: black;
            background: #F8F8F8;
        } */


        .tabel thead th {
            color: #ffffff;
            background: #324960;
            border: 1px solid black;
        }

        /* .tabel thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        } */

        /* .tabel tr:nth-child(even) {
            background: #F8F8F8;
        } */
    </style>
    <!-- Custom styles for this template -->
</head>



<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row row-md-12 align-items-center">
            <div class="col col-md-9">
                <h3>Data Mutu RS</h3>
                <p>*merah artinya tidak mencapai target</p>
            </div>

        </div>
        <hr style="margin-top: 0;">

        <table class="tabel">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Indikator</th>
                    <th>Target</th>
                    <th>Hasil</th>
                    <th>Bulan</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                // $data = mysqli_query($koneksi, "SELECT  * FROM mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator");
                // while ($d = mysqli_fetch_array($data)) {
                foreach ($mutu as $d) {
                    $warna = 'black';
                    if ($d->target <= 5) {
                        if ($d->hasil > $d->target) {
                            $warna = 'red';
                        } else {
                            $warna = 'black';
                        }
                    } else {
                        if ($d->hasil < $d->target) {
                            $warna = 'red';
                        } else {
                            $warna = 'black';
                        }
                    }
                ?>
                    <tr>
                        <td class="text-center" style="color: <?= $warna ?>"><?= $nomor++; ?></td>
                        <td class="text-center" style="color: <?= $warna ?>"><?= $d->nama_indikator; ?></td>
                        <td class="text-center" style="color: <?= $warna ?>"><?php if ($d->target <= 5) {
                                                                                    echo '<= ' . $d->target;
                                                                                } else {
                                                                                    echo '>= ' . $d->target;
                                                                                } ?></td>
                        <td class="text-center" style="color: <?= $warna ?>"><?= $d->hasil ?></td>
                        <td class="text-center" style="color: <?= $warna ?>"><?= $d->bulan . '-' . $d->tahun  ?></td>
                        <td class="text-center" style="color: <?= $warna ?>"><?= $d->nama_unit; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

</body>

</html>