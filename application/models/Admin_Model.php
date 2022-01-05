<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function check_username_exists($username)
	{
		// SELECT * FROM admin WHERE username = $username;
		return $this->db->get_where('admin', ['username' => $username])->num_rows() > 0;
	}

	public function get_admin_data($username)
	{
		// SELECT * FROM admin WHERE username = $username;
		return $this->db->get_where('admin', ['username' => $username])->row_array();
	}
}
