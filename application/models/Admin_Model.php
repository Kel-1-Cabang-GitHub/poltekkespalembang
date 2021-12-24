<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function get_all_data($table_name)
	{
		// SELECT * FROM $table_name;
		return $this->db->get($table_name)->result_array();
	}
}
