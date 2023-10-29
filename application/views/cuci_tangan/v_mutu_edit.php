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
                    <select class="form-control" name="indikator">
                        <option style="font-weight: bold;" value="<?= $row->nama_indikator; ?>" selected disabled><?= $row->nama_indikator ?></option>
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
                <div class="form-group">
                    <label>Unit</label>
                    <select class="form-control" name="unit" required>
                        <option style="font-weight: bold;" value="<?= $row->nama_unit; ?>" selected disabled><?= $row->nama_unit ?></option>
                        <?php
                        foreach ($unit as $u) {
                            echo '<option value="' . $u['kd_unit'] . '">' . $u['nama_unit'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="btn" class="btn btn-primary">Simpan Data</button>
                <a href="<?= base_url('mutu'); ?>" class="btn btn-danger">Batal/Kembali</a>
            </form>
        <?php }
        //} simppan ediiiiiiiiittttttttttt
        ?>
    </div>
</main>