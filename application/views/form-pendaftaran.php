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
                    <div class="table-form siswa active">
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
                                    <input type="radio" value="Wanita" name="jenis_kelamin"><span class="radio">Wanita</span>
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
                                <td><input type="file" name="pas_foto" id="pas_foto" accept=".jpg, .jpeg, .png"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-form sekolah">
                        <table>
                            <tr>
                                <td><label for="">Jenis Pendidikan Menengah</label></td>
                                <td>
                                    <input type="radio" class="radio down" name="pd_menengah" id="" value="">Sekolah Menengah Atas (SMA) <br>
                                    <input type="radio" class="radio down" name="pd_menengah" id="" value="">Madrasah Aliyah (MA) <br>
                                    <input type="radio" class="radio down" name="pd_menengah" id="" value="">Sekolah Menengah Kejujuran (SMK) <br>
                                    <input type="radio" class="radio down" name="pd_menengah" id="" value="">Madrasah Aliyah Kejuruan (MAK) <br>
                                    <input type="radio" class="radio down" name="pd_menengah" id="" value="">Kelompok Belajar Paket C <br>
                                    <input type="radio" class="radio down" name="pd_menengah">Lainnya... <br>
                                    <input type="text" class="text other_opt disabled" name="pd_menengah" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Jurusan</label></td>
                                <td>
                                    <input type="radio" class="radio down" name="jurusan" id="" value="">IPA <br>
                                    <input type="radio" class="radio down" name="jurusan" id="" value="">IPS <br>
                                    <input type="radio" class="radio down" name="jurusan" id="" value="">SMK Keperawatan <br>
                                    <input type="radio" class="radio down" name="jurusan" id="" value="">SMK Farmasi <br>
                                    <input type="radio" class="radio down" name="jurusan" id="" value="">SMK Analisis Kesehatan<br>
                                    <input type="radio" class="radio down" name="jurusan">Lainnya... <br>
                                    <input type="text" class="text other_opt disabled" name="jurusan" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Nama Sekolah</label></td>
                                <td><input type="text" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Jenis Sekolah</label></td>
                                <td>
                                    <input type="radio" value="Negeri" name="jenis_sekolah"><span class="radio">Negeri</span>
                                    <input type="radio" value="Swasta" name="jenis_sekolah"><span class="radio">Swasta</span>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Provinsi Asal Sekolah</label></td>
                                <td><input type="text" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Kota/Kabupaten Asal Sekolah</label></td>
                                <td><input type="text" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Akreditasi Sekolah</label></td>
                                <td>
                                    <input type="radio" value="A" name="akreditasi_sekolah"><span class="radio">A</span>
                                    <input type="radio" value="B" name="akreditasi_sekolah"><span class="radio">B</span>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">Tahun Lulus/Tamat</label></td>
                                <td><input type="number" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Rekap Nilai Rapot</label></td>
                                <td><input type="file" name="" id="" accept=".pdf"></td>
                            </tr>
                            <tr>
                                <td><label for="">Rata-Rata Nilai Rapot</label></td>
                                <td><input type="number" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Peringkat Semester 1</label></td>
                                <td><input type="number" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Peringkat Semester 2</label></td>
                                <td><input type="number" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Peringkat Semester 3</label></td>
                                <td><input type="number" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Peringkat Semester 4</label></td>
                                <td><input type="number" class="text" name="" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Peringkat Semester 5</label></td>
                                <td><input type="number" class="text" name="" id=""></td>
                            </tr>
                        </table>
                    </div>
                    <div class="btn">
                        <button class="btn btn-back"><a href="<?= base_url(); ?>">Kembali</a></button>
                        <button type="submit" class="btn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="<?= base_url(); ?>/assets/scripts/form-script.js"></script>
</body>
</html>