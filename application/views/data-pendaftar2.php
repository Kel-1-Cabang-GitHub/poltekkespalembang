<?php 
    $data_lengkap = [];
    $data_pribadi_temp = [];
    $data_sekolah_temp = [];
    if (isset($data_pribadi) && !empty($data_pribadi) && isset($data_sekolah) && !empty($data_sekolah)){
        foreach($data_pribadi as $key => $pribadi){
            array_push($data_pribadi_temp, $pribadi);
        }
        foreach($data_sekolah as $key => $sekolah){
            array_push($data_sekolah_temp, $sekolah);
        }
        for($i = 0; $i < count($data_pribadi_temp); $i++){
            array_push($data_lengkap,array_merge($data_pribadi_temp[$i],$data_sekolah_temp[$i]));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Data Pendaftar | POLTEKKES KEMENKES PALEMBANG</title>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/nav-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles/data-style.css">
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
        <div class="actions">
            <div class="search">
                <form action="search" method="POST">
                    <input type="text" class="search-text" placeholder="Cari data pendaftar ...">
                    <button type="submit" class="btn-search">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#83A342"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    </button>
                </form>
            </div>
            <a href="export-to-excel?jalur=<?= $this->input->get("jalur");?>" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24" width="40px" fill="#FFFFFF"><g><rect fill="none" height="24" width="24"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M17,11l-1.41-1.41L13,12.17V4h-2v8.17L8.41,9.59L7,11l5,5 L17,11z"/></g></svg>
                Export ke Excel
            </a>
        </div>
        <div class="data">
            <table class="table-head">
                <thead>
                    <tr>
                        <th class="mw-100">No.</th>
                        <th>Nama Lengkap</th>
                        <th class="mw-150">Nomor Induk Siswa Nasional (NISN)</th>
                        <th>Asal Sekolah</th>
                        <th class="mw-150">Jurusan</th>
                        <th class="mw-150">Data Detail</th>
                        <th class="mw-150">Ubah Data</th>
                        <th class="mw-150">Hapus Data</th>
                    </tr>
                </thead>
                <?php $counter = 1; ?>
                <?php if (isset($data_pribadi) && !empty($data_pribadi) && isset($data_sekolah) && !empty($data_sekolah)): ?>
            </table>
            <table class="table-body">
                <tbody>
                    <?php foreach ($data_lengkap as $key => $data): ?>
                        <tr>
                            <td class="mw-100"><?= $counter; ?></td>
                            <td><?= $data['nama_lengkap']; ?></td>
                            <td class="mw-150"><?= $data['nisn']; ?></td>
                            <td><?= $data['nama_sekolah']; ?></td>
                            <td class="mw-150"><?= $data['jurusan']; ?>
                            <td class="mw-150"><a class="btn-action btn-primary" href="<?= $data['id'] ?>">Lihat Detail</a></td>
                            <td class="mw-150"><a class="btn-action btn-primary" href="<?= $data['id'] ?>">Ubah</a></td>
                            <td class="mw-150"><a class="btn-action btn-danger" href="<?= $data['id'] ?>">Hapus</a></td>
                        </tr>
                        <?php $counter++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <?php else: ?>
                    <tr>
                        <td class="empty" colspan="8">Data Tidak Ditemukan</td>
                    </tr>
            </table>
                <?php endif; ?>
        </div>
    </main>
</body>
</html>
