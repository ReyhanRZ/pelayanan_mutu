<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">

        <form method="post" action="<?= base_url('cucitangan/hitung'); ?>">
            <div class="form-group">
                <label>Numerator</label>
                <input type="number" name="numerator" class="form-control" value="<?= set_value('numerator'); ?>">
                <small><span class="text-danger"><i><?= form_error('numerator'); ?></i></span></small>
            </div>
            <div class="form-group">
                <label>Denominator</label>
                <input type="number" name="denominator" class="form-control" value="<?= set_value('denominator'); ?>">
                <small><span class="text-danger"><i><?= form_error('denominator'); ?></i></span></small>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Hitung</button>
            <?php if (isset($hasil)) : ?>
                <div class="form-group">
                    <label>Hasil :</label>
                    <input type="number" name="hasil" class="form-control" value="<?= $hasil; ?>" disabled>
                </div>
            <?php endif ?>
        </form>
    </div>
</main>