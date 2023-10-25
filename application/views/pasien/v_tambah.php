<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h3>Tambah Data Barang</h3>
    <hr>

    <!-- form tambah barang -->
    <form method="post" action="<?= base_url('pasien/tambah_aksi'); ?>">
      <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" class="form-control" value="<?= set_value('nama_pasien'); ?>">
        <small><span class="text-danger"><i><?= form_error('nama_pasien'); ?></i></span></small>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin" class="form-control" value="<?= set_value('jenis_kelamin'); ?>">
        <small><span class="text-danger"><i><?= form_error('jenis_kelamin'); ?></i></span></small>
      </div>
      <div class="form-group">
        <label>Pendidikan</label>
        <input type="text" name="pendidikan" class="form-control" value="<?= set_value('pendidikan'); ?>">
        <small><span class="text-danger"><i><?= form_error('pendidikan'); ?></i></span></small>
      </div>
      <div class="form-group">
        <label>Pekerjaan</label>
        <input type="text" name="pekerjaan" class="form-control" value="<?= set_value('pekerjaan'); ?>">
        <small><span class="text-danger"><i><?= form_error('pekerjaan'); ?></i></span></small>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat'); ?>">
        <small><span class="text-danger"><i><?= form_error('alamat'); ?></i></span></small>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Data</button>
      <a href="<?= base_url('pasien'); ?>" class="btn btn-danger">Batal/Kembali</a>
    </form>

  </div>
</main>