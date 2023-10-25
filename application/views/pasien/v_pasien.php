<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
	<div class="container">
		<h3>Registrasi Pasien</h3>
		<hr>
		<a href="<?= base_url('pasien/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px">Tambah Data</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No RM</th>
					<th>Nama Pasien</th>
					<th>Jenis Kelamin</th>
					<th>Pendidikan</th>
					<th>Pekerjaan</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no_rm = 1;
				foreach ($pasien as $row) { ?>
					<tr>
						<td class="text-center"><?= $no_rm; ?></td>
						<td><?= $row->nama_pasien; ?></td>
						<td><?= $row->jenis_kelamin; ?></td>
						<td><?= $row->pendidikan; ?></td>
						<td><?= $row->pekerjaan; ?></td>
						<td><?= $row->alamat; ?></td>
						<td>
							<a href="<?= base_url('pasien/edit/') . $row->no_medicalrecord; ?>" class="btn btn-warning">Edit</a>
							<a href="<?= base_url('pasien/hapus/') . $row->no_medicalrecord; ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php $no_rm++;
				} ?>
			</tbody>
		</table>
	</div>
</main>