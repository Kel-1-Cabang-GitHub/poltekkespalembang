<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Pendaftaran | POLTEKKES KEMENKES PALEMBANG</title>
        <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
        <link rel="stylesheet" href="<?= base_url() ?>assets/styles/nav-style.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/styles/form-style.css">
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
        <div class="form-data">
            <div class="data pribadi active">
                <h2>Data Pribadi</h2>
            </div>
            <div class="data sekolah">
                <h2>Data Sekolah</h2>
            </div>
            <div class="form">
                <form action="form-pendaftaran?jalur=<?= $this->input->get('jalur'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- <?= validation_errors() ?> -->
                    <div class="confirm-alert" id="confirm-alert">
                        <div class="ca-head">
                            <svg xmlns="http://www.w3.org/2000/svg" height="46px" viewBox="0 0 24 24" width="46px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            <h2>Konfirmasi</h2>
                        </div>
                        <div class="ca-body">
                            <!-- <img src="<?= base_url(); ?>/assets/icons/" alt=""> -->
                            <p>Pastikan data yang anda masukkan sudah sesuai. Apakah anda sudah yakin dengan data yang telah diinputkan? Pilih simpan untuk melanjutkan</p>
                            <div class="ca-button">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button class="btn btn-danger" id="ca-cancel">Batal</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-form siswa active">
                        <span class="label-input"><label class="form-label" for="nama_lengkap">Nama Lengkap</label></span>
                        <input type="text" class="text" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" autofocus>
                        <span class="label-input"><label class="form-label" for="alamat">Alamat Sesuai KTP</label></span>
                        <textarea class="text area" name="alamat" id="alamat"><?= set_value('alamat') ?></textarea>
                        <span class="label-input"><label class="form-label" for="kode_pos">Kode Pos</label></span>
                        <input type="text" class="text" name="kode_pos" id="kode_pos" value="<?= set_value('kode_pos') ?>" placeholder="xxxxx">
                        <span class="label-input"><label class="form-label" for="no_telepon">No.Telp/HP</label></span>
                        <input type="text" class="text" class="text" placeholder="*Disarankan memiliki whatsapp" name="no_telepon" id="no_telepon" value="<?= set_value('no_telepon') ?>">
                        <span class="label-input"><label class="form-label" for="nisn">Nomor Induk Siswa Nasional (NISN)</label></span>
                        <input type="text" class="text" name="nisn" id="nisn" value="<?= set_value('nisn') ?>">
                        <span class="label-input"><label class="form-label" for="jenis_kelamin">Jenis Kelamin</label></span>
                        <div class="radio-hz">
                            <input type="radio" value="Pria" name="jenis_kelamin" id="jenis_kelamin rad-pria" <?= set_radio('jenis_kelamin', 'Pria') ?> >
                            <span class="radio"><label for="jenis_kelamin rad-pria">Pria</label></span>
                            <input type="radio" value="Wanita" name="jenis_kelamin" id="jenis_kelamin rad-wanita" <?= set_radio('jenis_kelamin', 'Wanita') ?> >
                            <span class="radio"><label for="jenis_kelamin rad-wanita">Wanita</label></span>
                        </div>
                        <span class="label-input"><label class="form-label" for="tinggi_badan">Tinggi Badan</label></span>
                        <input type="number" min="0" class="text" name="tinggi_badan" id="tinggi_badan" value="<?= set_value('tinggi_badan') ?>">
                        <span class="label-input"><label class="form-label" for="berat_badan">Berat Badan</label></span>
                        <input type="number" min="0" class="text" name="berat_badan" id="berat_badan" value="<?= set_value('berat_badan') ?>">
                        <span class="label-input"><label class="form-label" for="tempat_lahir">Tempat Lahir</label></span>
                        <input type="text" class="text" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir') ?>" list="daftar_tempat_lahir" placeholder="*Mohon isi sendiri jika tidak ada!">
                        <datalist id="daftar_tempat_lahir">
                            <option value="Banyuasin">
                            <option value="Empat Lawang">
                            <option value="Lahat">
                            <option value="Muara Enim">
                            <option value="Musi Banyuasin">
                            <option value="Musi Rawas">
                            <option value="Musi Rawas Utara">
                            <option value="Ogan Ilir">
                            <option value="Ogan Komering Ilir">
                            <option value="Ogan Komering Ulu">
                            <option value="Ogan Komering Ulu Selatan">
                            <option value="Ogan Komering Ulu Timur">
                            <option value="Penukal Abab Lematang Ilir">
                            <option value="Lubuk Linggau">
                            <option value="Pagar Alam">
                            <option value="Palembang">
                            <option value="Prabumulih">
                        </datalist>
                        <span class="label-input"><label class="form-label" for="tanggal_lahir">Tanggal Lahir</label></span>
                        <input type="date" class="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
                        <span class="label-input"><label class="form-label" for="pas_foto">Pas Foto Terbaru</label></span>
                        <input type="file" name="pas_foto" id="pas_foto" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="table-form sekolah">
                    <span class="label-input"><label class="form-label" for="jenis_pendidikan_menengah">Jenis Pendidikan Menengah</label></span>
                        <div class="radio-vr">
                            <input type="radio" class="radio down jpm_fixed" name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah jpm-sma" value="Sekolah Menengah Atas (SMA)" <?= set_radio('jenis_pendidikan_menengah', 'Sekolah Menengah Atas (SMA)') ?> >
                            <label for="jenis_pendidikan_menengah jpm-sma">Sekolah Menengah Atas (SMA)</label><br>
                            <input type="radio" class="radio down jpm_fixed" name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah jpm-ma" value="Madrasah Aliyah (MA)" <?= set_radio('jenis_pendidikan_menengah', 'Madrasah Aliyah (MA)') ?> >
                            <label for="jenis_pendidikan_menengah jpm-ma">Madrasah Aliyah (MA)</label> <br>
                            <input type="radio" class="radio down jpm_fixed" name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah jpm-smk" value="Sekolah Menengah Kejuruan (SMK)" <?= set_radio('jenis_pendidikan_menengah', 'Sekolah Menengah Kejuruan (SMK)') ?> >
                            <label for="jenis_pendidikan_menengah jpm-smk">Sekolah Menengah Kejuruan (SMK)</label><br>
                            <input type="radio" class="radio down jpm_fixed" name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah jpm-mak" value="Madrasah Aliyah Kejuruan (MAK)" <?= set_radio('jenis_pendidikan_menengah', 'Madrasah Aliyah Kejuruan (MAK)') ?> >
                            <label for="jenis_pendidikan_menengah jpm-mak">Madrasah Aliyah Kejuruan (MAK)</label><br>
                            <input type="radio" class="radio down jpm_fixed" name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah jpm-kbpc" value="Kelompok Belajar Paket C" <?= set_radio('jenis_pendidikan_menengah', 'Kelompok Belajar Paket C') ?> >
                            <label for="jenis_pendidikan_menengah jpm-kbpc">Kelompok Belajar Paket C</label><br>
                            <input type="radio" class="radio down" name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah lainnya1"
                            <?php if (set_value('jenis_pendidikan_menengah') == ''): ?>
                            <?php elseif (
                                set_value('jenis_pendidikan_menengah') != 'Sekolah Menengah Atas (SMA)' &&
                                set_value('jenis_pendidikan_menengah') != 'Madrasah Aliyah (MA)' &&
                                set_value('jenis_pendidikan_menengah') != 'Sekolah Menengah Kejuruan (SMK)' &&
                                set_value('jenis_pendidikan_menengah') != 'Madrasah Aliyah Kejuruan (MAK)' &&
                                set_value('jenis_pendidikan_menengah') != 'Kelompok Belajar Paket C'
                            ): ?>
                                checked
                            <?php endif; ?> >
                            <label for="jenis_pendidikan_menengah lainnya1">Lainnya...</label><br>
                            <input type="text" class="text other_opt
                            <?php if (set_value('jenis_pendidikan_menengah') == ''): ?>
                                disabled
                            <?php elseif (
                                set_value('jenis_pendidikan_menengah') != 'Sekolah Menengah Atas (SMA)' &&
                                set_value('jenis_pendidikan_menengah') != 'Madrasah Aliyah (MA)' &&
                                set_value('jenis_pendidikan_menengah') != 'Sekolah Menengah Kejuruan (SMK)' &&
                                set_value('jenis_pendidikan_menengah') != 'Madrasah Aliyah Kejuruan (MAK)' &&
                                set_value('jenis_pendidikan_menengah') != 'Kelompok Belajar Paket C'
                            ): ?>
                            <?php else: ?>
                                disabled
                            <?php endif; ?>"
                            name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah disabled" value="<?= set_value('jenis_pendidikan_menengah') ?>"
                            <?php if (set_value('jenis_pendidikan_menengah') == ''): ?>
                                disabled
                            <?php elseif (
                                set_value('jenis_pendidikan_menengah') != 'Sekolah Menengah Atas (SMA)' &&
                                set_value('jenis_pendidikan_menengah') != 'Madrasah Aliyah (MA)' &&
                                set_value('jenis_pendidikan_menengah') != 'Sekolah Menengah Kejuruan (SMK)' &&
                                set_value('jenis_pendidikan_menengah') != 'Madrasah Aliyah Kejuruan (MAK)' &&
                                set_value('jenis_pendidikan_menengah') != 'Kelompok Belajar Paket C'
                            ): ?>
                            <?php else: ?>
                                disabled
                            <?php endif; ?> >
                        </div>
                        <span class="label-input"><label class="form-label" for="jurusan">Jurusan</label></span>
                        <div class="radio-vr">
                            <input type="radio" class="radio down jurusan_fixed" name="jurusan" id="jurusan ipa" value="IPA" <?= set_radio('jurusan', 'IPA') ?> >
                            <label for="jurusan ipa">IPA</label><br>
                            <input type="radio" class="radio down jurusan_fixed" name="jurusan" id="jurusan ips" value="IPS" <?= set_radio('jurusan', 'IPS') ?> >
                            <label for="jurusan ips">IPS</label> <br>
                            <input type="radio" class="radio down jurusan_fixed" name="jurusan" id="jurusan SMKPer" value="SMK Keperawatan" <?= set_radio('jurusan', 'SMK Keperawatan') ?> >
                            <label for="jurusan SMKPer">SMK Keperawatan</label><br>
                            <input type="radio" class="radio down jurusan_fixed" name="jurusan" id="jurusan SMKFar" value="SMK Farmasi" <?= set_radio('jurusan', 'SMK Farmasi') ?> >
                            <label for="jurusan SMKFar">SMK Farmasi</label><br>
                            <input type="radio" class="radio down jurusan_fixed" name="jurusan" id="jurusan SMKAnkes" value="SMK Analisis Kesehatan" <?= set_radio('jurusan', 'SMK Analisis Kesehatan') ?> >
                            <label for="jurusan SMKAnkes">SMK Analisis Kesehatan</label><br>
                            <input type="radio" class="radio down jurusan_fixed" name="jurusan" id="jurusan SMKPergi" value="SMK Keperawatan Gigi" <?= set_radio('jurusan', 'SMK Keperawatan Gigi') ?> >
                            <label for="jurusan SMKPergi">SMK Keperawatan Gigi</label><br>
                            <input type="radio" class="radio down" name="jurusan" id="jurusan lainnya2"
                            <?php if (set_value('jurusan') == ''): ?>
                            <?php elseif (
                                set_value('jurusan') != 'IPA' &&
                                set_value('jurusan') != 'IPS' &&
                                set_value('jurusan') != 'SMK Keperawatan' &&
                                set_value('jurusan') != 'SMK Farmasi' &&
                                set_value('jurusan') != 'SMK Analisis Kesehatan' &&
                                set_value('jurusan') != 'SMK Keperawatan Gigi'
                            ): ?>
                                checked
                            <?php endif; ?> >
                            <label for="jurusan lainnya2">Lainnya...</label><br>
                            <input type="text" class="text other_opt
                            <?php if (set_value('jurusan') == ''): ?>
                                disabled
                            <?php elseif (
                                set_value('jurusan') != 'IPA' &&
                                set_value('jurusan') != 'IPS' &&
                                set_value('jurusan') != 'SMK Keperawatan' &&
                                set_value('jurusan') != 'SMK Farmasi' &&
                                set_value('jurusan') != 'SMK Analisis Kesehatan' &&
                                set_value('jurusan') != 'SMK Keperawatan Gigi'
                            ): ?>
                            <?php else: ?>
                                disabled
                            <?php endif; ?>
                            "name="jurusan" id="jurusan disabled" value="<?= set_value('jurusan') ?>"
                            <?php if (set_value('jurusan') == ''): ?>
                                disabled
                            <?php elseif (
                                set_value('jurusan') != 'IPA' &&
                                set_value('jurusan') != 'IPS' &&
                                set_value('jurusan') != 'SMK Keperawatan' &&
                                set_value('jurusan') != 'SMK Farmasi' &&
                                set_value('jurusan') != 'SMK Analisis Kesehatan' &&
                                set_value('jurusan') != 'SMK Keperawatan Gigi'
                            ): ?>
                            <?php else: ?>
                                disabled
                            <?php endif; ?> >
                        </div>
                        <span class="label-input"><label class="form-label" for="nama_sekolah">Nama Sekolah</label></span>
                        <input type="text" class="text" name="nama_sekolah" id="nama_sekolah" value="<?= set_value('nama_sekolah') ?>">
                        <span class="label-input"><label class="form-label" for="jenis_sekolah">Jenis Sekolah</label></span>
                        <div class="radio-hz">
                            <input type="radio" value="Negeri" name="jenis_sekolah" id="jenis_sekolah negeri" <?= set_radio('jenis_sekolah', 'Negeri') ?> >
                            <span class="radio"><label for="jenis_sekolah negeri">Negeri</label></span>
                            <input type="radio" value="Swasta" name="jenis_sekolah" id="jenis_sekolah swasta" <?= set_radio('jenis_sekolah', 'Swasta') ?> >
                            <span class="radio"><label for="jenis_sekolah swasta">Swasta</label></span>
                        </div>
                        <span class="label-input"><label class="form-label" for="provinsi_asal_sekolah">Provinsi Asal Sekolah</label></span>
                        <!-- <input type="text" class="text" name="provinsi_asal_sekolah" id="provinsi_asal_sekolah" value="<?= set_value('provinsi_asal_sekolah') ?>"> -->
                        <select name="provinsi_asal_sekolah" id="provinsi"></select>
                        <span class="label-input"><label class="form-label" for="kota_kabupaten_asal_sekolah">Kota/Kabupaten Asal Sekolah</label></span>
                        <select name="kota_kabupaten_asal_sekolah" id="kabupaten"></select>
                        <select class="select-hidden" id="kecamatan"></select>
                        <select class="select-hidden" id="kelurahan"></select>
                        <!-- <input type="text" class="text" name="kota_kabupaten_asal_sekolah" id="kota_kabupaten_asal_sekolah" value="<?= set_value('kota_kabupaten_asal_sekolah') ?>"> -->
                        <span class="label-input"><label class="form-label" for="akreditasi_sekolah">Akreditasi Sekolah</label></span>
                        <div class="radio-hz">
                            <input type="radio" value="A" name="akreditasi_sekolah" id="akreditasi_sekolah a" <?= set_radio('akreditasi_sekolah', 'A') ?> >
                            <span class="radio"><label for="akreditasi_sekolah a">A</label></span>
                            <input type="radio" value="B" name="akreditasi_sekolah" id="akreditasi_sekolah b" <?= set_radio('akreditasi_sekolah', 'B') ?> >
                            <span class="radio"><label for="akreditasi_sekolah b">B</label></span>
                        </div>
                        <span class="label-input"><label class="form-label" for="tahun_lulus">Tahun Lulus/Tamat</label></span>
                        <input type="number" min="2000" max="<?= date('Y') ?>" list="daftar_tahun_lulus" name="tahun_lulus" id="tahun_lulus" class="text" value="<?= set_value('tahun_lulus') ?>" placeholder="*Mohon isi sendiri jika tidak ada!">
                        <datalist id="daftar_tahun_lulus">
                        <?php for ($year = date('Y') - 5; $year <= date('Y'); $year++): ?>
                            <option value="<?= $year ?>">
                        <?php endfor; ?>
                        </datalist>
                        <span class="label-input"><label class="form-label"for="rekap_nilai_rapot">Rekap Nilai Rapot</label></span>
                        <input type="file" name="rekap_nilai_rapot" id="rekap_nilai_rapot" accept=".pdf">
                        <span class="label-input"><label class="form-label" for="rata_rata_nilai_rapot">Rata-Rata Nilai Rapot</label></span>
                        <input type="number" min="0" max="100" step="0.1" class="text" name="rata_rata_nilai_rapot" id="rata_rata_nilai_rapot" value="<?= set_value('rata_rata_nilai_rapot') ?>" placeholder="xx,x">
                        <span class="label-input"><label class="form-label" for="semester_1">Peringkat Semester 1</label></span>
                        <input type="number" min="1" class="text" name="semester_1" id="semester_1" value="<?= set_value('semester_1') ?>">
                        <span class="label-input"><label class="form-label" for="semester_2">Peringkat Semester 2</label></span>
                        <input type="number" min="1" class="text" name="semester_2" id="semester_2" value="<?= set_value('semester_2') ?>">
                        <span class="label-input"><label class="form-label"for="semester_3">Peringkat Semester 3</label></span>
                        <input type="number" min="1" class="text" name="semester_3" id="semester_3" value="<?= set_value('semester_3') ?>">
                        <span class="label-input"><label class="form-label" for="semester_4">Peringkat Semester 4</label></span>
                        <input type="number" min="1" class="text" name="semester_4" id="semester_4" value="<?= set_value('semester_4') ?>">
                        <span class="label-input"><label class="form-label" for="semester_5">Peringkat Semester 5</label></span>
                        <input type="number" min="1" class="text" name="semester_5" id="semester_5" value="<?= set_value('semester_5') ?>">
                    </div>
                    <div class="btn">
                        <a href="<?= base_url() ?>" class="btn btn-back btn-primary">Kembali</a>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="<?= base_url() ?>assets/scripts/jquery-3.6.0.min.js"></script>
    <script src="http://api.iksgroup.co.id/apijs/lokasiapi.js"></script>
    <script src="<?= base_url() ?>assets/scripts/form-script.js"></script>
</body>
</html>