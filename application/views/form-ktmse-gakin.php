<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Pendaftaran | POLTEKKES KEMENKES PALEMBANG</title>
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

	<h1>Upload Berkas</h1>
	<p>Peserta yang memilih jalur KTMSE/GAKIN. wajib mengupload berkas-berkas sebagai berikut</p>

	<p>
		a. Surat Keterangan Miskin dari Kelurahan/Desa Tempat Tinggal yang Bersangkutan
		b. Surat Keterangan Penghasilan Keluarga dari Kelurahan/Desa
		c. Foto Rumah Tempat TInggal Orang Tua (Foto depan, Belakang, Kanan dan Kiri)

		Peserta yang mendaftar pada Sipenmaru Jalur KTMSE/GAKIN Tidak diperbolehkan Mendaftar Pada
		Sipenmaru Jalur PMDP ataupun sebaliknya.
	</p>

	<form action="" method="POST">
		<?= validation_errors() ?>
        <div class="confirm-alert" id="confirm-alert">
            <div class="ca-head">
                <svg xmlns="http://www.w3.org/2000/svg" height="46px" viewBox="0 0 24 24" width="46px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                <h2>Konfirmasi</h2>
            </div>
            <div class="ca-body">
                <p>Pastikan data yang anda masukkan sudah sesuai. Apakah anda sudah yakin dengan data yang telah diinputkan? Pilih simpan untuk melanjutkan</p>
                <div class="ca-button">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="a-btn btn-danger batal-simpan" id="ca-cancel">Batal</a>
                </div>
            </div>
        </div>

		<p>Upload Surat Keterangan Miskin dari Kelurahan/Desa Tempat Tinggal yang Bersangkutan</p>
		<input type="file" name="" id="" accept=".jpg, .jpeg, .png">

		<p>Upload Surat Keterangan Penghasilan Keluarga dari Kelurahan/Desa</p>
		<input type="file" name="" id="" accept=".jpg, .jpeg, .png">

		<p>Upload Foto Rumah Tempat TInggal Orang Tua (Foto Depan, Belakang, Kanan dan Kiri)</p>
		<input type="file" name="" id="" accept=".jpg, .jpeg, .png" multiple>

		<a>Simpan</a>
	</form>
</body>
</html>
