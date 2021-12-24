<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import yang dibutuhkan untuk export ke excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!function_exists('str_to_title_case')) {
	function str_to_title_case($str)
	{
		$str = str_replace('_', ' ',  $str);
		$str = ucwords($str);
		return  $str;
	}
}

if (!function_exists('make_new_spreadsheet')) {
	function make_new_spreadsheet($table_name)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle(str_to_title_case($table_name));

		return [$spreadsheet, $sheet];
	}
}

if (!function_exists('make_header_cell')) {
	function make_header_cell($sheet, ...$column_names)
	{
		$current_cell = 'A';
		$sheet->setCellValue($current_cell . '1', 'No.');
		foreach ($column_names as $column_name) {
			if ($current_cell == 'Z') break;
			$current_cell = chr(ord($current_cell) + 1);
			$sheet->setCellValue($current_cell . '1', str_to_title_case($column_name));
		}
	}
}

if (!function_exists('insert_data_into_spreadsheet')) {
	function insert_data_into_spreadsheet($sheet, $all_data, ...$column_names)
	{
		$rows = 2;
		$counter = 1;
		foreach ($all_data as $data_per_row) {
			$current_cell = 'A';
			$sheet->setCellValue($current_cell . $rows, $counter);
			foreach ($column_names as $column_name) {
				if ($current_cell == 'Z') break;
				$current_cell = chr(ord($current_cell) + 1);
				$sheet->setCellValue($current_cell . $rows, $data_per_row[$column_name]);
			}
			$rows++;
			$counter++;
		}
	}
}

if (!function_exists('save_spreadsheet')) {
	function save_spreadsheet($spreadsheet, $file_name)
	{
		$writer = new Xlsx($spreadsheet);
		$writer->save("uploads/xlsx/" . $file_name);
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url() . "uploads/xlsx/" . $file_name);
	}
}
