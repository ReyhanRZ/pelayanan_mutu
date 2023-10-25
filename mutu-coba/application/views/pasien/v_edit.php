<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h3>Edit Data Pasien</h3>
    <hr>
    <?php foreach ($pasien as $row) { ?>
      <!-- form tambah barang -->
      <form method="post" action="<?= base_url('pasien/edit_aksi'); ?>">
        <input type="hidden" name="id" value="<?= $row->no_medicalrecord; ?>">
        <div class="form-group">
          <label>Nama Pasien</label>
          <input type="text" name="nama_pasien" class="form-control" value="<?= $row->nama_pasien; ?>">
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <input type="text" name="jenis_kelamin" class="form-control" value="<?= $row->jenis_kelamin; ?>">
        </div>
        <div class="form-group">
          <label>Pendidikan</label>
          <input type="text" name="pendidikan" class="form-control" value="<?= $row->pendidikan; ?>">
        </div>
        <div class="form-group">
          <label>Pekerjaan</label>
          <input type="text" name="pekerjaan" class="form-control" value="<?= $row->pekerjaan; ?>">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" value="<?= $row->alamat; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="<?= base_url('pasien'); ?>" class="btn btn-danger">Batal/Kembali</a>
      </form>
    <?php } ?>
  </div>
</main>