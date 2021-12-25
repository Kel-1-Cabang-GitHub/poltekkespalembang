<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function add_new_user($data)
	{
		// INSERT INTO user VALUES ($data);
		$this->db->insert('user', $data);
	}

	public function check_username_exists($username)
	{
		// SELECT * FROM user WHERE username = $username;
		return $this->db->get_where('user', ['username' => $username])->row_array();
	}

	public function get_user_data($username)
	{
		// SELECT * FROM user WHERE username = $username;
		$this->db->where('username', $username);
		return $this->db->get('user')->row_array();
	}

	public function update_profile($username, $data)
	{
		// UPDATE user SET $data WHERE username = $username;
		$this->db->where('username', $username);
		$this->db->update('user', $data);
	}

	public function change_password($username, $new_password)
	{
		// UPDATE user SET password = $data WHERE username = $username;
		$this->db->where('username', $username);
		$this->db->update('user', ['password' => $new_password, 'updated_at' => time()]);
	}

	public function get_all_user()
	{
		// SELECT * FROM user;
		return $this->db->get('user')->result_array();
	}
}
