<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Backend Logic Function

if (!function_exists('upload_file')) {
	function upload_file($name_attr, $upload_path, $allowed_types, $file_name)
	{
		// Get main CodeIgniter Object
		$CI = &get_instance();

		if (!empty($_FILES[$name_attr]['name'])) {
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = $allowed_types;
			$config['file_name'] = $file_name;
			$config['file_ext_tolower'] = true;
			$config['overwrite'] = true;
			$config['max_size'] = 5000;

			// Load the upload library
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
	function daftar_program_studi($tag)
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

		foreach ($daftar_program_studi as $program_studi) {
			echo "<$tag value='$program_studi'>Prodi $program_studi</$tag>";
		}
	}
}
