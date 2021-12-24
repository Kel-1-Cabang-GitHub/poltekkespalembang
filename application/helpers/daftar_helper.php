<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import yang dibutuhkan untuk export ke excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Backend Logic Function

if (!function_exists('upload_file')) {
	function upload_file($name_attr, $upload_path, $allowed_types, $file_name)
	{
		$CI = &get_instance();

		if (!empty($_FILES[$name_attr]['name'])) {
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = $allowed_types;
			$config['file_name'] = $file_name;
			$config['file_ext_tolower'] = true;
			$config['overwrite'] = true;
			$config['max_size'] = 5000;

			$CI->load->library('upload', $config);

			$CI->upload->initialize($config);
			if ($CI->upload->do_upload($name_attr)) {
				return $CI->upload->data('file_name');
			}
		} else {
			return 'No file uploaded';
		}
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

// Frontend Logic Function

if (!function_exists('daftar_tempat_lahir')) {
	function daftar_tempat_lahir()
	{
		$daftar_tempat_lahir = [
			'Banyuasin', 'Empat Lawang', 'Lahat', 'Lubuk Linggau', 'Muara Enim',
			'Musi Banyuasin', 'Musi Rawas', 'Musi Rawas Utara', 'Ogan Ilir', 'Ogan Komering Ilir',
			'Ogan Komering Ulu', 'Ogan Komering Ulu Selatan', 'Ogan Komering Ulu Timur',
			'Penukal Abad Lematang Ilir', 'Pagar Alam', 'Palembang', 'Prabumulih'
		];
		sort($daftar_tempat_lahir);

		foreach ($daftar_tempat_lahir as $tempat_lahir) {
			echo "<option value='$tempat_lahir'>$tempat_lahir</option>";
		}
	}
}

if (!function_exists('daftar_tahun_lulus')) {
	function daftar_tahun_lulus()
	{
		for ($year = date('Y') - 5; $year <= date('Y'); $year++) {
			echo "<option value='$year'>$year</option>";
		}
	}
}

if (!function_exists('daftar_program_studi')) {
	function daftar_program_studi($tag, $name = "")
	{
		$daftar_program_studi = [
			"DIII Keperawatan Palembang",
			"DIII Keperawatan Kampus Baturaja",
			"DIII Keperawatan Kampus Lubuk Linggau",
			"DIII Keperawatan Kampus Lahat",
			"DIII Gizi Palembang",
			"Gizi dan Dietika Program Sarjana Terapan (reguler)",
			"DIII Kebidanan Palembang",
			"DIII Kebidanan Kampus Muara Enim",
			"Kebidanan Sarjana Terapan (reguler)",
			"DIII Farmasi",
			"DIII Teknologi Laboratorium Medis (TLM)",
			"TLM Program Sarjana Terapan",
			"DIII Kesehatan Gigi",
			"DIII Sanitasi"
		];

		$res_str = "";
		foreach ($daftar_program_studi as $program_studi) {
			$res_str .= "<$tag";
			if ($tag == "option") {
				$res_str .= " value='$program_studi'" . set_select($name, $program_studi);
			}
			$res_str .= ">Prodi $program_studi</$tag>";
		}
		echo $res_str;
	}
}
