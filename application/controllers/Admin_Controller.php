<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('admin');
		$this->load->model('Admin_Model');
		$this->load->model('Daftar_Model');
	}

	public function login()
	{
		if ($this->session->userdata('username')) redirect();

		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => '*{field} harus diisi!'
		]);

		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$admin = $this->Admin_Model->get_admin_data($username);

			// Username belum terdaftar
			if (!$admin) redirect('login');
			// Password salah
			if (hash('sha256', $password) != str_replace('\x', '', $admin['password'])) redirect('login');

			$data = [
				'username' => $admin['username'],
				'role' => $admin['role']
			];

			$this->session->set_userdata($data);

			redirect('data-pendaftar');
		}

		$this->load->view('login-admin');
	}

	public function logout()
	{
		if ($this->session->userdata('username')) {
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();
			redirect('login');
		}
		redirect();
	}

	public function profile()
	{
		// if (!$this->session->userdata('username')) redirect();

		// $data['user'] = $this->Admin_Model->get_user_data($this->session->userdata('username'));

		// $this->load->view('profile', $data);
	}

	public function update_profile()
	{
		// if ($this->session->userdata('username')) redirect();

		// $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
		// 	'required' => '{field} harus diisi!',
		// 	'is_unique' => '{field} sudah terdaftar!'
		// ]);
		// $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required|trim', [
		// 	'required' => '{field} harus diisi!'
		// ]);

		// if ($this->form_validation->run() == false) redirect('profile');

		// $user = $this->Admin_Model->get_user_data($this->session->userdata('username'));
		// $username = $this->input->post('username');
		// $full_name = $this->input->post('full_name');
		// $image = $user['image'];

		// $profile_image = $_FILES['profile_image']['name'];

		// if ($profile_image) {
		// 	$config['upload_path'] = 'uploads/img/profile/';
		// 	$config['allowed_types'] = 'jpg|jpeg|png';
		// 	$config['file_name'] = "profile_$username";
		// 	$config['file_ext_tolower'] = true;
		// 	$config['overwrite'] = true;
		// 	$config['max_size'] = 5000;

		// 	$this->upload->initialize($config);

		// 	if ($this->upload->do_upload('profile_image')) {
		// 		$old_profile_image = $user['image'];

		// 		if ($old_profile_image != 'default.jpg') {
		// 			unlink(FCPATH . 'uploads/img/profile/' . $old_profile_image);
		// 		}

		// 		$new_profile_image = $this->upload->data('file_name');
		// 		$image = $new_profile_image;
		// 	}

		// 	$data = [
		// 		'username' => $username,
		// 		'fullname' => $full_name,
		// 		'image' => $image,
		// 		'updated_at' => time()
		// 	];

		// 	$this->Admin_Model->update_profile($this->session->userdata('username'), $data);

		// 	redirect('profile');
		// }
	}

	public function change_password()
	{
		// if (!$this->session->userdata('username')) redirect();

		// $this->form_validation->set_rules('old_password', 'Password Lama', 'required|trim', [
		// 	'required' => '{field} harus diisi!'
		// ]);
		// $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]', [
		// 	'required' => '{field} harus diisi!',
		// 	'min_length' => '{field} minimal {param} karakter!',
		// 	'matches' => '{field} tidak cocok!'
		// ]);
		// $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|matches[new_password]', [
		// 	'required' => '{field} harus diisi!',
		// 	'min_length' => '{field} tidak cocok!'
		// ]);

		// if ($this->form_validation->run() == false) redirect('profile');

		// $user = $this->Admin_Model->get_user_data($this->session->userdata('username'));
		// $old_password = $this->input->post('old_password');
		// $new_password = $this->input->post('new_password');

		// // Inputan password lama tidak sama dengan password yang ada di database
		// if (!password_verify($old_password, $user['password'])) redirect('profile');
		// // Password baru sama dengan password lama yang diinputkan
		// if ($old_password == $new_password) redirect('profile');
		// // Password baru sama dengan password lama yang ada di database
		// if (!password_verify($new_password, $user['password'])) redirect('profile');

		// $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

		// $this->Admin_Model->change_password($this->session->userdata('username'), $hashed_password);

		// redirect('profile');
	}

	public function data_pendaftar()
	{
		if (!$this->session->userdata('username')) redirect();

		$data = [
			'data_pribadi' => $this->Daftar_Model->get_all_data('data_pribadi'),
			'data_sekolah' => $this->Daftar_Model->get_all_data('data_sekolah'),
			'program_studi' => $this->Daftar_Model->get_all_data('program_studi'),
			'data_prestasi' => $this->Daftar_Model->get_all_data('data_prestasi'),
		];

		$this->load->view('data-pendaftar', $data);
	}

	public function export_to_excel()
	{
		// if (!$this->session->userdata('username')) redirect();

		$data_pribadi_columns = [
			'nama_lengkap', 'alamat', 'kode_pos', 'nisn',
			'no_telepon', 'jenis_kelamin', 'tinggi_badan', 'berat_badan',
			'tempat_lahir', 'tanggal_lahir', 'pas_foto', 'jalur_pendaftaran'
		];
		$data_sekolah_columns = [
			'nisn', 'jenis_pendidikan_menengah', 'jurusan', 'nama_sekolah',
			'jenis_sekolah', 'provinsi_asal_sekolah', 'kota_kabupaten_asal_sekolah',
			'akreditasi_sekolah', 'tahun_lulus', 'rekap_nilai_rapot', 'rata_rata_nilai_rapot',
		];
		for ($i = 1; $i <= 5; $i++) {
			array_push($data_sekolah_columns, "peringkat_semester_$i");
		}
		$program_studi_columns = ['nisn', 'bukti_pembayaran', 'program_studi_pilihan_1', 'program_studi_pilihan_2'];
		$data_prestasi_columns = ['nisn'];
		for ($i = 1; $i <= 5; $i++) {
			array_push($data_prestasi_columns, "prestasi_$i");
		}

		$all_data_pribadi = $this->Daftar_Model->get_all_data('data_pribadi');
		$all_data_sekolah = $this->Daftar_Model->get_all_data('data_sekolah');
		$all_program_studi = $this->Daftar_Model->get_all_data('program_studi');
		$all_data_prestasi = $this->Daftar_Model->get_all_data('data_prestasi');

		$spreadsheet = make_new_spreadsheet();

		$data_pribadi_sheet = $spreadsheet->getActiveSheet()->setTitle('Data Pribadi');
		$data_sekolah_sheet = create_new_sheet($spreadsheet, 'Data Sekolah');
		$program_studi_sheet = create_new_sheet($spreadsheet, 'Program Studi');
		$data_prestasi_sheet = create_new_sheet($spreadsheet, 'Data Prestasi');

		make_header_cell($data_pribadi_sheet, ...$data_pribadi_columns);
		make_header_cell($data_sekolah_sheet, ...$data_sekolah_columns);
		make_header_cell($program_studi_sheet, ...$program_studi_columns);
		make_header_cell($data_prestasi_sheet, ...$data_prestasi_columns);

		insert_data_into_spreadsheet($data_pribadi_sheet, $all_data_pribadi, ...$data_pribadi_columns);
		insert_data_into_spreadsheet($data_sekolah_sheet, $all_data_sekolah, ...$data_sekolah_columns);
		insert_data_into_spreadsheet($program_studi_sheet, $all_program_studi, ...$program_studi_columns);
		insert_data_into_spreadsheet($data_prestasi_sheet, $all_data_prestasi, ...$data_prestasi_columns);

		save_spreadsheet($spreadsheet);
	}
}
