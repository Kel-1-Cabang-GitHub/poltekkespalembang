<div class="container">
	<div class="block"></div>
	<div class="block block-info active"></div>
	<?php $this->load->view('templates/navbar', ['nav_link' => base_url() . 'admin']) ?>
	<main>
		<!-- Jika flash_data sukses update di set : -->
		<div class="info-alert success active" id="info-alert">
			<div class="close-info">
				<a id="close-info"><svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="24px" fill="#ff0000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></a>
			</div>
			<svg class="info" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z"/></svg>
			<div class="message">
				<h2>Sukses</h2>
				<p>Data berhasil diubah</p>
			</div>
		</div>
		<!-- akhir perkondisian -->
		<div class="edit-pendaftar">
			<h2 id="title">Ubah Pendaftar</h2>
			<form action="<?= base_url() ?>Admin_Controller/post_ubah_pendaftar" method="POST">
				<input type="hidden" name="hidden-nisn" id="hidden-nisn" value="<?= $this->uri->segment(4) ?>">
				<div class="confirm-alert" id="confirm-alert">
					<div class="ca-head danger">
						<svg xmlns="http://www.w3.org/2000/svg" height="46px" viewBox="0 0 24 24" width="46px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
						<h2>Konfirmasi</h2>
					</div>
					<div class="ca-body">
						<p>Anda yakin ingin menyimpan perubahan data ?</p>
						<div class="ca-button">
							<button type="submit" class="btn btn-success ubah" id="ca-update">Simpan</button>
							<a class="btn btn-danger batal" id="ca-cancel">Batal</a>
						</div>
					</div>
				</div>
				<div class="data-edit">
					<section id="sect1">
						<img id="edit-foto" src="<?= base_url(); ?>uploads/img/pas_foto/<?= $data_pendaftar['pas_foto'] ?>" alt="pas foto">
						<div class="tabel-edit">
							<table>
								<tr>
									<td><label class="form-label" for="nama_lengkap">Nama Lengkap</label>
									<td>:</td>
									<td><input class="text" type="text" name="nama_lengkap" id="nama_lengkap" value="<?= $data_pendaftar['nama_lengkap'] ?>" autofocus></td>
								</tr>
								<tr>
									<td><label class="form-label" for="nisn">Nomor Induk Siswa Nasional (NISN)</label></td>
									<td>:</td>
									<td><?= $data_pendaftar['nisn'] ?></td>
								</tr>
								<tr>
									<td>Jalur Pendaftaran</td>
									<td>:</td>
									<td><span class="edit" id="jalur_pendaftaran"><?= $data_pendaftar['jalur_pendaftaran'] ?></span></td>
								</tr>
								<tr>
									<td><label class="form-label" for="bukti_pembayaran">Upload Bukti Pembayaran</label></td>
									<td>:</td>
									<td>
										<input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept=".jpg, .jpeg, .png">
										<span class="input-file">
											<label class="input-file" for="bukti_pembayaran"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><g><rect fill="none" height="10" width="10"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"/></g></svg>Upload</label>
											<input type="text" class="text-file bukti_pembayaran" id="bukti_pembayaran" readonly placeholder="<?= $data_pendaftar['bukti_pembayaran'] ?>">
										</span>
									</td>
								</tr>
								<tr>
									<td><label class="form-label" for="program_studi_pilihan_1">Program Studi Pilihan 1</label></td>
									<td>:</td>
									<td>
										<select name="program_studi_pilihan_1" class="program_studi_pilihan_1" id="program_studi_pilihan_1">
											<option disabled>--Pilih program studi--</option>
											<?= daftar_program_studi('option', 'program_studi_pilihan_1', $data_pendaftar['program_studi_pilihan_1']); ?>
										</select>
									</td>
								</tr>
								<tr>
									<td><label class="form-label" for="program_studi_pilihan_2">Program Studi Pilihan 2</label></td>
									<td>:</td>
									<td>
										<select name="program_studi_pilihan_2" class="program_studi_pilihan_2" id="program_studi_pilihan_2">
											<option value="<?= null ?>">--Lewati jika hanya membayar 1 pilihan--</option>
											<?= daftar_program_studi('option', 'program_studi_pilihan_2', $data_pendaftar['program_studi_pilihan_2']); ?>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</section>
					<section id="sect2">
						<h2>Data Pribadi</h2>
						<hr>
						<table>
							<tr>
								</tr>
								<td class="va-top"><label class="form-label" for="no_telepon">No. Telp/HP</label></td>
								<td class="va-top">:</td>
								<td><input type="text" class="text" name="no_telepon" id="no_telepon" value="<?= $data_pendaftar['no_telepon'] ?>"></td>
								<tr>
								<td class="form-label"><label class="form-label" for="alamat">Alamat Sesuai KTP</label></td>
								<td>:</td>
								<td><textarea onkeyup="textAreaAdjust(this)" class="text area" name="alamat" id="alamat"><?= $data_pendaftar['alamat'] ?></textarea></td>
							</tr>
							<tr>
								<td><label class="form-label" for="kode_pos">Kode Pos</label></td>
								<td>:</td>
								<td><input type="text" class="text" name="kode_pos" id="kode_pos" value="<?= $data_pendaftar['kode_pos'] ?>"></td>
							</tr>
							<tr>
								<td><label class="form-label" for="tempat_lahir">Tempat Lahir</label></td>
								<td>:</td>
								<td>
									<input type="text" class="text" id="tempat_lahir" name="tempat_lahir" value="<?= $data_pendaftar['tempat_lahir'] ?>" list="daftar_tempat_lahir">
									<datalist id="daftar_tempat_lahir">
										<?= daftar_tempat_lahir() ?>
									</datalist>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="tanggal_lahir">Tanggal Lahir</label></td>
								<td>:</td>
								<td>
									<input type="date" class="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= $data_pendaftar['tanggal_lahir'] ?>">
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="jenis_kelamin">Jenis Kelamin</label></td>
								<td>:</td>
								<td>
									<div class="radio-hz">
										<input type="radio" value="Pria" name="jenis_kelamin" id="jenis_kelamin rad-pria" <?= ($data_pendaftar['jenis_kelamin'] == 'Pria') ? 'checked' : '' ?>>
										<span class="radio"><label for="jenis_kelamin rad-pria">Pria</label></span>
										<input type="radio" value="Wanita" name="jenis_kelamin" id="jenis_kelamin rad-wanita" <?= ($data_pendaftar['jenis_kelamin'] == 'Wanita') ? 'checked' : '' ?>>
										<span class="radio"><label for="jenis_kelamin rad-wanita">Wanita</label></span>
									</div>
								</td>
							</tr>
							<tr>
								<td><label class="form_label" for="tinggi_badan">Tinggi Badan</label></td>
								<td>:</td>
								<td><input type="number" class="text" min="0" name="tinggi_badan" id="tinggi_badan" value="<?= $data_pendaftar['tinggi_badan'] ?>"> cm</td>
							</tr>
							<tr>
								<td><label class="form_label" for="berat_badan">Berat Badan</label></td>
								<td>:</td>
								<td><input type="number" class="text" min="0" name="berat_badan" id="berat_badan" value="<?= $data_pendaftar['berat_badan'] ?>"> kg</td>
							</tr>
						</table>
					</section>
					<section id="sect3">
						<h2>Data Sekolah</h2>
						<hr>
						<table>
							<tr>
								<td><label class="form-label" for="jenis_pendidikan_menengah">Jenis Pendidikan Menengah</label></td>
								<td>:</td>
								<td>
									<input type="text" class="text" name="jenis_pendidikan_menengah" id="jenis_pendidikan_menengah" list="jpm-list" value="<?= $data_pendaftar['jenis_pendidikan_menengah'] ?>">
									<datalist id="jpm-list">
										<option value="Sekolah Menengah Atas (SMA)"></option>
										<option value="Madrasah Aliyah (MA)"></option>
										<option value="Sekolah Menengah Kejuruan (SMK)"></option>
										<option value="Madrasah Aliyah Kejuruan (MAK)"></option>
										<option value="Kelompok Belajar Paket C"></option>
									</datalist>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="nama_sekolah">Nama Sekolah</label></td>
								<td>:</td>
								<td><input type="text" class="text" name="nama_sekolah" id="nama_sekolah" value="<?= $data_pendaftar['nama_sekolah'] ?>"></td>
							</tr>
							<tr>
								<td><label class="form-label" for="jenis_sekolah">Jenis Sekolah</label></td>
								<td>:</td>
								<td>
									<div class="radio-hz">
										<input type="radio" value="Negeri" name="jenis_sekolah" id="jenis_sekolah negeri" <?= ($data_pendaftar['jenis_sekolah'] == 'Negeri') ? 'checked' : '' ?>>
										<span class="radio"><label for="jenis_sekolah negeri">Negeri</label></span>
										<input type="radio" value="Swasta" name="jenis_sekolah" id="jenis_sekolah swasta" <?= ($data_pendaftar['jenis_sekolah'] == 'Swasta') ? 'checked' : '' ?>>
										<span class="radio"><label for="jenis_sekolah swasta">Swasta</label></span>
									</div>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="jurusan">Jurusan</label></td>
								<td>:</td>
								<td>
									<input type="text" class="text" name="jurusan" id="jurusan" list="jurusan-list" value="<?= $data_pendaftar['jurusan'] ?>">
									<datalist id="jurusan-list">
										<option value="IPA"></option>
										<option value="IPS"></option>
										<option value="SMK Keperawatan"></option>
										<option value="SMK Farmasi"></option>
										<option value="SMK Analisis Kesehatan"></option>
										<option value="SMK Keperawatan Gigi"></option>
									</datalist>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="provinsi_asal_sekolah">Provinsi Asal Sekolah</label></td>
								<td>:</td>
								<td>
								<select name="provinsi_asal_sekolah" id="provinsi_asal_sekolah">
									<option disabled>--Pilih Provinsi--</option>
									<?= daftar_provinsi(array_keys(PROVINSI, $data_pendaftar['provinsi_asal_sekolah'])[0]); ?>
								</select>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="kota_kabupaten_asal_sekolah">Kota/Kabupaten Asal Sekolah</label></td>
								<td>:</td>
								<td>
									<select name="kota_kabupaten_asal_sekolah" id="kota_kabupaten_asal_sekolah">
										<option disabled>--Pilih Kota/Kabupaten--</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="akreditasi_sekolah">Akreditasi Sekolah</label></td>
								<td>:</td>
								<td>
									<div class="radio-hz">
										<input type="radio" value="A" name="akreditasi_sekolah" id="akreditasi_sekolah a" <?= ($data_pendaftar['akreditasi_sekolah'] == 'A') ? 'checked' : '' ?>>
										<span class="radio"><label for="akreditasi_sekolah a">A</label></span>
										<input type="radio" value="B" name="akreditasi_sekolah" id="akreditasi_sekolah b" <?= ($data_pendaftar['akreditasi_sekolah'] == 'B') ? 'checked' : '' ?>>
										<span class="radio"><label for="akreditasi_sekolah b">B</label></span>
									</div>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="tahun_lulus">Tahun Lulus/Tamat</label></td>
								<td>:</td>
								<td>
									<input type="number" min="2000" max="<?= date('Y') ?>" list="daftar_tahun_lulus" name="tahun_lulus" id="tahun_lulus" class="text" value="<?= $data_pendaftar['tahun_lulus'] ?>">
									<datalist id="daftar_tahun_lulus">
										<?= daftar_tahun_lulus(); ?>
									</datalist>
								</td>
							</tr>
						</table>
					</section>
					<section id="sect4">
						<h2>Data Rapot</h2>
						<hr>
						<table>
							<tr>
								<td><label class="form-label"for="rekap_nilai_rapot">Rekap Nilai Rapot</label></td>
								<td>:</td>
								<td>
									<input type="file" name="rekap_nilai_rapot" id="rekap_nilai_rapot" accept=".xls, .xlsx">
									<span class="input-file">
										<label class="input-file" for="rekap_nilai_rapot"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><g><rect fill="none" height="10" width="10"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"/></g></svg>Upload</label>
										<input type="text" class="text-file rekap_nilai_rapot" id="rekap_nilai_rapot" readonly placeholder="<?= $data_pendaftar['rekap_nilai_rapot'] ?>">
									</span>
								</td>
							</tr>
							<tr>
								<td><label class="form-label" for="rata_rata_nilai_rapot">Rata-Rata Nilai Rapot</label></td>
								<td>:</td>
								<td>
									<input type="number" class="text" min="0" max="100" step="0.1" name="rata_rata_nilai_rapot" id="rata_rata_nilai_rapot" value="<?= sprintf("%.1f", $data_pendaftar['rata_rata_nilai_rapot']) ?>">
								</td>
							</tr>
							<?php for ($i = 1; $i <= 5; $i++): ?>
								<tr>
									<td><label class="form-label" for="peringkat_semester_<?= $i ?>">Peringkat Semester <?= $i ?></label></td>
									<td>:</td>
									<td><input type="number" class="text" min="1" name="peringkat_semester_<?= $i ?>" id="peringkat_semester_<?= $i ?>" value="<?= $data_pendaftar["peringkat_semester_$i"] ?>"></td>
								</tr>
							<?php endfor; ?>
						</table>
					</section>
					<section id="sect5">
						<h2>Data Prestasi</h2>
						<hr>
						<table>
							<?php for ($i = 1; $i <= 5; $i++): ?>
								<tr>
									<td><label class="form-label" for="prestasi_<?= $i ?>">Prestasi <?= $i ?></label></td>
									<td>:</td>
									<td>
										<input type="file" name="prestasi_<?= $i ?>" id="prestasi_<?= $i ?>" accept=".pdf">
										<span class="input-file" id="prestasi">
											<label class="input-file" for="prestasi_<?= $i ?>"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><g><rect fill="none" height="10" width="10"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"/></g></svg>Upload</label>
											<input type="text" class="text-file prestasi_<?= $i ?>" id="prestasi_<?= $i ?>" readonly placeholder="<?= $data_pendaftar["prestasi_$i"] ?>">
										</span>
									</td>
								</tr>
							<?php endfor; ?>
						</table>
					</section>
					<?php if ($data_pendaftar['jalur_pendaftaran'] == 'KTMSE'): ?>
						<section id="sect6" class="optional">
							<h2>Berkas KTMSE/GAKIN</h2>
							<hr>
							<table>
								<tr>
									<td><label class="form-label" for="surat_keterangan_miskin">Upload Surat Keterangan Miskin</label></td>
									<td>:</td>
									<td>
										<input type="file" name="surat_keterangan_miskin" id="surat_keterangan_miskin" accept=".pdf">
										<span class="input-file" id="berkas">
											<label class="input-file" for="surat_keterangan_miskin"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><g><rect fill="none" height="10" width="10"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"/></g></svg>Upload</label>
											<input type="text" class="text-file surat_keterangan_miskin" id="surat_keterangan_miskin" readonly placeholder="<?= $data_pendaftar['surat_keterangan_miskin'] ?>">
										</span>
									</td>
								</tr>
								<tr>
									<td><label class="form-label" for="surat_keterangan_penghasilan_keluarga">Upload Surat Keterangan Penghasilan Keluarga</label></td>
									<td>:</td>
									<td>
										<input type="file" name="surat_keterangan_penghasilan_keluarga" id="surat_keterangan_penghasilan_keluarga" accept=".pdf">
										<span class="input-file" id="berkas">
											<label class="input-file" for="surat_keterangan_penghasilan_keluarga"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><g><rect fill="none" height="10" width="10"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"/></g></svg>Upload</label>
											<input type="text" class="text-file surat_keterangan_penghasilan_keluarga" id="surat_keterangan_penghasilan_keluarga" readonly placeholder="<?= $data_pendaftar['surat_keterangan_penghasilan_keluarga'] ?>">
										</span>
									</td>
								</tr>
								<tr>
									<td><label class="form-label" for="foto_rumah">Upload Foto Rumah</label></td>
									<td>:</td>
									<td>
										<input type="file" name="foto_rumah" id="foto_rumah" accept=".pdf">
										<span class="input-file" id="berkas">
											<label class="input-file" for="foto_rumah"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><g><rect fill="none" height="10" width="10"/></g><g><path d="M18,15v3H6v-3H4v3c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-3H18z M7,9l1.41,1.41L11,7.83V16h2V7.83l2.59,2.58L17,9l-5-5L7,9z"/></g></svg>Upload</label>
											<input type="text" class="text-file foto_rumah" id="foto_rumah" readonly placeholder="<?= $data_pendaftar['foto_rumah'] ?>">
										</span>
									</td>
								</tr>
							</table>
						</section>
					<?php endif; ?>
					<section id="sect7">
						<a href="<?= base_url() ?>admin/data-pendaftar/<?= strtolower($data_pendaftar["jalur_pendaftaran"]); ?>" class="btn btn-danger">Batal</a>
						<a id="ubah" class="btn btn-success simpan-data">Ubah</a>
					</section>
				</div>
			</form>
		</div>
		<div class="scroll">
			<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff">
				<path d="M0 0h24v24H0V0z" fill="none" />
				<path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z" />
			</svg>
		</div>
	</main>
