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
                <form action="<?= base_url() ?>/Daftar_Controller/form_pendaftaran" method="POST" enctype="multipart/form-data">
                    <table>
                        <input type="hidden" name="jalur_pendaftaran" id="jalur_pendaftaran" value="<?= $_GET['jalur'] ?>">
                        <tr>
                            <td><label for="">Nama Lengkap</label></td>
                            <td><input type="text" class="text" name="nama_lengkap" id="nama_lengkap"></td>
                        </tr>
                        <tr>
                            <td><label for="">Alamat Sesuai KTP</label></td>
                            <td><input type="text" class="text area" name="alamat" id="alamat"></td>
                        </tr>
                        <tr>
                            <td><label for="">Kode Pos</label></td>
                            <td><input type="text" class="text" name="kode_pos" id="kode_pos"></td>
                        </tr>
                        <tr>
                            <td><label for="">No.Telp/HP</label></td>
                            <td><input type="text" class="text" class="text" placeholder="*Disarankan memiliki whatsapp" name="no_telepon" id="no_telepon"></td>
                        </tr>
                        <tr>
                            <td><label for="">Nomor Induk Siswa Nasional (NISN)</label></td>
                            <td><input type="text" class="text" name="nisn" id="nisn"></td>
                        </tr>
                        <tr>
                            <td><label for="">Jenis Kelamin</label></td>
                            <td>
                                <input type="radio" value="Pria" name="jenis_kelamin" id="jenis_kelamin"><span class="radio">Pria</span>
                                <input type="radio" value="Wanita" name="jenis kelamin"><span class="radio">Wanita</span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Tinggi Badan</label></td>
                            <td><input type="number" min="0" class="text" name="tinggi_badan" id="tinggi_badan"></td>
                        </tr>
                        <tr>
                            <td><label for="">Berat Badan</label></td>
                            <td><input type="text" class="text" name="berat_badan" id="berat_badan"></td>
                        </tr>
                        <tr>
                            <td><label for="">Tempat Lahir</label></td>
                            <td><input type="text" class="text" name="tempat_lahir" id="tempat_lahir"></td>
                        </tr>
                        <tr>
                            <td><label for="">Tanggal Lahir</label></td>
                            <td><input type="date" class="text" name="tanggal_lahir" id="tanggal_lahir"></td>
                        </tr>
                        <tr>
                            <td><label for="">Pas Foto Terbaru</label></td>
                            <td><input type="file" name="pas_foto" id="pas_foto"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </main>
</body>
</html>