<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	public function __construct()
	{
		@parent::__construct();
		$this->load->helper('admin');
		$this->load->helper('daftar');
		$this->load->model('Admin_Model');
		$this->load->model('Daftar_Model');
	}

	public function admin()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$data = [
			'page_title' => 'Admin Page - Sipenmaru | POLTEKKES KEMENKES PALEMBANG',
			'styles' => ['index', 'alert', 'data'],
			'scripts' => ['index-admin']
		];

		$this->load->view('templates/header', $data);
		$this->load->view('index-admin');
		$this->load->view('templates/footer');
	}

	public function post_login()
	{
		if ($this->session->userdata('username')) redirect('admin');

		$username_error = '';
		$password_error = '';
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Validasi Username
		if (!$username) {
			$username_error = '*Username harus diisi!';
		} else if (!$this->Admin_Model->check_username_exists($username)) {
			$username_error = '*Username belum terdaftar!';
		}

		$admin = $this->Admin_Model->get_admin_data($username);

		// Validasi Password
		if (!$password) {
			$password_error = '*Password harus diisi!';
		} else if (hash('sha256', $password) != @str_replace('\x', '', $admin['password'])) {
			$password_error = '*Password anda salah!';
		}

		if (hash('sha256', $password) == @str_replace('\x', '', $admin['password'])) {
			$data = [
				'username' => $admin['username'],
				'role' => $admin['role']
			];

			$this->session->set_userdata($data);

			redirect('admin');
		}

		$data = [
			'page_title' => 'Login Admin | POLTEKKES KEMENKES PALEMBANG',
			'styles' => ['form', 'alert'],
			'scripts' => [],
			'username_error' => $username_error,
			'password_error' => $password_error,
			'username_value' => (!$username_error && $password_error)
		];

		$this->load->view('templates/header', $data);
		$this->load->view('login-admin');
		$this->load->view('templates/footer');
	}

	public function get_login()
	{
		if ($this->session->userdata('username')) redirect('admin');

		$data = [
			'page_title' => 'Login Admin | POLTEKKES KEMENKES PALEMBANG',
			'styles' => ['form', 'alert'],
			'scripts' => []
		];

		$this->load->view('templates/header', $data);
		$this->load->view('login-admin');
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		if ($this->session->userdata('username')) {
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role');
			$this->session->sess_destroy();
		}
		redirect('admin/login');
	}

	public function data_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$jalur_pendaftaran = $this->uri->segment(3);
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp','ktmse', atau pmdp-ktmse user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse' && $jalur_pendaftaran != 'pmdp-ktmse') redirect('admin');

		[$sort_field, $sort_by] = filter_sort_query('field', 'sort');

		$keyword = '';
		if ($this->input->get('q')) $keyword = $this->input->get('q');

		$data = [
			'jalur' => strtoupper($jalur_pendaftaran),
			'data_pendaftar' => $this->Daftar_Model->data_pendaftar_table($jalur_pendaftaran, $sort_field, $sort_by, $keyword)
		];
		$this->load->view('data-pendaftar', $data);
	}

	public function cari_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$jalur_pendaftaran = $this->input->get('search_jalur');
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp','ktmse', atau pmdp-ktmse user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse' && $jalur_pendaftaran != 'pmdp-ktmse') redirect('admin');

		[$sort_field, $sort_by] = filter_sort_query('search_field', 'search_sort');

		$keyword = $this->input->get('search_keyword');
		if (preg_match('/^\s*$/', $keyword)) $keyword = '';
		$keyword = trim($keyword);

		$redirect_path = "admin/data-pendaftar/$jalur_pendaftaran";
		if ($sort_field != 'nisn') $redirect_path .= '?field=' . snake_to_kebab($sort_field);
		$redirect_path .= (($sort_by != 'asc') ? ((($sort_field == 'nisn') ? '?' : '&') . "sort=$sort_by") : '');
		$redirect_path .= (($keyword != '') ? ((($sort_field == 'nisn' &&  $sort_by == 'asc') ? '?' : '&') . "q=$keyword") : '');
		redirect($redirect_path);
	}

	public function export_to_excel()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$jalur_pendaftaran = $this->uri->segment(3);
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp','ktmse', atau pmdp-ktmse user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse' && $jalur_pendaftaran != 'pmdp-ktmse') redirect('admin');

		$data_pendaftar = $this->Daftar_Model->join_all_tables($jalur_pendaftaran);
		$data_pendaftar_fields = "nama_lengkap, alamat, kode_pos, nisn,
		no_telepon, jenis_kelamin, tinggi_badan, berat_badan,
		tempat_lahir, tanggal_lahir, pas_foto, jalur_pendaftaran,
		jenis_pendidikan_menengah, jurusan, nama_sekolah,
		jenis_sekolah, provinsi_asal_sekolah, kota_kabupaten_asal_sekolah,
		akreditasi_sekolah, tahun_lulus, rekap_nilai_rapot, rata_rata_nilai_rapot,
		peringkat_semester_1, peringkat_semester_2, peringkat_semester_3,
		peringkat_semester_4, peringkat_semester_5,
		bukti_pembayaran, program_studi_pilihan_1, program_studi_pilihan_2,
		prestasi_1, prestasi_2, prestasi_3, prestasi_4, prestasi_5";
		if ($jalur_pendaftaran != 'pmdp') {
			$data_pendaftar_fields .= ", surat_keterangan_miskin, surat_keterangan_penghasilan_keluarga, foto_rumah";
		}
		$data_pendaftar_fields = preg_replace('/\s+/', '', $data_pendaftar_fields);
		$data_pendaftar_arr = explode(',', $data_pendaftar_fields);

		$spreadsheet = make_new_spreadsheet();
		$sheet = $spreadsheet->getActiveSheet()->setTitle('Data Pendaftar');
		make_header_cell($sheet, ...$data_pendaftar_arr);
		insert_data_into_spreadsheet($sheet, $data_pendaftar, ...$data_pendaftar_arr);
		save_spreadsheet($spreadsheet, $jalur_pendaftaran);
	}

	public function post_ubah_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$nisn = $this->input->post('hidden-nisn');
		// Cek nilai nisn terdaftar atau tidak
		if (!$this->Daftar_Model->cek_nisn($nisn)) redirect('admin');

		$data_pendaftar = $this->Daftar_Model->get_pendaftar_by_nisn($nisn);

		// Validasi data menggunakan form_validation
		// Data Pribadi
		if ($data_pendaftar['nama_lengkap'] !=  htmlspecialchars($this->input->post('nama_lengkap'), true)) {
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
				'required' => '*{field} harus diisi!'
			]);
			$data_pribadi['nama_lengkap'] = htmlspecialchars($this->input->post('nama_lengkap'), true);
		}
		if ($data_pendaftar['alamat'] !=  htmlspecialchars($this->input->post('alamat'), true)) {
			$this->form_validation->set_rules('alamat', 'Alamat Sesuai KTP', 'required|trim', [
				'required' => '*{field} harus diisi!'
			]);
			$data_pribadi['alamat'] = htmlspecialchars($this->input->post('alamat'), true);
		}
		if ($data_pendaftar['kode_pos'] !=  htmlspecialchars($this->input->post('kode_pos'), true)) {
			$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|regex_match[/^[1-9]\d{4}$/]', [
				'required' => '{field} harus diisi!',
				'regex_match' => '*{field} harus berupa angka dan terdiri dari 5 digit!'
			]);
			$data_pribadi['kode_pos'] = htmlspecialchars($this->input->post('kode_pos'), true);
		}
		if ($data_pendaftar['no_telepon'] !=  htmlspecialchars($this->input->post('no_telepon'), true)) {
			$this->form_validation->set_rules('no_telepon', 'No. Telp/HP', 'required|is_unique[data_pribadi.no_telepon]|min_length[10]|regex_match[/^0\d{9,}$/]', [
				'required' => '*{field} harus diisi!',
				'is_unique' => '*{field} sudah terdaftar!',
				'min_length' => '*{field} minimal terdiri dari 10 angka!',
				'regex_match' => '*{field} harus berupa angka dan dimulai dari angka 0!'
			]);
			$data_pribadi['no_telepon'] = htmlspecialchars($this->input->post('no_telepon'), true);
		}
		if ($data_pendaftar['jenis_kelamin'] !=  $this->input->post('jenis_kelamin')) {
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
				'required' => '*{field} harus diisi!'
			]);
			$data_pribadi['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		}
		if ($data_pendaftar['tinggi_badan'] !=  htmlspecialchars($this->input->post('tinggi_badan'), true)) {
			$this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|trim|numeric', [
				'required' => '*{field} harus diisi!',
				'numeric' => '*{field} harus berupa angka!'
			]);
			$data_pribadi['tinggi_badan'] = htmlspecialchars($this->input->post('tinggi_badan'), true);
		}
		if ($data_pendaftar['berat_badan'] !=  htmlspecialchars($this->input->post('berat_badan'), true)) {
			$this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|trim|numeric', [
				'required' => '*{field} harus diisi!',
				'numeric' => '*{field} harus berupa angka!'
			]);
			$data_pribadi['berat_badan'] = htmlspecialchars($this->input->post('berat_badan'), true);
		}
		if ($data_pendaftar['tempat_lahir'] !=  htmlspecialchars($this->input->post('tempat_lahir'), true)) {
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
				'required' => '*{field} harus diisi!'
			]);
			$data_pribadi['tempat_lahir'] = htmlspecialchars($this->input->post('tempat_lahir'), true);
		}
		if ($data_pendaftar['tanggal_lahir'] !=  $this->input->post('tanggal_lahir')) {
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
				'required' => '*{field} harus diisi!'
			]);
			$data_pribadi['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		}
		if (!empty($_FILES['pas_foto'])) {
			if (empty($_FILES['pas_foto']['name'])) {
				$this->form_validation->set_rules('pas_foto', 'Pas Foto Terbaru', 'required', [
					'required' => '*{field} harus diisi!'
				]);
			}
			$data_pribadi['pas_foto'] = upload_file(
				'pas_foto', // $name_attr
				'uploads/img/pas_foto/', // $upload_path
				'jpg|jpeg|png', // $allowed_types
				"pas_foto_$nisn", // $file_name
			);
		}

		// Data Sekolah
		if ($data_pendaftar['jenis_pendidikan_menengah'] != htmlspecialchars($this->input->post('jenis_pendidikan_menengah'), true)) {
			$this->form_validation->set_rules('jenis_pendidikan_menengah', 'Jenis Pendidikan Menengah', 'required|trim', [
				'required' => '*{field} harus diisi!'
			]);
			$data_sekolah['jenis_pendidikan_menengah'] = htmlspecialchars($this->input->post('jenis_pendidikan_menengah'), true);
		}
		if ($data_pendaftar['jurusan'] != htmlspecialchars($this->input->post('jurusan'), true)) {
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
				'required' => '*{field} harus diisi!'
			]);
			$data_sekolah['jurusan'] = htmlspecialchars($this->input->post('jurusan'), true);
		}
		if ($data_pendaftar['nama_sekolah'] != htmlspecialchars($this->input->post('nama_sekolah'), true)) {
			$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim', [
				'required' => '*{field} harus diisi!'
			]);
			$data_sekolah['nama_sekolah'] = htmlspecialchars($this->input->post('nama_sekolah'), true);
		}
		if ($data_pendaftar['jenis_sekolah'] != $this->input->post('jenis_sekolah')) {
			$this->form_validation->set_rules('jenis_sekolah', 'Jenis Sekolah', 'required', [
				'required' => '*{field} harus diisi!'
			]);
			$data_sekolah['jenis_sekolah'] = $this->input->post('jenis_sekolah');
		}
		if ($data_pendaftar['provinsi_asal_sekolah'] != provinsi_id_to_name($this->input->post('provinsi_asal_sekolah'))) {
			$this->form_validation->set_rules('provinsi_asal_sekolah', 'Provinsi Asal Sekolah', 'required', [
				'required' => '*{field} harus diisi!'
			]);
			$data_sekolah['provinsi_asal_sekolah'] = provinsi_id_to_name($this->input->post('provinsi_asal_sekolah'));
		}
		if ($data_pendaftar['kota_kabupaten_asal_sekolah'] != $this->input->post('kota_kabupaten_asal_sekolah')) {
			$this->form_validation->set_rules('kota_kabupaten_asal_sekolah', 'Kota/Kabupaten Asal Sekolah', 'required', [
				'required' => '*{field} harus diisi!'
			]);
			$data_sekolah['kota_kabupaten_asal_sekolah'] = $this->input->post('kota_kabupaten_asal_sekolah');
		}
		if ($data_pendaftar['akreditasi_sekolah'] != $this->input->post('akreditasi_sekolah')) {
			$this->form_validation->set_rules('akreditasi_sekolah', 'Akreditasi Sekolah', 'required', [
				'required' => '*{field} harus diisi!',
			]);
			$data_sekolah['akreditasi_sekolah'] = $this->input->post('akreditasi_sekolah');
		}
		if ($data_pendaftar['tahun_lulus'] != htmlspecialchars($this->input->post('tahun_lulus'), true)) {
			$this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus/Tamat', 'required|trim|integer', [
				'required' => '*{field} harus diisi!',
				'integer' => '*{field} harus berupa angka!'
			]);
			$data_sekolah['tahun_lulus'] = htmlspecialchars($this->input->post('tahun_lulus'), true);
		}
		if (!empty($_FILES['rekap_nilai_rapot']['name'])) {
			if (empty($_FILES['rekap_nilai_rapot']['name'])) {
				$this->form_validation->set_rules('rekap_nilai_rapot', 'Rekap Nilai Rapot', 'required', [
					'required' => '*{field} harus diisi!'
				]);
			}
			$data_sekolah['rekap_nilai_rapot'] = upload_file(
				'rekap_nilai_rapot', // $name_attr
				'uploads/xlsx/rekap_nilai_rapot/', // $upload_path
				'xls|xlsx', // $allowed_types
				"rekap_nilai_rapot_$nisn", // $file_name
			);
		}
		if ($data_pendaftar['rata_rata_nilai_rapot'] != sprintf('%.0f', htmlspecialchars($this->input->post('rata_rata_nilai_rapot'), true))) {
			$this->form_validation->set_rules('rata_rata_nilai_rapot', 'Rata-Rata Nilai Rapot', 'required|trim|decimal', [
				'required' => '*{field} harus diisi!',
				'decimal' => '*{field} harus berupa angka desimal dengan 1 angka dibelakang koma!'
			]);
			$data_sekolah['rata_rata_nilai_rapot'] = sprintf('%.1f', htmlspecialchars($this->input->post('rata_rata_nilai_rapot'), true));
		}
		for ($i = 1; $i <= 5; $i++) {
			if ($data_pendaftar["peringkat_semester_$i"] != htmlspecialchars($this->input->post("peringkat_semester_$i"), true)) {
				$this->form_validation->set_rules("peringkat_semester_$i", "Peringkat Semester $i", 'required|trim|integer', [
					'required' => '*{field} harus diisi!',
					'integer' => '*{field} harus berupa angka!'
				]);
				$data_sekolah["peringkat_semester_$i"] = htmlspecialchars($this->input->post("peringkat_semester_$i", true));
			}
		}

		// Program Studi
		if (!empty($_FILES['bukti_pembayaran']['name'])) {
			if (empty($_FILES['bukti_pembayaran']['name'])) {
				$this->form_validation->set_rules('bukti_pembayaran', 'Upload Bukti Pembayaran', 'required', [
					'required' => '*{field} harus diisi!'
				]);
			}
			$program_studi['bukti_pembayaran'] = upload_file(
				'bukti_pembayaran', // $name_attr
				'uploads/img/bukti_pembayaran/', // $upload_path
				'jpg|jpeg|png', // $allowed_types
				"bukti_pembayaran_$nisn", // $file_name
			);
		}
		if ($data_pendaftar['program_studi_pilihan_1'] != $this->input->post('program_studi_pilihan_1')) {
			$this->form_validation->set_rules("program_studi_pilihan_1", "Program Studi Pilihan 1", 'required', [
				'required' => '*{field} harus diisi!'
			]);
			$program_studi['program_studi_pilihan_1'] = $this->input->post('program_studi_pilihan_1');
		}
		if ($data_pendaftar['program_studi_pilihan_2'] != $this->input->post('program_studi_pilihan_2')) {
			$program_studi['program_studi_pilihan_2'] = $this->input->post('program_studi_pilihan_2');
		}

		// Data Prestasi
		for ($i = 1; $i <= 5; $i++) {
			if (!empty($_FILES["prestasi_$i"]['name'])) {
				$data_prestasi["prestasi_$i"] = upload_file(
					"prestasi_$i", // $name_attr
					"uploads/pdf/prestasi_$i/", // $upload_path
					'pdf', // $allowed_types
					"prestasi_$i\_$nisn", // $file_name
				);
			}
		}

		if ($data_pendaftar['jalur_pendaftaran'] == 'KTMSE') {
			// Berkas KTMSE/GAKIN
			if (!empty($_FILES['surat_keterangan_miskin']['name'])) {
				if (empty($_FILES['surat_keterangan_miskin']['name'])) {
					$this->form_validation->set_rules('surat_keterangan_miskin', 'Upload Surat Keterangan Miskin', 'required', [
						'required' => '*{field} harus diisi!'
					]);
				}
				$berkas_ktmse_gakin['surat_keterangan_miskin'] = upload_file(
					'surat_keterangan_miskin', // $name_attr
					'uploads/pdf/surat_keterangan_miskin/', // $upload_path
					'pdf', // $allowed_types
					"surat_keterangan_miskin_$nisn", // $file_name
				);
			}
			if (!empty($_FILES['surat_keterangan_penghasilan_keluarga']['name'])) {
				if (empty($_FILES['surat_keterangan_penghasilan_keluarga']['name'])) {
					$this->form_validation->set_rules('surat_keterangan_penghasilan_keluarga', 'Upload Surat Keterangan Penghasilan Keluarga', 'required', [
						'required' => '*{field} harus diisi!'
					]);
				}
				$berkas_ktmse_gakin['surat_keterangan_penghasilan_keluarga'] = upload_file(
					'surat_keterangan_penghasilan_keluarga', // $name_attr
					'uploads/pdf/surat_keterangan_penghasilan_keluarga/', // $upload_path
					'pdf', // $allowed_types
					"surat_keterangan_penghasilan_keluarga_$nisn", // $file_name
				);
			}
			if (!empty($_FILES['foto_rumah']['name'])) {
				if (empty($_FILES['foto_rumah']['name'])) {
					$this->form_validation->set_rules('foto_rumah', 'Upload Foto Rumah', 'required', [
						'required' => '*{field} harus diisi!'
					]);
				}
				$berkas_ktmse_gakin['foto_rumah'] = upload_file(
					'foto_rumah', // $name_attr
					'uploads/pdf/foto_rumah/', // $upload_path
					'pdf', // $allowed_types
					"foto_rumah_$nisn", // $file_name
				);
			}
		}

		// Jika validasi berhasil, data di filter dan disimpan ke database
		if (isset($data_pribadi)) {
			// // Data Pribadi
			$this->Daftar_Model->update_pendaftar_by_nisn('data_pribadi', $data_pribadi, $nisn);
		}
		if (isset($data_sekolah)) {
			// // Data Sekolah
			$this->Daftar_Model->update_pendaftar_by_nisn('data_sekolah', $data_sekolah, $nisn);
		}
		if (isset($program_studi)) {
			// // Program Studi
			$this->Daftar_Model->update_pendaftar_by_nisn('program_studi', $program_studi, $nisn);
		}
		// // Data Prestasi
		if (isset($data_prestasi)) {
			$this->Daftar_Model->update_pendaftar_by_nisn('data_prestasi', $data_prestasi, $nisn);
		}
		if (isset($berkas_ktmse_gakin)) {
			if ($data_pendaftar['jalur_pendaftaran'] == 'KTMSE') {
				// Berkas KTMSE/GAKIN
				$this->Daftar_Model->insert_data('berkas_ktmse_gakin', $berkas_ktmse_gakin, $nisn);
			}
		}
		if (
			isset($data_pribadi) ||
			isset($data_sekolah) ||
			isset($program_studi) ||
			isset($data_prestasi) ||
			isset($berkas_ktmse_gakin)
		) {
			redirect("admin/data-pendaftar/ubah/$nisn");
		}

		// Jika data gagal divalidasi, user dikembalikan ke halaman daftar
		$data = [
			'page_title' => $data_pendaftar['nisn'] . ' - ' . $data_pendaftar['nama_lengkap'],
			'styles' => ['ubah', 'alert'],
			'scripts' => ['form'],
			'data_pendaftar' => $data_pendaftar,
			'kota_kabupaten' => $this->input->post('kota_kabupaten_asal_sekolah')
		];

		$this->load->view('templates/header', $data);
		$this->load->view('ubah-pendaftar');
		$this->load->view('templates/footer');
	}

	public function get_ubah_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$nisn = $this->uri->segment(4);
		// Cek nilai nisn terdaftar atau tidak
		if (!$this->Daftar_Model->cek_nisn($nisn)) redirect('admin');

		$data_pendaftar = $this->Daftar_Model->get_pendaftar_by_nisn($nisn);

		$data = [
			'page_title' => $data_pendaftar['nisn'] . ' - ' . $data_pendaftar['nama_lengkap'],
			'styles' => ['ubah', 'alert'],
			'scripts' => ['form','ubah'],
			'data_pendaftar' => $data_pendaftar
		];

		$this->load->view('templates/header', $data);
		$this->load->view('ubah-pendaftar');
		$this->load->view('templates/footer');
	}

	public function hapus_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$jalur_pendaftaran = $this->uri->segment(3);
		$nisn = $this->uri->segment(5);
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp','ktmse', atau pmdp-ktmse user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse' && $jalur_pendaftaran != 'pmdp-ktmse') redirect('admin');
		// Cek nilai nisn terdaftar atau tidak
		if (!$this->Daftar_Model->cek_nisn($nisn)) redirect('admin');

		[$sort_field, $sort_by] = filter_sort_query('field', 'sort');

		$redirect_path = "admin/data-pendaftar/$jalur_pendaftaran";
		if ($sort_field != 'nisn') $redirect_path .= '?field=' . snake_to_kebab($sort_field);
		$redirect_path .= (($sort_by != 'asc') ? ((($sort_field == 'nisn') ? '?' : '&') . "sort=$sort_by") : '');

		$this->Daftar_Model->delete_pendaftar_by_nisn($nisn);
		redirect($redirect_path);
	}
}
