<?php $this->load->view('templates/navbar', ['nav_link' => base_url() . 'admin']) ?>
<main>
	<div class="edit-pendaftar">
		<h2>Ubah Pendaftar</h2>
		<div class="data-edit">
			<section id="sect1">
				<img id="edit-foto" src="<?= base_url(); ?>uploads/img/pas_foto/<?= $data_pendaftar['pas_foto'] ?>" alt="pas foto">
				<div class="tabel-edit">
					<table>
						<tr>
							<td><label for="nama_lengkap">Nama Lengkap</label>
							<td>:</td>
							<td><input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= $data_pendaftar['nama_lengkap'] ?>" autofocus></td>
						</tr>
						<tr>
							<td><label for="nisn">Nomor Induk Siswa Nasional (NISN)</label></td>
							<td>:</td>
							<td><input type="text" name="nisn" id="nisn" value="<?= $data_pendaftar['nisn'] ?>"></td>
						</tr>
						<tr>
							<td>Jalur Pendaftaran</td>
							<td>:</td>
							<td><span class="edit" id="jalur_pendaftaran"><?= $data_pendaftar['jalur_pendaftaran'] ?></span></td>
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
							<td><span class="edit" id="program_studi_pilihan_1">-</span></td>
						</tr>
						<tr>
							<td>Program Studi Pilihan 2</td>
							<td>:</td>
							<td><span class="edit" id="program_studi_pilihan_2">-</span></td>
						</tr>
					</table>
				</div>
			</section>
			<section id="sect2">
				<h2>Data Pribadi</h2>
				<hr>
				<table>
					<tr>
						<td><label for="alamat">Alamat Sesuai KTP</label></td>
						<td>:</td>
						<td>
							<textarea name="alamat" id="alamat"><?= $data_pendaftar['alamat'] ?></textarea>
						</td>
					</tr>
					<tr>
						<td><label for="kode_pos">Kode Pos</label></td>
						<td>:</td>
						<td><input type="text" name="kode_pos" id="kode_pos" value="<?= $data_pendaftar['kode_pos'] ?>"></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><span class="edit" id="tempat_lahir">-</span></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><span class="edit" id="tanggal_lahir">-</span></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><span class="edit" id="jenis_kelamin">-</span></td>
					</tr>
					<tr>
						<td><label for="tinggi_badan">Tinggi Badan</label></td>
						<td>:</td>
						<td><input type="number" min="0" name="tinggi_badan" id="tinggi_badan" value="<?= $data_pendaftar['tinggi_badan'] ?>"></td>
						<td>cm</td>
					</tr>
					<tr>
						<td><label for="berat_badan">Berat Badan</label></td>
						<td>:</td>
						<td><input type="number" min="0" name="berat_badan" id="berat_badan" value="<?= $data_pendaftar['berat_badan'] ?>"></td>
						<td>kg</td>
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
						<td><span class="edit" id="jenis_pendidikan_menengah">-</span></td>
					</tr>
					<tr>
						<td><label for="nama_sekolah">Nama Sekolah</label></td>
						<td>:</td>
						<td><input type="text" name="nama_sekolah" id="nama_sekolah" value="<?= $data_pendaftar['nama_sekolah'] ?>"></td>
					</tr>
					<tr>
						<td>Jenis Sekolah</td>
						<td>:</td>
						<td><span class="edit" id="jenis_sekolah">-</span></td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td><span class="edit" id="jurusan">-</span></td>
					</tr>
					<tr>
						<td>Provinsi Asal Sekolah</td>
						<td>:</td>
						<td><span class="edit" id="provinsi_asal_sekolah">-</span></td>
					</tr>
					<tr>
						<td>Kota/Kabupaten Sekolah</td>
						<td>:</td>
						<td><span class="edit" id="kota_kabupaten_asal_sekolah">-</span></td>
					</tr>
					<tr>
						<td>Akreditasi Sekolah</td>
						<td>:</td>
						<td><span class="edit" id="akreditasi_sekolah">-</span></td>
					</tr>
					<tr>
						<td>Tahun Lulus</td>
						<td>:</td>
						<td><span class="edit" id="tahun_lulus">-</span></td>
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
						<td><span class="edit" id="rekap_nilai_rapot">-</span></td>
					</tr>
					<tr>
						<td><label for="rata_rata_nilai_rapot">Rata-Rata Nilai Rapot</label></td>
						<td>:</td>
						<td>
							<input type="number" min="0" max="100" step="0.1" id="rata_rata_nilai_rapot" value="<?= $data_pendaftar['rata_rata_nilai_rapot'] ?>">
						</td>
					</tr>
					<tr>
						<td><label for="peringkat_semester_1">Peringkat Semester 1</label></td>
						<td>:</td>
						<td><input type="number" min="1" name="peringkat_semester_1" id="peringkat_semester_1" value="<?= $data_pendaftar['peringkat_semester_1'] ?>"></td>
					</tr>
					<tr>
						<td><label for="peringkat_semester_2">Peringkat Semester 2</label></td>
						<td>:</td>
						<td><input type="number" min="1" name="peringkat_semester_2" id="peringkat_semester_2" value="<?= $data_pendaftar['peringkat_semester_2'] ?>"></td>
					</tr>
					<tr>
						<td><label for="peringkat_semester_3">Peringkat Semester 3</label></td>
						<td>:</td>
						<td><input type="number" min="1" name="peringkat_semester_3" id="peringkat_semester_3" value="<?= $data_pendaftar['peringkat_semester_3'] ?>"></td>
					</tr>
					<tr>
						<td><label for="peringkat_semester_4">Peringkat Semester 4</label></td>
						<td>:</td>
						<td><input type="number" min="1" name="peringkat_semester_4" id="peringkat_semester_4" value="<?= $data_pendaftar['peringkat_semester_4'] ?>"></td>
					</tr>
					<tr>
						<td><label for="peringkat_semester_5">Peringkat Semester 5</label></td>
						<td>:</td>
						<td><input type="number" min="1" name="peringkat_semester_5" id="peringkat_semester_5" value="<?= $data_pendaftar['peringkat_semester_5'] ?>"></td>
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
								<span class="edit" id="surat_keterangan_miskin">-</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>Surat Keterangan Penghasilan Keluarga</td>
						<td>:</td>
						<td>
						<a target="_blank" id="surat_keterangan_penghasilan_keluarga" class="link-file" href="<?= base_url(); ?>uploads/pdf/surat_keterangan_penghasilan_keluarga/">
							<span class="edit" id="surat_keterangan_penghasilan_keluarga">-</span>
						</a>
						</td>
					</tr>
					<tr>
						<td>Foto Rumah</td>
						<td>:</td>
						<td>
							<a target="_blank" id="foto_rumah" class="link-file" href="<?= base_url(); ?>uploads/pdf/foto_rumah/">
								<span class="edit" id="foto_rumah">-</span>
							</a>
						</td>
					</tr>
				</table>
			</section>
		</div>
	</div>
</main>
