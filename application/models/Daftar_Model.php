<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Model extends CI_Model
{
	public function insert_data($table_name, $data)
	{
		// INSERT INTO $table_name VALUES ($data);
		return $this->db->insert($table_name, $data);
	}

	public function get_all_data($table_name)
	{
		if ($this->count_rows($table_name) <= 0) return [];
		// SELECT * FROM $table_name;
		return $this->db->get($table_name)->result_array();
	}

	public function get_data_by_jalur($table_name, $jalur_pendaftaran)
	{
		if ($this->count_rows($table_name) <= 0) return [];
		// SELECT * FROM $table_name WHERE jalur = $jalur;
		return $this->db->get_where($table_name, ['jalur_pendaftaran' => strtoupper($jalur_pendaftaran)])->result_array();
	}

	public function join_data_pribadi($table_name, $jalur_pendaftaran)
	{
		// SELECT * FROM $table_name JOIN data_pribadi ON $table_name.nisn = data_pribadi.nisn
		// WHERE $data_pribadi.jalur_pendaftaran=$jalur_pendaftaran;
		$data = $this->db->select("$table_name.*")
			->from($table_name)
			->join('data_pribadi', "data_pribadi.nisn = $table_name.nisn")
			->where(['data_pribadi.jalur_pendaftaran' => strtoupper($jalur_pendaftaran)])
			->get()->result_array();

		return $data;
	}

	public function join_two_tables($from, $to, $jalur_pendaftaran)
	{
		if ($jalur_pendaftaran == 'pmdp-ktmse') {
			// SELECT * FROM $from JOIN $to ON $from.nisn = $to.nisn;
			return $this->db->select("*")
				->from($from)
				->join($to, "$to.nisn = $from.nisn")
				->get()->result_array();
		}
		// SELECT * FROM $from JOIN $to ON $from.nisn = $to.nisn
		// WHERE $from.jalur_pendaftaran=$jalur_pendaftaran;
		return $this->db->select("*")
			->from($from)
			->join($to, "$to.nisn = $from.nisn")
			->where(["$from.jalur_pendaftaran" => strtoupper($jalur_pendaftaran)])
			->get()->result_array();
	}

	public function join_all_tables($jalur_pendaftaran)
	{
		if ($jalur_pendaftaran = 'pmdp') {
			// SELECT * FROM data_pribadi JOIN data_sekolah ON data_pribadi.nisn = data_sekolah.nisn
			// JOIN program_studi ON data_pribadi.nisn = program_studi.nisn
			// JOIN data_prestasi ON data_pribadi.nisn = data_prestasi.nisn

			return $this->db->select("data_pribadi.*, data_sekolah.*, program_studi.*, data_prestasi.*")
				->from('data_pribadi')
				->join('data_sekolah', "data_pribadi.nisn = data_sekolah.nisn")
				->join('program_studi', "data_pribadi.nisn = program_studi.nisn")
				->join('data_prestasi', "data_pribadi.nisn = data_prestasi.nisn")
				->get()->result_array();
		}
		if ($jalur_pendaftaran == 'ktmse') {
			// SELECT * FROM data_pribadi JOIN data_sekolah ON data_pribadi.nisn = data_sekolah.nisn
			// JOIN program_studi ON data_pribadi.nisn = program_studi.nisn
			// JOIN data_prestasi ON data_pribadi.nisn = data_prestasi.nisn
			// JOIN berkas_ktmse_gakin ON data_pribadi.nisn = berkas_ktmse_gakin.nisn
			return $this->db->select("data_pribadi.*, data_sekolah.*, program_studi.*, data_prestasi.*, berkas_ktmse_gakin.*")
				->from('data_pribadi')
				->join('data_sekolah', "data_pribadi.nisn = data_sekolah.nisn")
				->join('program_studi', "data_pribadi.nisn = program_studi.nisn")
				->join('data_prestasi', "data_pribadi.nisn = data_prestasi.nisn")
				->join('berkas_ktmse_gakin', "data_pribadi.nisn = berkas_ktmse_gakin.nisn")
				->get()->result_array();
		}
		// $jalur_pendaftaran = 'pmdp-ktmse';
		// SELECT * FROM data_pribadi
		// INNER JOIN data_sekolah ON data_pribadi.nisn = data_sekolah.nisn
		// INNER JOIN program_studi ON data_pribadi.nisn = program_studi.nisn
		// INNER JOIN data_prestasi ON data_pribadi.nisn = data_prestasi.nisn
		// LEFT OUTER JOIN berkas_ktmse_gakin ON data_pribadi.nisn = berkas_ktmse_gakin.nisn;
		return $this->db->select("data_pribadi.*, data_sekolah.*, program_studi.*, data_prestasi.*, berkas_ktmse_gakin.*")
			->from('data_pribadi')
			->join('data_sekolah', "data_pribadi.nisn = data_sekolah.nisn", 'inner')
			->join('program_studi', "data_pribadi.nisn = program_studi.nisn", 'inner')
			->join('data_prestasi', "data_pribadi.nisn = data_prestasi.nisn", 'inner')
			->join('berkas_ktmse_gakin', "data_pribadi.nisn = berkas_ktmse_gakin.nisn", 'left outer')
			->where(['data_pribadi.jalur_pendaftaran' => strtoupper($jalur_pendaftaran)])
			->get()->result_array();
	}

	public function update_data_by_nisn($table_nama, $data, $nisn)
	{
		// UPDATE $table_nama SET $data WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->update($table_nama, $data);
	}

	public function delete_data_by_nisn($table_nama, $nisn)
	{
		// DELETE FROM $table_nama WHERE nisn = $nisn;
		$this->db->where('nisn', $nisn);
		$this->db->delete($table_nama);
	}

	public function count_rows($table_name)
	{
		// SELECT COUNT(*) FROM $table_name;
		return $this->db->get($table_name)->num_rows();
	}
}
