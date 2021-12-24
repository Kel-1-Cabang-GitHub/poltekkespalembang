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

	public function data_pendaftar()
	{
		$data = [
			'data_pribadi' => $this->Admin_Model->get_all_data('data_pribadi'),
			'data_sekolah' => $this->Admin_Model->get_all_data('data_sekolah'),
			// 'peringkat' => $this->Admin_Model->get_all_data('peringkat'),
			'program_studi' => $this->Admin_Model->get_all_data('program_studi')
		];

		$this->load->view('data-pendaftar', $data);
	}

	public function export_to_excel()
	{
		$data_pribadi_columns = [
			'nama_lengkap', 'alamat', 'kode_pos', 'nisn',
			'no_telepon', 'jenis_kelamin', 'tinggi_badan', 'berat_badan',
			'tempat_lahir', 'tanggal_lahir', 'pas_foto', 'jalur_pendaftaran'
		];
		$data_sekolah_columns = [
			'nisn', 'jenis_pendidikan_menengah', 'jurusan', 'nama_sekolah',
			'jenis_sekolah', 'provinsi_asal_sekolah', 'kota_kabupaten_asal_sekolah',
			'akreditasi_sekolah', 'tahun_lulus', 'rekap_nilai_rapot', 'rata_rata_nilai_rapot',
			'peringkat_semester_1', 'peringkat_semester_2', 'peringkat_semester_3',
			'peringkat_semester_4', 'peringkat_semester_5'
		];
		$program_studi_columns = ['nisn', 'bukti_pembayaran', 'program_studi_pilihan_1', 'program_studi_pilihan_2'];

		$all_data_pribadi = $this->Admin_Model->get_all_data('data_pribadi');
		$all_data_sekolah = $this->Admin_Model->get_all_data('data_sekolah');
		$all_program_studi = $this->Admin_Model->get_all_data('program_studi');

		$spreadsheet = make_new_spreadsheet();

		$data_pribadi_sheet = $spreadsheet->getActiveSheet()->setTitle('Data Pribadi');
		$data_sekolah_sheet = create_new_sheet($spreadsheet, 'Data Sekolah');
		$program_studi_sheet = create_new_sheet($spreadsheet, 'Program Studi');

		make_header_cell($data_pribadi_sheet, ...$data_pribadi_columns);
		make_header_cell($data_sekolah_sheet, ...$data_sekolah_columns);
		make_header_cell($program_studi_sheet, ...$program_studi_columns);

		insert_data_into_spreadsheet($data_pribadi_sheet, $all_data_pribadi, ...$data_pribadi_columns);
		insert_data_into_spreadsheet($data_sekolah_sheet, $all_data_sekolah, ...$data_sekolah_columns);
		insert_data_into_spreadsheet($program_studi_sheet, $all_program_studi, ...$program_studi_columns);

		save_spreadsheet($spreadsheet);
	}
}