</div>

<script>
	const provinsi = document.getElementById("provinsi_asal_sekolah");
	const kota_kabupaten = document.getElementById("kota_kabupaten_asal_sekolah");

	const sort_kota_kabupaten = (kota_kabupaten) => {
		return kota_kabupaten.sort((a, b) => {
			if (a.nama < b.nama) return -1;
			if (a.nama > b.nama) return 1;
			return 0;
		});
	}
</script>
<?php if (isset($kota_kabupaten)) : ?>
    <script>
		const get_kota_kabupaten_on_change = function () {
			const url = `${"<?= LOKASI_API ?>"}kota?id_provinsi=${this.value}`;
			fetch(url)
				.then(response => response.json())
				.then(response => {
					const kota_kabupaten_arr = sort_kota_kabupaten(response.kota_kabupaten);
					kota_kabupaten.innerHTML = "<option disabled>--Pilih Kota/Kabupaten--</option>";
					for (const data_kota_kabupaten of kota_kabupaten_arr) {
						if (data_kota_kabupaten.nama === "<?= $kota_kabupaten ?>") {
							kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}" selected>${data_kota_kabupaten.nama}</option>`;
						} else {
							kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}">${data_kota_kabupaten.nama}</option>`;
						}
					}
				});
		}

		const get_kota_kabupaten = ()  => {
			const url = `${"<?= LOKASI_API ?>"}kota?id_provinsi=${provinsi.value}`;
			fetch(url)
				.then(response => response.json())
				.then(response => {
					const kota_kabupaten_arr = sort_kota_kabupaten(response.kota_kabupaten);
					kota_kabupaten.innerHTML = "<option disabled>--Pilih Kota/Kabupaten--</option>";
					for (const data_kota_kabupaten of kota_kabupaten_arr) {
						if (data_kota_kabupaten.nama === "<?= $kota_kabupaten ?>") {
							kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}" selected>${data_kota_kabupaten.nama}</option>`;
						} else {
							kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}">${data_kota_kabupaten.nama}</option>`;
						}
					}
				});
		}

		if (provinsi.value) {
			get_kota_kabupaten();
		}
		provinsi.addEventListener("change", get_kota_kabupaten_on_change);
	</script>
