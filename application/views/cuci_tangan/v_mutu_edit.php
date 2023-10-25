<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h3>Edit Data Mutu</h3>
        <hr>
        <?php
        // if (!empty($mutu)) {
        foreach ($mutu as $row) {
        ?>
            <form method="post" action="<?= base_url('mutu/simpan_edit'); ?>">
                <input type="hidden" name="id" value="<?= $row->kd_mutu; ?>">
                <div class="form-group">
                    <label>Numerator</label>
                    <input type="number" name="numerator" class="form-control" value="<?= $row->numerator; ?>" required>
                    <!-- <small><span class="text-danger"><i></i></span></small> -->
                </div>
                <div class="form-group">
                    <label>Denominator</label>
                    <input type="number" name="demunerator" class="form-control" value="<?= $row->demunerator; ?>" required>
                    <!-- <small><span class="text-danger"><i></i></span></small> -->
                </div>
                <!-- <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Hitung</button> -->

                <div class="form-group">
                    <label>Indikator</label>
                    <?php
                    $indikator = $row->nama_indikator;
                    echo '<p style="font-weight:bold">Sebelumnya :' . $indikator . '</p>';
                    ?>
                    <select class="form-control" name="indikator">
                        <?php
                        foreach ($opsi as $o) {
                            echo '<option value="' . $o['kd_indikator'] . '">' . $o['nama_indikator'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <?php
                    $bulan = $row->bulan;
                    $tahun = $row->tahun;
                    echo '<p style="font-weight:bold">**Sebelumnya : bulan ' . $bulan . ' tahun ' . $tahun . '</p>';
                    ?>
                    <input type="date" name="tgl" class="form-control" required>
                </div>
                <button type="submit" name="btn" class="btn btn-primary">Simpan Data</button>
                <a href="<?= base_url('mutu'); ?>" class="btn btn-danger">Batal/Kembali</a>
            </form>
        <?php }
        //} simppan ediiiiiiiiittttttttttt
        ?>
    </div>
</main>