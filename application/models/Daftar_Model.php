<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Model extends CI_Model
{
	public function insert_data($table_name, $data)
	{
		// INSERT INTO $table_name VALUES ($data);
		return $this->db->insert($table_name, $data);
	}
}
