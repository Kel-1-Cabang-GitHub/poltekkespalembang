<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Data Pendaftar | POLTEKKES KEMENKES PALEMBANG</title>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/nav-style.css">
</head>
<body>
    <header>
        <nav>
            <img src="<?= base_url() ?>assets/img/logo.jpg" alt="logo">
            <div class="brand">
                <h3>Penerimaan Mahasiswa Baru</h3>
                <h3>Poltekkes Kemenkes Palembang</h3>
            </div>
        </nav>
    </header>
	<a href="export-to-excel">Export to Excel</a>
	<h1>Data Pribadi</h1>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Lengkap</th>
				<th>Alamat Sesuai KTP</th>
				<th>Kode Pos</th>
				<th>Nomor Induk Siswa Nasional (NISN)</th>
				<th>No.Telp/HP</th>
				<th>Jenis Kelamin</th>
				<th>Tinggi Badan (cm)</th>
				<th>Berat Badan (kg)</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Pas Foto Terbaru</th>
				<th>Jalur Pendaftaran</th>
				<th>Detail</th>
				<th>Ubah Data</th>
				<th>Hapus Data</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter = 1; ?>
			<?php if (isset($data_pribadi) && !empty($data_pribadi)): ?>
				<?php foreach ($data_pribadi as $key => $data): ?>
					<tr>
						<td><?= $counter; ?></td>
						<td><?= $data['nama_lengkap']; ?></td>
						<td><?= $data['alamat']; ?></td>
						<td><?= $data['kode_pos']; ?></td>
						<td><?= $data['nisn']; ?></td>
						<td><?= $data['no_telepon']; ?></td>
						<td><?= $data['jenis_kelamin']; ?></td>
						<td><?= $data['tinggi_badan']; ?></td>
						<td><?= $data['berat_badan']; ?></td>
						<td><?= $data['tempat_lahir']; ?></td>
						<td><?= $data['tanggal_lahir']; ?></td>
						<td><?= $data['pas_foto']; ?></td>
						<td><?= $data['jalur_pendaftaran']; ?></td>
						<td><a href="">Detail <?= $data['id'] ?></a></td>
						<td><a href="">Ubah <?= $data['id'] ?></a></td>
						<td><a href="">Hapus <?= $data['id'] ?></a></td>
					</tr>
					<?php $counter++; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="13">No Records founds</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<hr>
	<h1>Data Sekolah</h1>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>NISN</th>
				<th>Jenis Pendidikan Menengah</th>
				<th>Jurusan</th>
				<th>Nama Sekolah</th>
				<th>Jenis Sekolah</th>
				<th>Provinsi Asal Sekolah</th>
				<th>Kota/Kabupaten Asal Sekolah</th>
				<th>AkrUbahasi Sekolah</th>
				<th>Tahun Lulus/Tamat</th>
				<th>Rekap Nilai Rapot</th>
				<th>Rata-Rata Nilai Rapot</th>
				<?php for ($i = 1; $i <= 5; $i++): ?>
					<th>Peringkat Semester <?= $i ?></th>
				<?php endfor; ?>
				<th>Detail</th>
				<th>Ubah Data</th>
				<th>Hapus Data</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter = 1; ?>
			<?php if (isset($data_sekolah) && !empty($data_sekolah)): ?>
				<?php foreach ($data_sekolah as $key => $data): ?>
					<tr>
						<td><?= $counter; ?></td>
						<td><?= $data['nisn']; ?></td>
						<td><?= $data['jenis_pendidikan_menengah']; ?></td>
						<td><?= $data['jurusan']; ?></td>
						<td><?= $data['nama_sekolah']; ?></td>
						<td><?= $data['jenis_sekolah']; ?></td>
						<td><?= $data['provinsi_asal_sekolah']; ?></td>
						<td><?= $data['kota_kabupaten_asal_sekolah']; ?></td>
						<td><?= $data['akrUbahasi_sekolah']; ?></td>
						<td><?= $data['tahun_lulus']; ?></td>
						<td><?= $data['rekap_nilai_rapot']; ?></td>
						<td><?= $data['rata_rata_nilai_rapot']; ?></td>
						<?php for ($i = 1; $i <= 5; $i++): ?>
							<td><?= $data["peringkat_semester_$i"]; ?></td>
						<?php endfor; ?>
						<td><a href="">Detail <?= $data['id'] ?></a></td>
						<td><a href="">Ubah <?= $data['id'] ?></a></td>
						<td><a href="">Hapus <?= $data['id'] ?></a></td>
					</tr>
					<?php $counter++; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="17">No Records founds</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<hr>
	<h1>Program Studi</h1>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>NISN</th>
				<th>Bukti Pembayaran</th>
				<th>Program Studi Pilihan 1</th>
				<th>Program Studi Pilihan 2</th>
				<th>Detail</th>
				<th>Ubah Data</th>
				<th>Hapus Data</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter = 1; ?>
			<?php if (isset($program_studi) && !empty($program_studi)): ?>
				<?php foreach ($program_studi as $key => $data): ?>
					<tr>
						<td><?= $counter; ?></td>
						<td><?= $data['nisn']; ?></td>
						<td><?= $data['bukti_pembayaran']; ?></td>
						<td><?= $data['program_studi_pilihan_1']; ?></td>
						<td><?= $data['program_studi_pilihan_2']; ?></td>
						<td><a href="">Detail <?= $data['id'] ?></a></td>
						<td><a href="">Ubah <?= $data['id'] ?></a></td>
						<td><a href="">Hapus <?= $data['id'] ?></a></td>
					</tr>
					<?php $counter++; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="5">No Records founds</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<hr>
	<h1>Data Prestasi</h1>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>NISN</th>
				<?php for ($i = 1; $i <= 5; $i++): ?>
					<th>Prestasi <?= $i ?></th>
				<?php endfor; ?>
				<th>Detail</th>
				<th>Ubah Data</th>
				<th>Hapus Data</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter = 1; ?>
			<?php if (isset($data_prestasi) && !empty($data_prestasi)): ?>
				<?php foreach ($data_prestasi as $key => $data): ?>
					<tr>
						<td><?= $counter ?></td>
						<td><?= $data['nisn'] ?></td>
						<?php for ($i = 1; $i <= 5; $i++): ?>
							<td><?= $data["prestasi_$i"] ?></td>
						<?php endfor; ?>
						<td><a href="">Detail <?= $data['id'] ?></a></td>
						<td><a href="">Ubah <?= $data['id'] ?></a></td>
						<td><a href="">Hapus <?= $data['id'] ?></a></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7">No Records founds</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</body>
</html>
