<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function get_all_data($table_name)
	{
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
}
