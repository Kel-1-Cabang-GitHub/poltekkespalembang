<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/style/nav-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/style/form-style.css">
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
        <div class="form-data">
            <div class="data pribadi active">
                <h2>Data Pribadi</h2>
            </div>
            <div class="data sekolah">
                <h2>Data Sekolah</h2>
            </div>
            <div class="form">
                <form action="#" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="">Nama Lengkap</label></td>
                            <td><input type="text" class="text"></td>
                        </tr>
                        <tr>
                            <td><label for="">Alamat Sesuai KTP</label></td>
                            <td><input type="text" class="text area"></td>
                        </tr>
                        <tr>
                            <td><label for="">Kode Pos</label></td>
                            <td><input type="text" class="text"></td>
                        </tr>
                        <tr>
                            <td><label for="">No.Telp/HP</label></td>
                            <td><input type="text" class="text" class="text" placeholder="*Disarankan memiliki whatsapp"></td>
                        </tr>
                        <tr>
                            <td><label for="">Nomor Induk Siswa Nasional (NISN)</label></td>
                            <td><input type="text" class="text"></td>
                        </tr>
                        <tr>
                            <td><label for="">Jenis Kelamin</label></td>
                            <td>
                                <input type="radio" value="Pria" name="jk"><span class="radio">Pria</span> 
                                <input type="radio" value="Wanita" name="jk"><span class="radio">Wanita</span> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Tinggi Badan</label></td>
                            <td><input type="number" min="0" class="text"></td>
                        </tr>
                        <tr>
                            <td><label for="">Berat Badan</label></td>
                            <td><input type="text" class="text"></td>
                        </tr>
                        <tr>
                            <td><label for="">Tempat Lahir</label></td>
                            <td><input type="text" class="text"></td>
                        </tr>
                        <tr>
                            <td><label for="">Tanggal Lahir</label></td>
                            <td><input type="date" class="text"></td>
                        </tr>
                        <tr>
                            <td><label for="">Pas Foto Terbaru</label></td>
                            <td><input type="file"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </main>
</body>
</html>