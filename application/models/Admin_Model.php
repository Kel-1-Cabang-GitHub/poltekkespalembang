<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function add_new_admin($data)
	{
		// INSERT INTO admin VALUES ($data);
		$this->db->insert('admin', $data);
	}

	public function check_username_exists($username)
	{
		// SELECT * FROM admin WHERE username = $username;
		return $this->db->get_where('admin', ['username' => $username])->row_array();
	}

	public function get_admin_data($username)
	{
		// SELECT * FROM admin WHERE username = $username;
		return $this->db->get_where('admin', ['username' => $username])->row_array();
	}

	public function update_profile($username, $data)
	{
		// UPDATE admin SET $data WHERE username = $username;
		$this->db->where('username', $username);
		$this->db->update('admin', $data);
	}

	public function change_password($username, $new_password)
	{
		// UPDATE admin SET password = $data WHERE username = $username;
		$this->db->where('username', $username);
		$this->db->update('admin', ['password' => $new_password, 'updated_at' => time()]);
	}

	public function get_all_admin()
	{
		// SELECT * FROM admin;
		return $this->db->get('admin')->result_array();
	}
}
