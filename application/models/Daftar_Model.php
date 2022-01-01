<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Model extends CI_Model
{
	public function insert_data($table_name, $data)
	{
		// INSERT INTO $table_name VALUES ($data);
		return $this->db->insert($table_name, $data);
	}

	public function data_pendaftar_table($jalur_pendaftaran, $sort_field = 'data_pribadi.nisn', $sort_by = 'ASC')
	{
		/*
		SELECT
			"data_pribadi.nama_lengkap, data_pribadi.nisn, data_pribadi.jenis_kelamin,
			data_sekolah.nama_sekolah, data_sekolah.jurusan, data_pribadi.jalur_pendaftaran
		FROM data_pribadi
		INNER JOIN data_sekolah ON data_pribadi.nisn = data_sekolah.nisn
		if $jalur_pendaftaran != 'pmdp-ktmse' -> WHERE data_pribadi.jalur_pendaftaran = UPPER('$jalur_pendaftaran')
		ORDER BY $sort_field $sort_by;
		*/
		$fields = "data_pribadi.nama_lengkap, data_pribadi.nisn, data_pribadi.jenis_kelamin,
		data_sekolah.nama_sekolah, data_sekolah.jurusan, data_pribadi.jalur_pendaftaran";
		$sort_by = strtoupper($sort_by);
		$this->db->select($fields);
		$this->db->from('data_pribadi');
		$this->db->join('data_sekolah', 'data_pribadi.nisn = data_sekolah.nisn');
		if ($jalur_pendaftaran != 'pmdp-ktmse') $this->db->where('data_pribadi.jalur_pendaftaran', strtoupper($jalur_pendaftaran));
		$this->db->order_by($sort_field, $sort_by);
		$query = $this->db->get();

		if ($query->num_rows() <= 0) return [];
		return $query->result_array();
	}

	public function join_all_tables($jalur_pendaftaran, $sort_field = 'data_pribadi.nisn', $sort_by = 'ASC')
	{
		/*
		SELECT
			data_pribadi.nama_lengkap, data_pribadi.alamat, data_pribadi.kode_pos, data_pribadi.nisn,
			data_pribadi.no_telepon, data_pribadi.jenis_kelamin, data_pribadi.tinggi_badan, data_pribadi.berat_badan,
			data_pribadi.tempat_lahir, data_pribadi.tanggal_lahir, data_pribadi.pas_foto, data_pribadi.jalur_pendaftaran,
			data_sekolah.jenis_pendidikan_menengah, data_sekolah.jurusan, data_sekolah.nama_sekolah,
			data_sekolah.jenis_sekolah, data_sekolah.provinsi_asal_sekolah, data_sekolah.kota_kabupaten_asal_sekolah,
			data_sekolah.akreditasi_sekolah, data_sekolah.tahun_lulus, data_sekolah.rekap_nilai_rapot, data_sekolah.rata_rata_nilai_rapot,
			data_sekolah.peringkat_semester_1, data_sekolah.peringkat_semester_2, data_sekolah.peringkat_semester_3,
			data_sekolah.peringkat_semester_4, data_sekolah.peringkat_semester_5,
			program_studi.bukti_pembayaran, program_studi.program_studi_pilihan_1, program_studi.program_studi_pilihan_2,
			data_prestasi.prestasi_1, data_prestasi.prestasi_2, data_prestasi.prestasi_3, data_prestasi.prestasi_4, data_prestasi.prestasi_5,
			if $jalur_pendaftaran != 'pmdp' -> berkas_ktmse_gakin.surat_keterangan_miskin, berkas_ktmse_gakin.surat_keterangan_penghasilan_keluarga, berkas_ktmse_gakin.foto_rumah
		FROM data_pribadi
		INNER JOIN data_sekolah ON data_pribadi.nisn = data_sekolah.nisn
		INNER JOIN program_studi ON data_pribadi.nisn = program_studi.nisn
		INNER JOIN data_prestasi ON data_pribadi.nisn = data_prestasi.nisn
		if $jalur_pendaftaran != 'pmdp' -> LEFT OUTER JOIN berkas_ktmse_gakin ON data_pribadi.nisn = berkas_ktmse_gakin.nisn
		if $jalur_pendaftaran != 'pmdp-ktmse' -> WHERE data_pribadi.jalur_pendaftaran = UPPER('$jalur_pendaftaran')
		ORDER BY $sort_field $sort_by;
		*/
		$fields = "data_pribadi.nama_lengkap, data_pribadi.alamat, data_pribadi.kode_pos, data_pribadi.nisn,
		data_pribadi.no_telepon, data_pribadi.jenis_kelamin, data_pribadi.tinggi_badan, data_pribadi.berat_badan,
		data_pribadi.tempat_lahir, data_pribadi.tanggal_lahir, data_pribadi.pas_foto, data_pribadi.jalur_pendaftaran,
		data_sekolah.jenis_pendidikan_menengah, data_sekolah.jurusan, data_sekolah.nama_sekolah,
		data_sekolah.jenis_sekolah, data_sekolah.provinsi_asal_sekolah, data_sekolah.kota_kabupaten_asal_sekolah,
		data_sekolah.akreditasi_sekolah, data_sekolah.tahun_lulus, data_sekolah.rekap_nilai_rapot, data_sekolah.rata_rata_nilai_rapot,
		data_sekolah.peringkat_semester_1, data_sekolah.peringkat_semester_2, data_sekolah.peringkat_semester_3,
		data_sekolah.peringkat_semester_4, data_sekolah.peringkat_semester_5,
		program_studi.bukti_pembayaran, program_studi.program_studi_pilihan_1, program_studi.program_studi_pilihan_2,
		data_prestasi.prestasi_1, data_prestasi.prestasi_2, data_prestasi.prestasi_3, data_prestasi.prestasi_4, data_prestasi.prestasi_5";
		if ($jalur_pendaftaran != 'pmdp') {
			$fields .= ", berkas_ktmse_gakin.surat_keterangan_miskin, berkas_ktmse_gakin.surat_keterangan_penghasilan_keluarga, berkas_ktmse_gakin.foto_rumah";
		}
		$sort_by = strtoupper($sort_by);
		$this->db->select($fields);
		$this->db->from('data_pribadi');
		$this->db->join('data_sekolah', 'data_sekolah.nisn = data_pribadi.nisn');
		$this->db->join('program_studi', 'program_studi.nisn = data_pribadi.nisn');
		$this->db->join('data_prestasi', 'data_prestasi.nisn = data_pribadi.nisn');
		if ($jalur_pendaftaran != 'pmdp') $this->db->join('berkas_ktmse_gakin', 'berkas_ktmse_gakin.nisn = data_pribadi.nisn', 'left outer');
		if ($jalur_pendaftaran != 'pmdp-ktmse') $this->db->where('data_pribadi.jalur_pendaftaran', strtoupper($jalur_pendaftaran));
		$this->db->order_by($sort_field, $sort_by);
		$query = $this->db->get();

		if ($query->num_rows() <= 0) return [];
		return $query->result_array();
	}

	public function cek_nisn($nisn)
	{
		return $this->db->get_where('data_pribadi', ['nisn' => $nisn])->num_rows() > 0;
	}

	public function get_pendaftar_by_nisn($nisn, $jalur_pendaftaran)
	{
		/*
		SELECT
			data_pribadi.nama_lengkap, data_pribadi.alamat, data_pribadi.kode_pos, data_pribadi.nisn,
			data_pribadi.no_telepon, data_pribadi.jenis_kelamin, data_pribadi.tinggi_badan, data_pribadi.berat_badan,
			data_pribadi.tempat_lahir, data_pribadi.tanggal_lahir, data_pribadi.pas_foto, data_pribadi.jalur_pendaftaran,
			data_sekolah.jenis_pendidikan_menengah, data_sekolah.jurusan, data_sekolah.nama_sekolah,
			data_sekolah.jenis_sekolah, data_sekolah.provinsi_asal_sekolah, data_sekolah.kota_kabupaten_asal_sekolah,
			data_sekolah.akreditasi_sekolah, data_sekolah.tahun_lulus, data_sekolah.rekap_nilai_rapot, data_sekolah.rata_rata_nilai_rapot,
			data_sekolah.peringkat_semester_1, data_sekolah.peringkat_semester_2, data_sekolah.peringkat_semester_3,
			data_sekolah.peringkat_semester_4, data_sekolah.peringkat_semester_5,
			program_studi.bukti_pembayaran, program_studi.program_studi_pilihan_1, program_studi.program_studi_pilihan_2,
			data_prestasi.prestasi_1, data_prestasi.prestasi_2, data_prestasi.prestasi_3, data_prestasi.prestasi_4, data_prestasi.prestasi_5,
			if $jalur_pendaftaran == 'pmdp' -> berkas_ktmse_gakin.surat_keterangan_miskin, berkas_ktmse_gakin.surat_keterangan_penghasilan_keluarga, berkas_ktmse_gakin.foto_rumah
		FROM data_pribadi
		INNER JOIN data_sekolah ON data_pribadi.nisn = data_sekolah.nisn
		INNER JOIN program_studi ON data_pribadi.nisn = program_studi.nisn
		INNER JOIN data_prestasi ON data_pribadi.nisn = data_prestasi.nisn
		if $jalur_pendaftaran == 'pmdp' -> LEFT OUTER JOIN berkas_ktmse_gakin ON data_pribadi.nisn = berkas_ktmse_gakin.nisn
		WHERE data_pribadi.nisn = $nisn;
		*/
		$fields = "data_pribadi.nama_lengkap, data_pribadi.alamat, data_pribadi.kode_pos, data_pribadi.nisn,
		data_pribadi.no_telepon, data_pribadi.jenis_kelamin, data_pribadi.tinggi_badan, data_pribadi.berat_badan,
		data_pribadi.tempat_lahir, data_pribadi.tanggal_lahir, data_pribadi.pas_foto, data_pribadi.jalur_pendaftaran,
		data_sekolah.jenis_pendidikan_menengah, data_sekolah.jurusan, data_sekolah.nama_sekolah,
		data_sekolah.jenis_sekolah, data_sekolah.provinsi_asal_sekolah, data_sekolah.kota_kabupaten_asal_sekolah,
		data_sekolah.akreditasi_sekolah, data_sekolah.tahun_lulus, data_sekolah.rekap_nilai_rapot, data_sekolah.rata_rata_nilai_rapot,
		data_sekolah.peringkat_semester_1, data_sekolah.peringkat_semester_2, data_sekolah.peringkat_semester_3,
		data_sekolah.peringkat_semester_4, data_sekolah.peringkat_semester_5,
		program_studi.bukti_pembayaran, program_studi.program_studi_pilihan_1, program_studi.program_studi_pilihan_2,
		data_prestasi.prestasi_1, data_prestasi.prestasi_2, data_prestasi.prestasi_3, data_prestasi.prestasi_4, data_prestasi.prestasi_5";
		if ($jalur_pendaftaran == 'ktmse') {
			$fields .= ", berkas_ktmse_gakin.surat_keterangan_miskin, berkas_ktmse_gakin.surat_keterangan_penghasilan_keluarga, berkas_ktmse_gakin.foto_rumah";
		}
		$this->db->select($fields);
		$this->db->from('data_pribadi');
		$this->db->join('data_sekolah', 'data_sekolah.nisn = data_pribadi.nisn');
		$this->db->join('program_studi', 'program_studi.nisn = data_pribadi.nisn');
		$this->db->join('data_prestasi', 'data_prestasi.nisn = data_pribadi.nisn');
		if ($jalur_pendaftaran == 'ktmse') $this->db->join('berkas_ktmse_gakin', 'berkas_ktmse_gakin.nisn = data_pribadi.nisn', 'left outer');
		$this->db->where('data_pribadi.nisn', $nisn);
		$query = $this->db->get();

		if ($query->num_rows() <= 0) return [];
		return $query->row_array();
	}

	public function update_pendaftar_by_nisn($table_name, $data, $nisn)
	{
		// UPDATE $table_nama SET $data WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->update($table_name, $data);
	}

	public function delete_pendaftar_by_nisn($nisn)
	{
		// DELETE FROM data_sekolah WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->delete('data_sekolah');
		// DELETE FROM program_studi WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->delete('program_studi');
		// DELETE FROM data_prestasi WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->delete('data_prestasi');
		// DELETE FROM berkas_ktmse_gakin WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->delete('berkas_ktmse_gakin');
		// DELETE FROM data_pribadi WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->delete('data_pribadi');
	}
}
