<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import yang dibutuhkan untuk export ke excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!function_exists('cek_jalur')) {
	function cek_jalur($jalur_pendaftaran)
	{
		$CI = &get_instance();
		$CI->load->model('Daftar_Model');

		$data_pribadi = $CI->Daftar_Model->get_data_by_jalur('data_pribadi', $jalur_pendaftaran);
		$data_sekolah = $CI->Daftar_Model->join_data_pribadi('data_sekolah', $jalur_pendaftaran);
		$program_studi = $CI->Daftar_Model->join_data_pribadi('program_studi', $jalur_pendaftaran);
		$data_prestasi = $CI->Daftar_Model->join_data_pribadi('data_prestasi', $jalur_pendaftaran);

		if ($jalur_pendaftaran == 'pmdp-ktmse') {
			$data_pribadi = $CI->Daftar_Model->get_all_data('data_pribadi');
			$data_sekolah = $CI->Daftar_Model->get_all_data('data_sekolah');
			$program_studi = $CI->Daftar_Model->get_all_data('program_studi');
			$data_prestasi = $CI->Daftar_Model->get_all_data('data_prestasi');
		}
		return [$data_pribadi, $data_sekolah, $program_studi, $data_prestasi];
	}
}

if (!function_exists('str_to_title_case')) {
	function str_to_title_case($str)
	{
		$str = str_replace('_', ' ',  $str);
		$str = ucwords($str);
		return  $str;
	}
}

if (!function_exists('make_new_spreadsheet')) {
	function make_new_spreadsheet()
	{
		return new Spreadsheet();
	}
}

if (!function_exists('create_new_sheet')) {
	function create_new_sheet($spreadsheet, $sheet_name)
	{
		return $spreadsheet->createSheet()->setTitle($sheet_name);
	}
}

if (!function_exists('make_header_cell')) {
	function make_header_cell($sheet, ...$column_names)
	{
		$columns = 1;
		$sheet->setCellValueByColumnAndRow($columns, 1, 'No.');
		foreach ($column_names as $column_name) {
			$columns++;
			$sheet->setCellValueByColumnAndRow($columns, 1, str_to_title_case($column_name));
		}
	}
}

if (!function_exists('insert_data_into_spreadsheet')) {
	function insert_data_into_spreadsheet($sheet, $all_data, ...$column_names)
	{
		$rows = 2;
		$id_counter = 1;
		foreach ($all_data as $data_per_row) {
			$columns = 1;
			$sheet->setCellValueByColumnAndRow($columns, $rows, $id_counter);
			foreach ($column_names as $column_name) {
				$columns++;
				$sheet->setCellValueByColumnAndRow($columns, $rows, $data_per_row[$column_name]);
			}
			$rows++;
			$id_counter++;
		}
	}
}

if (!function_exists('save_spreadsheet')) {
	function save_spreadsheet($spreadsheet, $jalur_pendaftaran)
	{
		$writer = new Xlsx($spreadsheet);
		$writer->save("exports/xlsx/data_pendaftar_$jalur_pendaftaran.xlsx");
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url() . "exports/xlsx/data_pendaftar_$jalur_pendaftaran.xlsx");
	}
}
