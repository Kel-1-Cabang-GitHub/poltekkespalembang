<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pendaftar</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url() ?>assets/styles/base-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/data-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/alert-style.css">
    <script defer src="<?= base_url() ?>assets/scripts/jquery-3.6.0.min.js"></script>
    <script defer src="<?= base_url() ?>assets/scripts/base-script.js"></script>
    <script defer src="<?= base_url() ?>assets/scripts/edit-script.js"></script>
</head>
<body>
    <header>
        <nav>
            <img src="<?= base_url() ?>assets/img/logo.jpg" alt="logo">
            <div class="brand" id="<?= base_url(); ?>admin">
                <h3>Penerimaan Mahasiswa Baru</h3>
                <h3>Poltekkes Kemenkes Palembang</h3>
            </div>
        </nav>
    </header>
    <main>
        <div class="detail-pendaftar">
                <div class="close-btn">
                    <a class="close detail"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></a>
                </div>
                <h2>Detail Pendaftar</h2>
                <div class="data-detail">
                    <section id="sect1">
                        <img id="detail-foto" src="<?= base_url(); ?>/uploads/img/pas_foto/" alt="pas foto">
                        <div class="tabel-detail">
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><span class="detail" id="nama_lengkap">-</span></td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td><span class="detail" id="nisn">-</span></td>
                                </tr>
                                <tr>
                                    <td>Jalur Pendaftaran</td>
                                    <td>:</td>
                                    <td><span class="detail" id="jalur_pendaftaran">-</span></td>
                                </tr>
                                <tr>
                                    <td>Bukti Pembayaran</td>
                                    <td>:</td>
                                    <td>
                                        <a target="_blank" id="bukti_pembayaran" class="link-file" href="<?= base_url(); ?>/uploads/img/bukti_pembayaran/">
                                            <span id="bukti_pembayaran">-</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Program Studi Pilihan 1</td>
                                    <td>:</td>
                                    <td><span class="detail" id="program_studi_pilihan_1">-</span></td>
                                </tr>
                                <tr>
                                    <td>Program Studi Pilihan 2</td>
                                    <td>:</td>
                                    <td><span class="detail" id="program_studi_pilihan_2">-</span></td>
                                </tr>
                            </table>
                        </div>
                    </section>
                    <section id="sect2">
                        <h2>Data Pribadi</h2>
                        <hr>
                        <table>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><span class="detail" id="alamat">-</span></td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td>:</td>
                                <td><span class="detail" id="kode_pos">-</span></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td><span class="detail" id="tempat_lahir">-</span></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><span class="detail" id="tanggal_lahir">-</span></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><span class="detail" id="jenis_kelamin">-</span></td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan</td>
                                <td>:</td>
                                <td><span class="detail" id="tinggi_badan">-</span></td>
                            </tr>
                            <tr>
                                <td>Berat Badan</td>
                                <td>:</td>
                                <td><span class="detail" id="berat_badan">-</span></td>
                            </tr>
                        </table>
                    </section>
                    <section id="sect3">
                        <h2>Data Sekolah</h2>
                        <hr>
                        <table>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td>:</td>
                                <td><span class="detail" id="nama_sekolah">-</span></td>
                            </tr>
                            <tr>
                                <td>Jenis Sekolah</td>
                                <td>:</td>
                                <td><span class="detail" id="jenis_sekolah">-</span></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td><span class="detail" id="jurusan">-</span></td>
                            </tr>
                            <tr>
                                <td>Provinsi Asal Sekolah</td>
                                <td>:</td>
                                <td><span class="detail" id="provinsi_asal_sekolah">-</span></td>
                            </tr>
                            <tr>
                                <td>Kota/Kabupaten Sekolah</td>
                                <td>:</td>
                                <td><span class="detail" id="kota_kabupaten_asal_sekolah">-</span></td>
                            </tr>
                            <tr>
                                <td>Akreditasi Sekolah</td>
                                <td>:</td>
                                <td><span class="detail" id="akreditasi_sekolah">-</span></td>
                            </tr>
                            <tr>
                                <td>Tahun Lulus</td>
                                <td>:</td>
                                <td><span class="detail" id="tahun_lulus">-</span></td>
                            </tr>
                        </table>
                    </section>
                    <section id="sect4">
                        <h2>Data Rapot</h2>
                        <hr>
                        <table>
                            <tr>
                                <td>Rekap Nilai Rapot</td>
                                <td>:</td>
                                <td><span class="detail" id="rekap_nilai_rapot">-</span></td>
                            </tr>
                            <tr>
                                <td>Rata-rata Nilai Rapot</td>
                                <td>:</td>
                                <td><span class="detail" id="rata_rata_nilai_rapot">-</span></td>
                            </tr>
                            <tr>
                                <td>Peringkat Semester 1</td>
                                <td>:</td>
                                <td><span class="detail" id="peringkat_semester_1">-</span></td>
                            </tr>
                            <tr>
                                <td>Peringkat Semester 2</td>
                                <td>:</td>
                                <td><span class="detail" id="peringkat_semester_2">-</span></td>
                            </tr>
                            <tr>
                                <td>Peringkat Semester 3</td>
                                <td>:</td>
                                <td><span class="detail" id="peringkat_semester_3">-</span></td>
                            </tr>
                            <tr>
                                <td>Peringkat Semester 4</td>
                                <td>:</td>
                                <td><span class="detail" id="peringkat_semester_4">-</span></td>
                            </tr>
                            <tr>
                                <td>Peringkat Semester 5</td>
                                <td>:</td>
                                <td><span class="detail" id="peringkat_semester_5">-</span></td>
                            </tr>
                        </table>
                    </section>
                    <section id="sect5">
                        <h2>Data Prestasi</h2>
                        <hr>
                        <table>
                            <tr>
                                <td>Prestasi 1</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_1" class="link-file" href="<?= base_url(); ?>/uploads/pdf/prestasi_1/">
                                        <span id="prestasi_1">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 2</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_2" class="link-file" href="<?= base_url(); ?>/uploads/pdf/prestasi_2/">
                                        <span id="prestasi_2">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 3</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_3" class="link-file" href="<?= base_url(); ?>/uploads/pdf/prestasi_3/">
                                        <span id="prestasi_3">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 4</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_4" class="link-file" href="<?= base_url(); ?>/uploads/pdf/prestasi_4/">
                                        <span id="prestasi_4">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 5</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_5" class="link-file" href="<?= base_url(); ?>/uploads/pdf/prestasi_5/">
                                        <span id="prestasi_5">-</span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </section>
                    <section id="sect6" class="optional">
                        <h2>Berkas KTMSE/GAKIN</h2>
                        <hr>
                        <table>
                            <tr>
                                <td>Surat Keterangan Miskin</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="surat_keterangan_miskin" class="link-file" href="<?= base_url(); ?>/uploads/pdf/surat_keterangan_miskin/">
                                        <span class="detail" id="surat_keterangan_miskin">-</span>
                                    </a>
                                </td>
                            </tr>
                                <tr>
                                    <td>Surat Keterangan Penghasilan Keluarga</td>
                                    <td>:</td>
                                    <td>
                                    <a target="_blank" id="surat_keterangan_penghasilan_keluarga" class="link-file" href="<?= base_url(); ?>/uploads/pdf/surat_keterangan_penghasilan_keluarga/">
                                        <span class="detail" id="surat_keterangan_penghasilan_keluarga">-</span>
                                    </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto Rumah</td>
                                    <td>:</td>
                                    <td>
                                        <a target="_blank" id="foto_rumah" class="link-file" href="<?= base_url(); ?>/uploads/pdf/foto_rumah/">
                                            <span class="detail" id="foto_rumah">-</span>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </section>
                </div>
            </div>
    </main>
</body>
</html>