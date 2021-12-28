<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | POLTEKKES KEMENKES PALEMBANG</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/nav-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/form-style.css">
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
        <div class="form-login">
            <h1>Login Admin</h1>
            <form action="<?= base_url(); ?>/Admin_Controller/login" method="POST">
                <span class="input-text">
                    <label for="username">Username</label>
                    <input type="text" class="text" name="username" id="username">
                </span>
                <span class="input-text">
                    <label for="password">Password</label>
                    <input type="password" class="text" name="password" id="password">
                </span>
                <div class="btn-page">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
