<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Controller extends CI_Controller
{
	public function __construct()
	{
		@parent::__construct();
		$this->load->helper('daftar');
		$this->load->model('Daftar_Model');
	}

	public function pilih_jalur()
	{
		$this->load->view('index');
	}

	public function form_pendaftaran()
	{
		$jalur_pendaftaran = $this->uri->segment(3, $this->uri->segment(2));
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp' atau 'ktmse', user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse') redirect();

		// Validasi data menggunakan form_validation
		// Data Pribadi
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat Sesuai KTP', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|regex_match[/^[1-9]\d{4}$/]', [
			'required' => '{field} harus diisi!',
			'regex_match' => '*{field} harus berupa angka dan terdiri dari 5 digit!'
		]);
		$this->form_validation->set_rules('nisn', 'Nomor Induk Siswa Nasional (NISN)', 'required|trim|is_unique[data_pribadi.nisn]', [
			'required' => '*{field} harus diisi!',
			'is_unique' => '*{field} sudah terdaftar!'
		]);
		$this->form_validation->set_rules('no_telepon', 'No. Telp/HP', 'required|is_unique[data_pribadi.no_telepon]|min_length[10]|regex_match[/^0\d{9,}$/]', [
			'required' => '*{field} harus diisi!',
			'is_unique' => '*{field} sudah terdaftar!',
			'min_length' => '*{field} minimal terdiri dari 10 angka!',
			'regex_match' => '*{field} harus berupa angka dan dimulai dari angka 0!'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|trim|numeric', [
			'required' => '*{field} harus diisi!',
			'numeric' => '*{field} harus berupa angka!'
		]);
		$this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|trim|numeric', [
			'required' => '*{field} harus diisi!',
			'numeric' => '*{field} harus berupa angka!'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
			'required' => '*{field} harus diisi!'
		]);
		if (empty($_FILES['pas_foto']['name'])) {
			$this->form_validation->set_rules('pas_foto', 'Pas Foto Terbaru', 'required', [
				'required' => '*{field} harus diisi!'
			]);
		}

		// Data Sekolah
		$this->form_validation->set_rules('jenis_pendidikan_menengah', 'Jenis Pendidikan Menengah', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('jenis_sekolah', 'Jenis Sekolah', 'required', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('provinsi_asal_sekolah', 'Provinsi Asal Sekolah', 'required', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('kota_kabupaten_asal_sekolah', 'Kota/Kabupaten Asal Sekolah', 'required', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('akreditasi_sekolah', 'Akreditasi Sekolah', 'required', [
			'required' => '*{field} harus diisi!',
		]);
		$this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus/Tamat', 'required|trim|integer', [
			'required' => '*{field} harus diisi!',
			'integer' => '*{field} harus berupa angka!'
		]);
		if (empty($_FILES['rekap_nilai_rapot']['name'])) {
			$this->form_validation->set_rules('rekap_nilai_rapot', 'Rekap Nilai Rapot', 'required', [
				'required' => '*{field} harus diisi!'
			]);
		}
		$this->form_validation->set_rules('rata_rata_nilai_rapot', 'Rata-Rata Nilai Rapot', 'required|trim|decimal', [
			'required' => '*{field} harus diisi!',
			'decimal' => '*{field} harus berupa angka desimal dengan 1 angka dibelakang koma!'
		]);
		for ($i = 1; $i <= 5; $i++) {
			$this->form_validation->set_rules("peringkat_semester_$i", "Peringkat Semester $i", 'required|trim|integer', [
				'required' => '*{field} harus diisi!',
				'integer' => '*{field} harus berupa angka!'
			]);
		}

		// Program Studi
		if (empty($_FILES['bukti_pembayaran']['name'])) {
			$this->form_validation->set_rules('bukti_pembayaran', 'Upload Bukti Pembayaran', 'required', [
				'required' => '*{field} harus diisi!'
			]);
		}
		$this->form_validation->set_rules("program_studi_pilihan_1", "Program Studi Pilihan 1", 'required', [
			'required' => '*{field} harus diisi!'
		]);

		if ($jalur_pendaftaran == 'ktmse') {
			// Berkas KTMSE/GAKIN
			if (empty($_FILES['surat_keterangan_miskin']['name'])) {
				$this->form_validation->set_rules('surat_keterangan_miskin', 'Upload Surat Keterangan Miskin', 'required', [
					'required' => '*{field} harus diisi!'
				]);
			}
			if (empty($_FILES['surat_keterangan_penghasilan_keluarga']['name'])) {
				$this->form_validation->set_rules('surat_keterangan_penghasilan_keluarga', 'Upload Surat Keterangan Penghasilan Keluarga', 'required', [
					'required' => '*{field} harus diisi!'
				]);
			}
			if (empty($_FILES['foto_rumah']['name'])) {
				$this->form_validation->set_rules('foto_rumah', 'Upload Foto Rumah', 'required', [
					'required' => '*{field} harus diisi!'
				]);
			}
		}

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
					"pas_foto_$nisn", // $file_name
				),
				'jalur_pendaftaran' => strtoupper($jalur_pendaftaran)
			];

			$data_sekolah = [
				'nisn' => $nisn,
				'jenis_pendidikan_menengah' => htmlspecialchars($this->input->post('jenis_pendidikan_menengah'), true),
				'jurusan' => htmlspecialchars($this->input->post('jurusan'), true),
				'nama_sekolah' => htmlspecialchars($this->input->post('nama_sekolah'), true),
				'jenis_sekolah' => $this->input->post('jenis_sekolah'),
				'provinsi_asal_sekolah' => provinsi_id_to_name($this->input->post('provinsi_asal_sekolah')),
				'kota_kabupaten_asal_sekolah' => $this->input->post('kota_kabupaten_asal_sekolah'),
				'akreditasi_sekolah' => $this->input->post('akreditasi_sekolah'),
				'tahun_lulus' => htmlspecialchars($this->input->post('tahun_lulus'), true),
				'rekap_nilai_rapot' =>  upload_file(
					'rekap_nilai_rapot', // $name_attr
					'uploads/xlsx/rekap_nilai_rapot/', // $upload_path
					'xls|xlsx', // $allowed_types
					"rekap_nilai_rapot_$nisn", // $file_name
				),
				'rata_rata_nilai_rapot' => htmlspecialchars($this->input->post('rata_rata_nilai_rapot'), true),
			];
			for ($i = 1; $i <= 5; $i++) {
				$data_sekolah["peringkat_semester_$i"] = htmlspecialchars($this->input->post("peringkat_semester_$i"), true);
			}

			// Program Studi
			$program_studi = [
				'nisn' => $nisn,
				'bukti_pembayaran' => upload_file(
					'bukti_pembayaran', // $name_attr
					'uploads/img/bukti_pembayaran/', // $upload_path
					'jpg|jpeg|png', // $allowed_types
					"bukti_pembayaran_$nisn", // $file_name
				),
				'program_studi_pilihan_1' => $this->input->post('program_studi_pilihan_1'),
				'program_studi_pilihan_2' => $this->input->post('program_studi_pilihan_2')
			];

			// Data Prestasi
			$data_prestasi = ['nisn' => $nisn,];
			for ($i = 1; $i <= 5; $i++) {
				$data_prestasi["prestasi_$i"] = upload_file(
					"prestasi_$i", // $name_attr
					"uploads/pdf/prestasi_$i/", // $upload_path
					'pdf', // $allowed_types
					"prestasi_$i\_$nisn", // $file_name
				);
			}

			if ($jalur_pendaftaran == 'ktmse') {
				// Berkas KTMSE/GAKIN
				$berkas_ktmse_gakin = [
					'nisn' => $nisn,
					'surat_keterangan_miskin' => upload_file(
						'surat_keterangan_miskin', // $name_attr
						'uploads/pdf/surat_keterangan_miskin/', // $upload_path
						'pdf', // $allowed_types
						"surat_keterangan_miskin_$nisn", // $file_name
					),
					'surat_keterangan_penghasilan_keluarga' => upload_file(
						'surat_keterangan_penghasilan_keluarga', // $name_attr
						'uploads/pdf/surat_keterangan_penghasilan_keluarga/', // $upload_path
						'pdf', // $allowed_types
						"surat_keterangan_penghasilan_keluarga_$nisn", // $file_name
					),
					'foto_rumah' => upload_file(
						'foto_rumah', // $name_attr
						'uploads/pdf/foto_rumah/', // $upload_path
						'pdf', // $allowed_types
						"foto_rumah_$nisn", // $file_name
					),
				];
			}

			// Data Pribadi
			$this->Daftar_Model->insert_data('data_pribadi', $data_pribadi);
			// Data Sekolah
			$this->Daftar_Model->insert_data('data_sekolah', $data_sekolah);
			// Program Studi
			$this->Daftar_Model->insert_data('program_studi', $program_studi);
			// Data Prestasi
			$this->Daftar_Model->insert_data('data_prestasi', $data_prestasi);
			if ($jalur_pendaftaran == 'ktmse') {
				// Berkas KTMSE/GAKIN
				$this->Daftar_Model->insert_data('berkas_ktmse_gakin', $berkas_ktmse_gakin);
			}

			$this->session->set_userdata('berhasil-daftar', true);

			// jika jalur pendaftaran lewat pmdp
			redirect('terima-kasih');
		}
		// Jika data gagal divalidasi, user dikembalikan ke halaman daftar
		$this->load->view('form-pendaftaran');
	}

	public function terima_kasih()
	{
		if (!$this->session->userdata('berhasil-daftar')) redirect();

		$this->session->unset_userdata('berhasil-daftar');
		$this->load->view('terima-kasih');
	}
}
