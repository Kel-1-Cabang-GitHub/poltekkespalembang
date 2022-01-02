<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import yang dibutuhkan untuk export ke excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!function_exists('kebab_to_snake')) {
	function kebab_to_snake($string)
	{
		return strtolower(preg_replace('/[^A-Za-z0-9\.]/', '_', $string));
	}
}

if (!function_exists('snake_to_kebab')) {
	function snake_to_kebab($string)
	{
		return strtolower(preg_replace('/_/', '-', $string));
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
		$jalur_pendaftaran = kebab_to_snake($jalur_pendaftaran);
		$writer = new Xlsx($spreadsheet);
		$writer->save("exports/xlsx/data_pendaftar_$jalur_pendaftaran.xlsx");
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url() . "exports/xlsx/data_pendaftar_$jalur_pendaftaran.xlsx");
	}
}
