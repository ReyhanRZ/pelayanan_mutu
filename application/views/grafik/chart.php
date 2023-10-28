<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Reyhan</title>
</head>

<body>

    <div class="container" style="margin-top: 10vh;">
        <form method="post" action="<?= base_url('grafik/filter'); ?>">
            <div class="form-group">
                <label>Pilih Unit :</label>
                <select name="unit" id="unit" required>
                    <option value="" selected disabled>-- SILAHKAN PILIH UNIT --</option>
                    <?php
                    foreach ($unit as $u) {
                        echo '<option value="' . $u['kd_unit'] . '">' . $u['nama_unit'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Indikator :</label>
                <select name="indikator" id="indikator" required>
                    <option value="" selected disabled>-- SILAHKAN PILIH INDIKATOR --</option>
                    <?php
                    foreach ($indikator as $i) {
                        echo '<option value="' . $i['kd_indikator'] . '">' . $i['nama_indikator'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Tahun :</label>
                <select class="form-control" name="tahun" required>
                    <option value="" selected disabled>-- SILAHKAN PILIH TAHUN --</option>
                    <?php
                    for ($year = (int)date('Y'); 2000 <= $year; $year--) : ?>
                        <option value="<?= $year; ?>"><?= $year; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <!-- <div class="form-group">
                <label>Pilih bulan dan tahun</label>
                <input type="date" name="date" required>
            </div> -->
            <button type="submit" name="btn" class="btn btn-primary" style="margin-bottom: 10px;">OKE</button>
        </form>
        <?php if (isset($_POST['btn'])) { ?>
            <h6 style="text-align: center;">Unit : <?php
                                                    if ($perunit != null) {
                                                        foreach ($perunit as $u) {
                                                            $getunit = $u->kd_unit;
                                                            $getpost = $_POST['unit'];
                                                            if ($getunit == $getpost) {
                                                                $getunitname = $u->nama_unit;
                                                            }
                                                        }
                                                        echo $getunitname;
                                                    } else {
                                                        $kd_unit = $_POST['unit'];
                                                        $data = $this->db->query("SELECT unit.nama_unit from unit WHERE unit.kd_unit = $kd_unit");
                                                        foreach ($data->result() as $row) {
                                                            echo $row->nama_unit;
                                                        }
                                                    }

                                                    ?></h6>
            <h6 style="text-align: center;">Indikator : <?php
                                                        if ($perunit != null) {
                                                            foreach ($perunit as $u) {
                                                                $getindikator = $u->kd_indikator;
                                                                $getpost = $_POST['indikator'];
                                                                if ($getindikator == $getpost) {
                                                                    $getindikatorname = $u->nama_indikator;
                                                                }
                                                            }
                                                            echo $getindikatorname;
                                                        } else {
                                                            $kd_indikator = $_POST['indikator'];
                                                            $data = $this->db->query("SELECT indikator.nama_indikator from indikator WHERE indikator.kd_indikator = $kd_indikator");
                                                            foreach ($data->result() as $row) {
                                                                echo $row->nama_indikator;
                                                            }
                                                        }
                                                        ?></h6>
            <h6 style="text-align: center;">Tahun : <?= $_POST['tahun'] ?></h6>
        <?php } ?>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    foreach ($title as $data) {
                        echo "'" . $data . "',";
                    }
                    // for ($i = 0; $i < 12; $i++) {
                    //     echo "'" . $title[$i] . "',";
                    // }
                    ?>
                ],
                datasets: [{
                    label: 'Jumlah Pelayanan Mutu',
                    backgroundColor: '#ADD8E6',
                    borderColor: '##93C3D2',
                    data: [
                        <?php
                        if (isset($perunit)) {
                            $collect = array(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
                            // $target = array(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL); 
                            //tadinya $target untuk color
                            foreach ($perunit as $data) { //tampilkan dengan for each
                                //get nomor kd indikator
                                $get_bulan = $data->bulan;
                                for ($i = 1; $i <= 12; $i++) {
                                    if ($get_bulan == $i) {
                                        $collect[$i - 1] = $data->hasil;
                                    }
                                }
                            }
                            for ($i = 0; $i < 12; $i++) {
                                echo $collect[$i] . ", ";
                            }
                        }

                        //  if (count($graph) > 0) { //kalau ada data untuk grafik
                        // $graphs = array();
                        // $titles = array();
                        // for ($i = 1; $i <= 12; $i++) { //isi semua array
                        //     if ($graph->kd_indikator == $i) {
                        //         $graphs[$i] = $graph->hasil;
                        //     } else {
                        //         $graphs[$i] = null;
                        //         // $titles[$i] = $i;
                        //     }
                        //     echo $graphs[$i];
                        // }
                        // var_dump($graphs);


                        //get nomor kd indikator
                        // $get_indikator = $graph->kd_indikator;
                        // $collect = array(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
                        // foreach ($graph as $data) { //tampilkan dengan for each
                        //get nomor kd indikator
                        //$get_indikator = $data->kd_indikator;

                        // for ($i = 1; $i <= 12; $i++) {
                        //     if ($get_indikator == $i) {
                        //         $collect[$i] = $data->hasil;
                        //     }
                        //     $array = array(
                        //         "index" => "$i",
                        //         "hasil" => "$hasil"
                        //     );
                        // }
                        // echo $data->hasil . ", ";
                        //echo $collect;
                        // }
                        // }
                        // for ($i = 0; $i < 12; $i++) {
                        //     echo $collect[$i];
                        // }
                        //    }
                        ?>
                    ]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>