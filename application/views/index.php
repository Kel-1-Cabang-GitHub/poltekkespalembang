<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipenmaru | POLTEKKES KEMENKES PALEMBANG</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url() ?>assets/styles/base-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/index-style.css">
    <script defer src="<?= base_url() ?>assets/scripts/jquery-3.6.0.min.js"></script>
    <script defer src="<?= base_url() ?>assets/scripts/base-script.js"></script>
</head>
<body>
    <header>
        <nav>
            <img src="<?= base_url() ?>assets/img/logo.jpg" alt="logo">
            <div class="brand" id="<?= base_url(); ?>">
                <h3>Penerimaan Mahasiswa Baru</h3>
                <h3>Poltekkes Kemenkes Palembang</h3>
            </div>
        </nav>
    </header>
    <main>
        <h2>Pilih jalur Sipenmaru yang akan diikuti</h2>
        <div class="container">
            <a href="<?= base_url() ?>form-pendaftaran/pmdp">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/img/daftar.png" alt="logo login">
                    </div>
                    <p>Jalur Penelusuran Minat dan Prestasi (PMDP)</p>
                </div>
            </a>
            <a href="<?= base_url() ?>form-pendaftaran/ktmse">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/img/daftar.png" alt="logo login">
                    </div>
                    <p>Jalur Keluarga Tidak Mampu secara Ekonomi (KTMSE) / Keluarga Miskin (GAKIN)</p>
                </div>
            </a>
        </div>
		<div class="scroll">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg>
        </div>
    </main>
</body>
</html>
