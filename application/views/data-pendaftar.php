<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Data Pendaftar <?= $jalur ?> | POLTEKKES KEMENKES PALEMBANG</title>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url() ?>assets/styles/base-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/data-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/alert-style.css">
    <script defer src="<?= base_url() ?>assets/scripts/jquery-3.6.0.min.js"></script>
    <script defer src="<?= base_url() ?>assets/scripts/base-script.js"></script>
    <script defer src="<?= base_url() ?>assets/scripts/admin-script.js"></script>
    <script>
        let data_obj = {};
        let get_arr_data;
        let nisn;
    </script>
</head>
<body>
    <div class="container">
    <div class="block"></div>
    <div class="block block-info active"></div>
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
            <!-- Jika flash_data sukses dihapus di tampilkan : -->
            <div class="info-alert success active" id="info-alert">
                <div class="close-info">
                    <a id="close-info"><svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="24px" fill="#ff0000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></a>
                </div>
                <svg class="info" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z"/></svg>
                <div class="message">
                    <h2>Sukses</h2>
                    <p>Data berhasil dihapus</p>
                </div>
            </div>
		    <!-- akhir perkondisian -->
            <div class="detail-pendaftar">
                <div class="close-btn">
                    <a class="close detail"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></a>
                </div>
                <h2>Detail Pendaftar</h2>
                <div class="data-detail">
                    <section id="sect1">
                        <img id="detail-foto" src="<?= base_url(); ?>uploads/img/pas_foto/" alt="pas foto">
                        <div class="tabel-detail">
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td><span class="detail" id="nama_lengkap">-</span></td>
                                </tr>
                                <tr>
                                    <td>Nomor Induk Siswa Nasional (NISN)</td>
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
                                        <a target="_blank" id="bukti_pembayaran" class="link-file" href="<?= base_url(); ?>uploads/img/bukti_pembayaran/">
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
								<td>No. Telp/HP</td>
								<td>:</td>
								<td><span class="detail" id="no_telepon"></span></td>
							</tr>
							<tr>
								<td>Alamat Sesuai KTP</td>
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
								<td>Jenis Pendidikan Menengah</td>
								<td>:</td>
								<td><span class="detail" id="jenis_pendidikan_menengah"></span></td>
							</tr>
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
                                    <a target="_blank" id="prestasi_1" class="link-file" href="<?= base_url(); ?>uploads/pdf/prestasi_1/">
                                        <span id="prestasi_1">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 2</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_2" class="link-file" href="<?= base_url(); ?>uploads/pdf/prestasi_2/">
                                        <span id="prestasi_2">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 3</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_3" class="link-file" href="<?= base_url(); ?>uploads/pdf/prestasi_3/">
                                        <span id="prestasi_3">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 4</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_4" class="link-file" href="<?= base_url(); ?>uploads/pdf/prestasi_4/">
                                        <span id="prestasi_4">-</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi 5</td>
                                <td>:</td>
                                <td>
                                    <a target="_blank" id="prestasi_5" class="link-file" href="<?= base_url(); ?>uploads/pdf/prestasi_5/">
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
                                    <a target="_blank" id="surat_keterangan_miskin" class="link-file" href="<?= base_url(); ?>uploads/pdf/surat_keterangan_miskin/">
                                        <span class="detail" id="surat_keterangan_miskin">-</span>
                                    </a>
                                </td>
                            </tr>
                                <tr>
                                    <td>Surat Keterangan Penghasilan Keluarga</td>
                                    <td>:</td>
                                    <td>
                                    <a target="_blank" id="surat_keterangan_penghasilan_keluarga" class="link-file" href="<?= base_url(); ?>uploads/pdf/surat_keterangan_penghasilan_keluarga/">
                                        <span class="detail" id="surat_keterangan_penghasilan_keluarga">-</span>
                                    </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto Rumah</td>
                                    <td>:</td>
                                    <td>
                                        <a target="_blank" id="foto_rumah" class="link-file" href="<?= base_url(); ?>uploads/pdf/foto_rumah/">
                                            <span class="detail" id="foto_rumah">-</span>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </section>
                </div>
            </div>
            <div class="confirm-alert" id="confirm-alert">
                <div class="ca-head danger">
                    <svg xmlns="http://www.w3.org/2000/svg" height="46px" viewBox="0 0 24 24" width="46px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    <h2>Konfirmasi</h2>
                </div>
                <div class="ca-body">
                    <p>Anda yakin ingin menghapus data <span id="ubah-nisn">nisn</span> - <span id="ubah-nama">nama</span> ? Data yang terhapus akan hilang secara permanen</p>
                    <div class="ca-button">
                        <a class="a-btn btn-danger hapus" id="ca-delete">Hapus</a>
                        <a class="a-btn btn-primary batal" id="ca-cancel">Batal</a>
                    </div>
                </div>
            </div>
            <div class="actions">
                <div class="search">
                    <form action="<?= base_url() ?>Admin_Controller/cari_pendaftar" method="GET">
						<input type="hidden" name="search_jalur" id="search_jalur" value="<?= $this->uri->segment(3) ?>">
						<input type="hidden" name="search_field" id="search_field" value="<?= $this->input->get('field') ?>">
						<input type="hidden" name="search_sort" id="search_sort" value="<?= $this->input->get('sort') ?>">
                        <input type="text" class="search-text" name="search_keyword" placeholder="Cari data pendaftar ..." value="<?= ($this->input->get('keyword')) ? $this->input->get('keyword') : '' ?>" autofocus>
                        <button type="submit" class="btn-search">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#83A342"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                        </button>
                    </form>
                </div>
                <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3) ?>/export" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24" width="40px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M17,11l-1.41-1.41L13,12.17V4h-2v8.17L8.41,9.59L7,11l5,5 L17,11z"/></g></svg>
                    Export ke Excel
                </a>
            </div>
            <div class="data">
                <table class="table-head">
                    <thead>
                        <tr>
                            <th class="mw-100">No.</th>
                            <th class="fl">
								<div class="keyword">
                                   <p>Nama Lengkap</p>
                                </div>
                                <div class="sort">
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-lengkap&sort=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg></a>
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-lengkap&sort=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg></a>
                                </div>
							</th>
                            <th class="mw-150 fl">
                                <div class="keyword">
                                    <p>NISN</p>
                                </div>
                                <div class="sort">
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?sort=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg></a>
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg></a>
                                </div>
							</th>
                            <th class="mw-150 fl">
                                <div class="keyword">
                                    <p>Jenis Kelamin</p>
                                </div>
                                <div class="sort">
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jenis-kelamin&sort=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg></a>
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jenis-kelamin&sort=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg></a>
                                </div>
							</th>
                            <th class="mw-150 fl">
                                <div class="keyword">
                                    <p>Nama Sekolah</p>
                                </div>
                                <div class="sort">
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-sekolah&sort=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg></a>
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-sekolah&sort=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg></a>
                                </div>
							</th>
                            <th class="mw-150 fl">
                                <div class="keyword">
                                    <p>Jurusan</p>
                                </div>
                                <div class="sort">
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jurusan&sort=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg></a>
								    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jurusan&sort=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg></a>
                                </div>
							</th>
                            <th class="mw-150 fl">
                                <div class="keyword">
                                    <p>Jalur Pendaftaran</p>
                                </div>
                                <div class="sort">
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jalur-pendaftaran&sort=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg></a>
                                    <a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jalur-pendaftaran&sort=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg></a>
                                </div>
							</th>
                            <th class="mw-150">Data Detail</th>
                            <th class="mw-150">Ubah Data</th>
                            <th class="mw-150">Hapus Data</th>
                        </tr>
                    </thead>
                    <?php $counter = 1; ?>
                    <?php if (isset($data_pendaftar) && !empty($data_pendaftar)): ?>
                </table>
                <table class="table-body">
                    <tbody>
                        <?php foreach ($data_pendaftar as $key => $data): ?>
                            <script>
                                get_arr_data = <?= json_encode($data); ?>;
                                nisn = get_arr_data["nisn"];
                                data_obj[nisn] = get_arr_data;
                            </script>
                            <tr>
                                <td class="mw-100"><?= $counter; ?></td>
                                <td><?= $data['nama_lengkap']; ?></td>
                                <td class="mw-150"><?= $data['nisn']; ?></td>
                                <td class="mw-150"><?= $data['jenis_kelamin']; ?></td>
                                <td><?= $data['nama_sekolah']; ?></td>
                                <td class="mw-150"><?= $data['jurusan']; ?>
                                <td class="mw-150"><?= $data['jalur_pendaftaran']; ?></td>
                                <td class="mw-150"><a class="btn-action btn-primary detail-data" id="<?= $data['nisn']; ?>">Lihat Detail</a></td>
                                <td class="mw-150"><a class="btn-action btn-primary" href="<?= base_url() ?>admin/data-pendaftar/ubah/<?= $data['nisn'] ?>">Ubah</a></td>
								<?php
									$id_hapus = base_url() . 'admin/data-pendaftar/' . $this->uri->segment(3) . '/hapus/' . $data['nisn'];
									if ($this->input->get('field')) $id_hapus .= '?field=' . $this->input->get('field');
									$id_hapus .= (($this->input->get('sort')) ? (((!$this->input->get('field')) ? '?' : '&') . 'sort=' . $this->input->get('sort')) : '');
								?>
                                <td class="mw-150"><a class="btn-action btn-danger hapus-data" id="<?= $id_hapus ?> <?= $data['nama_lengkap'] ?>">Hapus</a></td>
                            </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                    <?php else: ?>
                        <tr>
                            <td class="empty" colspan="10">Data Tidak Ditemukan</td>
                        </tr>
                </table>
                    <?php endif; ?>
            </div>
			<div class="scroll">
            	<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg>
        	</div>
        </main>
    </div>
</body>
</html>
