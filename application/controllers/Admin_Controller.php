<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	public function __construct()
	{
		@parent::__construct();
		$this->load->helper('admin');
		$this->load->model('Admin_Model');
		$this->load->model('Daftar_Model');
	}

	public function admin()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$data = [
			'page_title' => 'Admin Page - Sipenmaru | POLTEKKES KEMENKES PALEMBANG',
			'styles' => ['index'],
			'scripts' => []
		];

		$this->load->view('templates/header', $data);
		$this->load->view('index-admin');
		$this->load->view('templates/footer');
	}

	public function login()
	{
		if ($this->session->userdata('username')) redirect('admin');

		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);

		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Username belum terdaftar
			if (!$this->Admin_Model->check_username_exists($username)) redirect('admin/login');

			$admin = $this->Admin_Model->get_admin_data($username);

			// Password salah
			if (hash('sha256', $password) != str_replace('\x', '', $admin['password'])) redirect('admin/login');

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
			$this->session->sess_destroy();
			redirect('admin/login');
		}
		redirect('admin');
	}

	public function data_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$jalur_pendaftaran = $this->uri->segment(3);
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp','ktmse', atau pmdp-ktmse user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse' && $jalur_pendaftaran != 'pmdp-ktmse') redirect('admin');

		$sort_field = 'nisn';
		$sort_by = 'asc';

		if ($this->input->get('field')) $sort_field = kebab_to_snake($this->input->get('field'));
		if ($this->input->get('sort')) $sort_by = $this->input->get('sort');

		if (
			$sort_field != 'nama_lengkap' &&
			$sort_field != 'nisn' &&
			$sort_field != 'jenis_kelamin' &&
			$sort_field != 'nama_sekolah' &&
			$sort_field != 'jurusan' &&
			$sort_field != 'jalur_pendaftaran'
		) $sort_field = 'nisn';
		if ($sort_by != 'asc' && $sort_by != 'desc') $sort_by = 'asc';

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

		$sort_field = 'nisn';
		$sort_by = 'asc';

		if ($this->input->get('field')) $sort_field = kebab_to_snake($this->input->get('field'));
		if ($this->input->get('sort')) $sort_by = $this->input->get('sort');

		if (
			$sort_field != 'nama_lengkap' &&
			$sort_field != 'nisn' &&
			$sort_field != 'jenis_kelamin' &&
			$sort_field != 'nama_sekolah' &&
			$sort_field != 'jurusan' &&
			$sort_field != 'jalur_pendaftaran'
		) $sort_field = 'nisn';
		if ($sort_by != 'asc' && $sort_by != 'desc') $sort_by = 'asc';

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

	public function ubah_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$nisn = $this->uri->segment(4);
		// Cek nilai nisn terdaftar atau tidak
		if (!$this->Daftar_Model->cek_nisn($nisn)) redirect('admin');

		$this->load->view('ubah-pendaftar');
	}

	public function hapus_pendaftar()
	{
		// if (!$this->session->userdata('username')) redirect('admin/login');

		$nisn = $this->uri->segment(5);
		$jalur_pendaftaran = $this->uri->segment(3);
		// Cek nilai nisn terdaftar atau tidak
		if (!$this->Daftar_Model->cek_nisn($nisn)) redirect('admin');
		// Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp','ktmse', atau pmdp-ktmse user akan di redirect() ke halaman utama
		if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse' && $jalur_pendaftaran != 'pmdp-ktmse') redirect('admin');

		$sort_field = 'nisn';
		$sort_by = 'asc';

		if ($this->input->get('field')) $sort_field = kebab_to_snake($this->input->get('field'));
		if ($this->input->get('sort')) $sort_by = $this->input->get('sort');

		if (
			$sort_field != 'nama_lengkap' &&
			$sort_field != 'nisn' &&
			$sort_field != 'jenis_kelamin' &&
			$sort_field != 'nama_sekolah' &&
			$sort_field != 'jurusan' &&
			$sort_field != 'jalur_pendaftaran'
		) $sort_field = 'nisn';
		if ($sort_by != 'asc' && $sort_by != 'desc') $sort_by = 'asc';

		$redirect_path = "admin/data-pendaftar/$jalur_pendaftaran";
		if ($sort_field != 'nisn') $redirect_path .= '?field=' . snake_to_kebab($sort_field);
		$redirect_path .= (($sort_by != 'asc') ? ((($sort_field == 'nisn') ? '?' : '&') . "sort=$sort_by") : '');

		$this->Daftar_Model->delete_pendaftar_by_nisn($nisn);
		redirect($redirect_path);
	}
}
