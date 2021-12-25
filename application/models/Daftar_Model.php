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

	public function update_data($table_nama, $data, $id)
	{
		// UPDATE $table_nama SET $data WHERE id = $id;
		$this->db->where('id', $id);
		$this->db->update($table_nama, $data);
	}

	public function delete_data($table_nama, $id)
	{
		// DELETE FROM $table_nama WHERE id = $id;
		$this->db->where('id', $id);
		$this->db->delete($table_nama);
	}

	public function count_rows($table_name)
	{
		// SELECT COUNT(*) FROM $table_name;
		return $this->db->get($table_name)->num_rows();
	}
}
