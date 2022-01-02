<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Data Pendaftar <?= $jalur ?> | POLTEKKES KEMENKES PALEMBANG</title>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/nav-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/data-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/alert-style.css">
    <script defer src="<?= base_url() ?>assets/scripts/nav-script.js"></script>
    <script defer src="<?= base_url() ?>assets/scripts/admin-script.js"></script>
</head>
<body>
    <div class="container">
    <div class="block"></div>
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
                            <th>
								Nama Lengkap <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-lengkap&sort=asc">Urut Nama Lengkap ASC</a> <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-lengkap&sort=desc">Urut Nama Lengkap DESC</a>
							</th>
                            <th class="mw-150">
								NISN <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>">Urut NISN ASC</a> <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?sort=desc">Urut NISN DESC</a>
							</th>
                            <th class="mw-150">
								Jenis Kelamin <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jenis-kelamin&sort=asc">Urut Jenis Kelamin ASC</a> <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jenis-kelamin&sort=desc">Urut Jenis Kelamin DESC</a>
							</th>
                            <th class="mw-150">
								Asal Sekolah <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-sekolah&sort=asc">Urut Asal Sekolah ASC</a> <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=nama-sekolah&sort=desc">Urut Asal Sekolah DESC</a>
							</th>
                            <th class="mw-150">
								Jurusan <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jurusan&sort=asc">Urut Jurusan ASC</a> <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jurusan&sort=desc">Urut Jurusan DESC</a>
							</th>
                            <th class="mw-150">
								Jalur Pendaftaran <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jalur-pendaftaran&sort=asc">Urut Jalur Pendaftaran ASC</a> <br>
								<a href="<?= base_url() ?>admin/data-pendaftar/<?= $this->uri->segment(3); ?>?field=jalur-pendaftaran&sort=desc">Urut Jalur Pendaftaran DESC</a>
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
                            <tr>
                                <td class="mw-100"><?= $counter; ?></td>
                                <td><?= $data['nama_lengkap']; ?></td>
                                <td class="mw-150"><?= $data['nisn']; ?></td>
                                <td class="mw-150"><?= $data['jenis_kelamin']; ?></td>
                                <td><?= $data['nama_sekolah']; ?></td>
                                <td class="mw-150"><?= $data['jurusan']; ?>
                                <td class="mw-150"><?= $data['jalur_pendaftaran']; ?></td>
                                <td class="mw-150"><a class="btn-action btn-primary" href="<?= base_url() ?>admin/data-pendaftar/detail/<?= $data['nisn'] ?>">Lihat Detail</a></td>
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
        </main>
    </div>
</body>
</html>
