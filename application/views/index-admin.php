<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Sipenmaru | POLTEKKES KEMENKES PALEMBANG</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/nav-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/index-style.css">
    <script defer src="<?= base_url() ?>assets/scripts/nav-script.js"></script>
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
    <main>
        <div id="setting">
            <a href="<?= base_url() ?>/admin-setting">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="78px" viewBox="0 0 24 24" width="78px" fill="#1f5ba7"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M4,18v-0.65c0-0.34,0.16-0.66,0.41-0.81C6.1,15.53,8.03,15,10,15c0.03,0,0.05,0,0.08,0.01c0.1-0.7,0.3-1.37,0.59-1.98 C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26c-0.42-0.6-0.75-1.28-0.97-2H4z"/><path d="M10,12c2.21,0,4-1.79,4-4s-1.79-4-4-4C7.79,4,6,5.79,6,8S7.79,12,10,12z M10,6c1.1,0,2,0.9,2,2s-0.9,2-2,2 c-1.1,0-2-0.9-2-2S8.9,6,10,6z"/><path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z"/></g></g></svg>
            </a>
        </div>
        <h2>Data Sipenmaru Berdasarkan Jalur</h2>
        <div class="container">
            <a href="<?= base_url() ?>data-pendaftar?jalur=pmdp">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/img/login.png" alt="logo login">
                    </div>
                    <p>Jalur Penelusuran Minat dan Prestasi (PMDP)</p>
                </div>
            </a>
            <a href="<?= base_url() ?>data-pendaftar?jalur=ktmse">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/img/login.png" alt="logo login">
                    </div>
                    <p>Jalur Keluarga Tidak Mampu secara Ekonomi (KTMSE) / Keluarga Miskin (GAKIN)</p>
                </div>
            </a>
            <a href="<?= base_url() ?>data-pendaftar">
                <div class="card">
                    <div class="img">
                        <img src="<?= base_url() ?>assets/img/login.png" alt="logo login">
                    </div>
                    <p>Semua Jalur (PMDP & KTMSE/GAKIN)</p>
                </div>
            </a>
        </div>
    </main>
</body>
</html>