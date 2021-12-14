<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipenmaru | POLTEKKES KEMENKES PALEMBANG</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/style/nav-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/style/index-style.css">
</head>
<body>
    <header>
        <nav>
            <img src="<?= base_url() ?>/assets/img/logo.jpg" alt="logo">
            <div class="brand">
                <h3>Penerimaan Mahasiswa Baru</h3>
                <h3>Poltekkes Kemenkes Palembang</h3>
            </div>
        </nav>
    </header>
    <main>
        <h2>Pilih jalur Sipenmaru yang akan diikuti</h2>
        <div class="container">
            <a href="<?= base_url(); ?>form-pendaftaran?jalur=pmdp">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url(); ?>/assets/img/login.png" alt="logo login">
                    </div>
                    <p>Jalur penelusuran minat dan prestasi (PMDP)</p>
                </div>
            </a>
            <a href="<?= base_url(); ?>form-pendaftaran?jalur=ktmse">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url(); ?>/assets/img/login.png" alt="logo login">
                    </div>
                    <p>Jalur Keluarga Tidak Mampu secara Ekonomi (KTMSE) / Keluarga Miskin (GAKIN)</p>
                </div>
            </a>
        </div>
    </main>
</body>
</html>