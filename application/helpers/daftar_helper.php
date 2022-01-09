<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Backend Logic Function

if (!function_exists('upload_file')) {
	function upload_file($name_attr, $upload_path, $allowed_types, $file_name)
	{
		$CI = &get_instance();

		if (empty($_FILES[$name_attr]['name'])) return null;
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = $allowed_types;
		$config['file_name'] = $file_name;
		$config['file_ext_tolower'] = true;
		$config['overwrite'] = true;
		$config['max_size'] = 5000;

		$CI->load->library('upload', $config);

		$CI->upload->initialize($config);
		if ($CI->upload->do_upload($name_attr)) return $CI->upload->data('file_name');
		return $CI->upload->display_errors();
	}
}

if (!function_exists('provinsi_id_to_name')) {
	function provinsi_id_to_name($provinsi_id)
	{
		return PROVINSI[(int) $provinsi_id];
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

if (!function_exists('daftar_provinsi')) {
	function daftar_provinsi($checker = "")
	{
		$json_data = @file_get_contents(LOKASI_API . "provinsi");
		$response_data = json_decode($json_data);
		$daftar_provinsi = $response_data->provinsi;

		usort($daftar_provinsi, function ($a, $b) {
			return strcmp($a->nama, $b->nama);
		});

		$res_str = "";
		foreach ($daftar_provinsi as $provinsi) {
			$res_str .= "<option value=$provinsi->id";
			if ($checker) {
				$res_str .= ($provinsi->id == $checker) ? " selected" : "";
			} else {
				$res_str .= set_select('provinsi_asal_sekolah', $provinsi->id);
			}
			$res_str .= ">$provinsi->nama</option>";
		}
		echo $res_str;
	}
}

if (!function_exists('daftar_program_studi')) {
	function daftar_program_studi($tag, $name = "", $checker = "")
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
				$res_str .= " value='Prodi $program_studi'";
				if ($checker) {
					($checker == "Prodi $program_studi") ? $res_str .= " selected" : "";
				} else {
					$res_str .= set_select($name, "Prodi $program_studi");
				}
			}
			$res_str .= ">Prodi $program_studi</$tag>";
		}
		echo $res_str;
	}
}
