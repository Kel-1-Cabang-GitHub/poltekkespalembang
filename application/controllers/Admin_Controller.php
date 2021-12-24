<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('admin');
		$this->load->model('Admin_Model');
	}

	public function register()
	{
	}

	public function login()
	{
	}

	public function logout()
	{
	}

	public function tabel_data()
	{
		$data = [
			'data_pribadi' => $this->Admin_Model->get_all_data('data_pribadi'),
			'data_sekolah' => $this->Admin_Model->get_all_data('data_sekolah'),
			'peringkat' => $this->Admin_Model->get_all_data('peringkat'),
			'program_studi' => $this->Admin_Model->get_all_data('program_studi')
		];

		$this->load->view('tabel-data', $data);
	}

	public function data_pribadi_excel()
	{
		$data_pribadi_columns = [
			'nama_lengkap', 'alamat', 'kode_pos', 'nisn',
			'no_telepon', 'jenis_kelamin', 'tinggi_badan', 'berat_badan',
			'tempat_lahir', 'tanggal_lahir', 'pas_foto', 'jalur_pendaftaran'
		];
		$all_data_pribadi = $this->Admin_Model->get_all_data('data_pribadi');

		[$data_pribadi_spreadsheet, $data_pribadi_sheet] = make_new_spreadsheet('data_pribadi');

		make_header_cell(
			$data_pribadi_sheet,
			...$data_pribadi_columns
		);

		insert_data_into_spreadsheet(
			$data_pribadi_sheet,
			$all_data_pribadi,
			...$data_pribadi_columns
		);

		save_spreadsheet($data_pribadi_spreadsheet, 'data_pribadi.xlsx');
	}

	public function data_sekolah_excel()
	{
	}

	public function program_studi_excel()
	{
	}
}
