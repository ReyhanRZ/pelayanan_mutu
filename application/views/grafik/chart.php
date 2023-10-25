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
                <label>Pilih bulan dan tahun</label>
                <input type="date" name="date" required>
                <!-- <small><span class="text-danger"><i></i></span></small> -->
            </div>
            <button type="submit" name="btn" class="btn btn-primary" style="margin-bottom: 10px;">OKE</button>
            <?php if (isset($_POST['btn'])) {
                echo $_POST['date'];
                // $bulan = date('m', strtotime($_POST['date']));
                // echo $bulan;
            } ?>
        </form>


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
                        echo "'" . $data->nama_indikator . "',";
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Jumlah Pelayanan Mutu',
                    backgroundColor: '#ADD8E6',
                    borderColor: '##93C3D2',
                    data: [
                        <?php
                        if (isset($graph)) {
                            $collect = array(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
                            // $target = array(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL); 
                            //tadinya $target untuk color
                            foreach ($graph as $data) { //tampilkan dengan for each
                                //get nomor kd indikator
                                $get_indikator = $data->kd_indikator;
                                for ($i = 1; $i <= 12; $i++) {
                                    if ($get_indikator == $i) {
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