<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Data Pribadi | POLTEKKES KEMENKES PALEMBANG</title>
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
			</tr>
		</thead>
		<a href="data-pribadi-excel">Export to Excel</a>
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
</body>
</html>
