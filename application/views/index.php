<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipenmaru | POLTEKKES KEMENKES PALEMBANG</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/nav-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/index-style.css">
    <script defer src="<?= base_url() ?>assets/scripts/nav-script.js"></script>
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
            <a href="form-pendaftaran?jalur=pmdp">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/img/login.png" alt="logo login">
                    </div>
                    <p>Jalur Penelusuran Minat dan Prestasi (PMDP)</p>
                </div>
            </a>
            <a href="form-pendaftaran?jalur=ktmse">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/img/login.png" alt="logo login">
                    </div>
                    <p>Jalur Keluarga Tidak Mampu secara Ekonomi (KTMSE) / Keluarga Miskin (GAKIN)</p>
                </div>
            </a>
        </div>
    </main>
</body>
</html>
