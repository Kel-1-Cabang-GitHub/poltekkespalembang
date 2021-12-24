<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Controller extends CI_Controller
{
	public function data_pribadi()
	{
		$this->load->view('data-pribadi', [
			'data_pribadi' => $this->Daftar_Model->get_all_data('data_pribadi')
		]);
	}

	public function data_pribadi_excel()
	{
		$data_pribadi_columns = [
			'nama_lengkap', 'alamat', 'kode_pos', 'nisn',
			'no_telepon', 'jenis_kelamin', 'tinggi_badan', 'berat_badan',
			'tempat_lahir', 'tanggal_lahir', 'pas_foto', 'jalur_pendaftaran'
		];
		$all_data_pribadi = $this->Daftar_Model->get_all_data('data_pribadi');

		[$data_pribadi_spreadsheet, $data_pribadi_sheet] = make_new_spreadsheet('data_pribadi');

		make_header_cell(
			$data_pribadi_sheet,
			$data_pribadi_columns,
		);

		insert_data_into_spreadsheet(
			$data_pribadi_sheet,
			$all_data_pribadi,
			$data_pribadi_columns
		);

		save_spreadsheet($data_pribadi_spreadsheet, 'data_pribadi.xlsx');
	}
}