<?php else: ?>
	<script>
		if (provinsi.value) {
			const url = `${"<?= LOKASI_API ?>"}kota?id_provinsi=${provinsi.value}`;
			fetch(url)
				.then(response => response.json())
				.then(response => {
					const kota_kabupaten_arr = sort_kota_kabupaten(response.kota_kabupaten);
					kota_kabupaten.innerHTML = "<option disabled>--Pilih Kota/Kabupaten--</option>";
					for (const data_kota_kabupaten of kota_kabupaten_arr) {
						if (data_kota_kabupaten.nama === "<?= $data_pendaftar['kota_kabupaten_asal_sekolah'] ?>") {
							console.log(data_kota_kabupaten.nama);
							console.log("<?= $data_pendaftar['kota_kabupaten_asal_sekolah'] ?>");
						kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}" selected>${data_kota_kabupaten.nama}</option>`;
						} else {
							kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}">${data_kota_kabupaten.nama}</option>`;
						}
					}
				});
		}
		provinsi.addEventListener("change", function () {
			const url = `${"<?= LOKASI_API ?>"}kota?id_provinsi=${this.value}`;
			fetch(url)
				.then(response => response.json())
				.then(response => {
					const kota_kabupaten_arr = sort_kota_kabupaten(response.kota_kabupaten);
					kota_kabupaten.innerHTML = "<option disabled>--Pilih Kota/Kabupaten--</option>";
					for (const data_kota_kabupaten of kota_kabupaten_arr) {
						if (data_kota_kabupaten.nama === "<?= $data_pendaftar['kota_kabupaten_asal_sekolah'] ?>") {
							console.log(data_kota_kabupaten.nama);
							console.log("<?= $data_pendaftar['kota_kabupaten_asal_sekolah'] ?>");
						kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}" selected>${data_kota_kabupaten.nama}</option>`;
						} else {
							kota_kabupaten.innerHTML += `<option value="${data_kota_kabupaten.nama}">${data_kota_kabupaten.nama}</option>`;
						}
					}
				});
		});
	</script>
<?php endif; ?>
