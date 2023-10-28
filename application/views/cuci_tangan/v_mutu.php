<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <?php if ($this->session->flashdata('simpan')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('simpan'); ?>
            </div>
        <?php endif ?>
        <?php if ($this->session->flashdata('edit')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('edit'); ?>
            </div>
        <?php endif ?>
        <?php if ($this->session->flashdata('hapus')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('hapus'); ?>
            </div>
        <?php endif ?>
        <div class="row row-md-12 align-items-center">
            <div class="col col-md-9">
                <h3>Data Mutu RS</h3>
                <p>*merah artinya tidak mencapai target</p>
            </div>
            <div class="col col-md-3">
                <!-- pdf -->
                <?php if (!isset($_POST['date'])) : ?>
                    <form method="post" action="generatepdfcontroller" target="_blank" style="margin: auto; align-items:center;text-align: center;">
                        <button type="submit" name="download" class="btn btn-success">Download PDF</button>
                    </form>
                <?php endif ?>
                <?php if (isset($_POST['date'])) : ?>
                    <form method="post" action="<?= base_url('generatepdfcontroller/get_filter'); ?>" target="_blank" style="margin: auto; align-items:center;text-align: center;">
                        <button type="submit" name="download" class="btn btn-success">Download PDF</button>
                    </form>
                <?php endif ?>
            </div>

        </div>
        <hr style="margin-top: 0;">

        <div class="row row-md-12">
            <div class="col col-md-3">
                <!-- tambah -->
                <a href="<?= base_url('mutu/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px">Tambah Data</a>
            </div>
            <div class="col col-md-9" style="text-align: end;">
                <!-- filter -->
                <form method="post" action="<?= base_url('mutu/filter'); ?>">
                    <div class="form-group">
                        <label>Filter :</label>
                        <input type="text" name="unit">
                    </div>
                    <div class="form-group">
                        <input type="date" name="date">
                        <!-- <small><span class="text-danger"><i></i></span></small> -->

                        <button type="submit" name="btn" class="btn btn-primary">OKE</button>
                        <?php if (isset($_POST['btn'])) {
                            echo $_POST['date'];
                            // $bulan = date('m', strtotime($_POST['date']));
                            // echo $bulan;
                        } ?>
                    </div>

                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Indikator</th>
                    <th>Target</th>
                    <th>Hasil</th>
                    <th>Bulan</th>
                    <th>Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                foreach ($mutu as $row) {
                    $warna = 'black';
                    if ($row->target <= 5) {
                        if ($row->hasil > $row->target) {
                            $warna = 'red';
                        } else {
                            $warna = 'black';
                        }
                    } else {
                        if ($row->hasil < $row->target) {
                            $warna = 'red';
                        } else {
                            $warna = 'black';
                        }
                    }
                ?>
                    <tr>
                        <td class="text-center" style="color: <?= $warna ?>"><?= $nomor; ?></td>
                        <td style="color: <?= $warna ?>"><?= $row->nama_indikator; ?></td>
                        <td style="color: <?= $warna ?>"><?php if ($row->target <= 5) {
                                                                echo '<= ' . $row->target;
                                                            } else {
                                                                echo '>= ' . $row->target;
                                                            } ?></td>
                        <td style="color: <?= $warna ?>"><?= $row->hasil; ?></td>
                        <td style="color: <?= $warna ?>"><?= $row->bulan
                                                                . "-" .
                                                                $row->tahun ?></td>
                        <td style="color: <?= $warna ?>"><?= $row->nama_unit; ?></td>
                        <td>
                            <a href="<?= base_url('mutu/edit/') . $row->kd_mutu; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('mutu/hapus/') . $row->kd_mutu; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php $nomor++;
                } ?>
            </tbody>
        </table>
    </div>
</main>