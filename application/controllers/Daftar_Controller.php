<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('daftar');
		$this->load->model('Daftar_Model');
	}

	public function pilih_jalur()
	{
		$this->load->view('index');
	}

	public function form_pendaftaran()
	{
		$jalur_pendaftaran = $this->input->get('jalur');
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp' atau 'ktmse', user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse') {
			redirect();
		}

		// Validasi data menggunakan form_validation
		// Data Pribadi
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat Sesuai KTP', 'required|trim', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|regex_match[/^[1-9]\d{4}$/]', [
			'required' => '{field} harus diisi!',
			'regex_match' => '{field} harus berupa angka dan terdiri dari 5 digit!'
		]);
		$this->form_validation->set_rules('nisn', 'Nomor Induk Siswa Nasional (NISN)', 'required|trim|is_unique[data_pribadi.nisn]', [
			'required' => '{field} harus diisi!',
			'is_unique' => '{field} sudah terdaftar!'
		]);
		$this->form_validation->set_rules('no_telepon', 'No. Telp/HP', 'required|is_unique[data_pribadi.no_telepon]|regex_match[/^0\d{9,}$/]', [
			'required' => '{field} harus diisi!',
			'is_unique' => '{field} sudah terdaftar!',
			'regex_match' => '{field} harus berupa angka dan dimulai dari angka 0!'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|trim|numeric', [
			'required' => '{field} harus diisi!',
			'numeric' => '{field} harus berupa angka!'
		]);
		$this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|trim|numeric', [
			'required' => '{field} harus diisi!',
			'numeric' => '{field} harus berupa angka!'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
			'required' => '{field} harus diisi!'
		]);
		if (empty($_FILES['pas_foto']['name'])) {
			$this->form_validation->set_rules('pas_foto', 'Pas Foto Terbaru', 'required', [
				'required' => '{field} harus diisi!'
			]);
		}

		// Data Sekolah
		$this->form_validation->set_rules('jenis_pendidikan_menengah', 'Jenis Pendidikan Menengah', 'required|trim', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_sekolah', 'Jenis Sekolah', 'required', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('provinsi_asal_sekolah', 'Provinsi Asal Sekolah', 'required', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('kota_kabupaten_asal_sekolah', 'Kota/Kabupaten Asal Sekolah', 'required', [
			'required' => '{field} harus diisi!'
		]);
		$this->form_validation->set_rules('akreditasi_sekolah', 'Akreditasi Sekolah', 'required', [
			'required' => '{field} harus diisi!',
		]);
		$this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus/Tamat', 'required|trim|integer', [
			'required' => '{field} harus diisi!',
			'integer' => '{field} harus berupa angka!'
		]);
		if (empty($_FILES['rekap_nilai_rapot']['name'])) {
			$this->form_validation->set_rules('rekap_nilai_rapot', 'Rekap Nilai Rapot', 'required', [
				'required' => '{field} harus diisi!'
			]);
		}
		$this->form_validation->set_rules('rata_rata_nilai_rapot', 'Rata-Rata Nilai Rapot', 'required|trim|decimal', [
			'required' => '{field} harus diisi!',
			'decimal' => '{field} harus berupa angka desimal dengan 1 angka dibelakang koma!'
		]);
		// Peringkat
		for ($i = 1; $i <= 5; $i++) {
			$this->form_validation->set_rules('semester_' . $i, 'Peringkat Semester ' . $i, 'required|trim|integer', [
				'required' => '{field} harus diisi!',
				'integer' => '{field} harus berupa angka!'
			]);
		}

		// Program Studi
		if (empty($_FILES['bukti_pembayaran']['name'])) {
			$this->form_validation->set_rules('bukti_pembayaran', 'Upload Bukti Pembayaran', 'required', [
				'required' => '{field} harus diisi!'
			]);
		}
		for ($i = 1; $i <= 2; $i++) {
			$this->form_validation->set_rules('pilihan_' . $i, 'Program Studi Pilihan ' . $i, 'required', [
				'required' => '{field} harus diisi!'
			]);
		}

		// Data Prestasi
		// for ($i = 1; $i <= 5; $i++) {
		// 	if (empty($_FILES['prestasi_' . $i]['name'])) {
		// 		$this->form_validation->set_rules('prestasi_' . $i, 'Upload Prestasi ' . $i, 'required', [
		// 			'required' => '{field} harus diisi!'
		// 		]);
		// 	}
		// }

		// Jika validasi berhasil, data di filter dan disimpan ke database
		if ($this->form_validation->run() == true) {
			$nisn = $this->input->post('nisn');

			$data_pribadi = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap'), true),
				'alamat' => htmlspecialchars($this->input->post('alamat'), true),
				'kode_pos' => htmlspecialchars($this->input->post('kode_pos'), true),
				'nisn' => htmlspecialchars($nisn, true),
				'no_telepon' => htmlspecialchars($this->input->post('no_telepon'), true),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan'), true),
				'berat_badan' => htmlspecialchars($this->input->post('berat_badan'), true),
				'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'pas_foto' =>  upload_file(
					'pas_foto', // $name_attr
					'uploads/img/pas_foto/', // $upload_path
					'jpg|jpeg|png', // $allowed_types
					'pas_foto_' . $nisn, // $file_name
				),
				'jalur_pendaftaran' => strtoupper($jalur_pendaftaran)
			];

			$data_sekolah = [
				'nisn' => $nisn,
				'jenis_pendidikan_menengah' => htmlspecialchars($this->input->post('jenis_pendidikan_menengah'), true),
				'jurusan' => htmlspecialchars($this->input->post('jurusan'), true),
				'nama_sekolah' => htmlspecialchars($this->input->post('nama_sekolah'), true),
				'jenis_sekolah' => $this->input->post('jenis_sekolah'),
				'provinsi_asal_sekolah' => $this->input->post('provinsi_asal_sekolah'),
				'kota_kabupaten_asal_sekolah' => $this->input->post('kota_kabupaten_asal_sekolah'),
				'akreditasi_sekolah' => $this->input->post('akreditasi_sekolah'),
				'tahun_lulus' => htmlspecialchars($this->input->post('tahun_lulus'), true),
				'rekap_nilai_rapot' =>  upload_file(
					'rekap_nilai_rapot', // $name_attr
					'uploads/pdf/rekap_nilai_rapot/', // $upload_path
					'pdf', // $allowed_types
					'rekap_nilai_rapot_' . $nisn, // $file_name
				),
				'rata_rata_nilai_rapot' => htmlspecialchars($this->input->post('rata_rata_nilai_rapot'), true)
			];

			$data_peringkat = [
				'nisn' => $nisn,
				'semester_1' => htmlspecialchars($this->input->post('semester_1'), true),
				'semester_2' => htmlspecialchars($this->input->post('semester_2'), true),
				'semester_3' => htmlspecialchars($this->input->post('semester_3'), true),
				'semester_4' => htmlspecialchars($this->input->post('semester_4'), true),
				'semester_5' => htmlspecialchars($this->input->post('semester_5'), true)
			];

			// Program Studi
			$program_studi = [
				'nisn' => $nisn,
				'bukti_pembayaran' => upload_file(
					'bukti_pembayaran', // $name_attr
					'uploads/img/bukti_pembayaran/', // $upload_path
					'jpg|jpeg|png', // $allowed_types
					'bukti_pembayaran_' . $nisn, // $file_name
				),
				'pilihan_1' => $this->input->post('pilihan_1'),
				'pilihan_2' => $this->input->post('pilihan_2')
			];

			// Data Prestasi
			// $data_prestasi = [];
			// for ($i = 1; $i <= 5; $i++) {
			// 	array_push(
			// 		$data_prestasi,
			// 		upload_file(
			// 			'prestasi_' . $i, // $name_attr
			// 			'uploads/pdf/prestasi/', // $upload_path
			// 			'pdf', // $allowed_types
			// 			'prestasi_' . $i . '_' . $nisn, // $file_name
			// 		)
			// 	);
			// }

			// Data Pribadi
			$this->Daftar_Model->insert_data('data_pribadi', $data_pribadi);
			// Data Sekolah
			$this->Daftar_Model->insert_data('data_sekolah', $data_sekolah);
			// Data Peringkat
			$this->Daftar_Model->insert_data('peringkat', $data_peringkat);
			// Program Studi
			$this->Daftar_Model->insert_data('program_studi', $program_studi);
			// Data Prestasi
			// $this->Daftar_Model->insert_data('data_prestasi', $data_prestasi);

			// if ($jalur_pendaftaran == 'ktmse') {
			// 	// Redirect ke Halaman Form Tambahan Untuk KTMSE/GAKIN
			// 	redirect('form-ktmse-gakin');
			// }

			// jika jalur pendaftaran lewat pmdp
			redirect();
		}

		// Jika data gagal divalidasi, user dikembalikan ke halaman daftar
		$this->load->view('form-pendaftaran');
	}

	// public function form_ktmse_gakin()
	// {
	// 	$this->load->view('form-ktmse-gakin');
	// }

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
			...$data_pribadi_columns,
		);

		insert_data_into_spreadsheet(
			$data_pribadi_sheet,
			$all_data_pribadi,
			...$data_pribadi_columns
		);

		save_spreadsheet($data_pribadi_spreadsheet, 'data_pribadi.xlsx');
	}
}
