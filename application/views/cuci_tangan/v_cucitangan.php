<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h3>Tambah Data Mutu</h3>
        <hr>
        <form method="post" action="<?= base_url('cucitangan/simpan'); ?>">
            <div class="form-group">
                <label>Numerator</label>
                <input type="number" name="numerator" class="form-control" value="<?= set_value('numerator'); ?>" required>
                <!-- <small><span class="text-danger"><i></i></span></small> -->
            </div>
            <div class="form-group">
                <label>Denominator</label>
                <input type="number" name="demunerator" class="form-control" value="<?= set_value('denominator'); ?>" required>
                <!-- <small><span class="text-danger"><i></i></span></small> -->
            </div>
            <!-- <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Hitung</button> -->

            <div class="form-group">
                <label>Indikator</label>
                <select class="form-control" name="indikator">
                    <?php
                    foreach ($opsi as $o) {
                        echo '<option value="' . $o['kd_indikator'] . '">' . $o['nama_indikator'] . '</option>';
                    }
                    ?>
                </select>
                <small><span class="text-danger"><i><?= form_error('indikator'); ?></i></span></small>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" class="form-control" required>
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Simpan Data</button>
            <a href="<?= base_url('mutu'); ?>" class="btn btn-danger">Batal/Kembali</a>
        </form>
    </div>
</main>