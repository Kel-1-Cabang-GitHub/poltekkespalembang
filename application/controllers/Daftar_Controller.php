<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_Model');
    }

    private function upload_file($name_attr, $upload_path, $allowed_types, $file_name)
    {
        if (!empty($_FILES[$name_attr]['name'])) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = $allowed_types;
            $config['file_name'] = $file_name;
            $config['file_ext_tolower'] = true;
            $config['overwrite'] = true;
            $config['max_size'] = 5000;

            $this->upload->initialize($config);
            if ($this->upload->do_upload($name_attr)) {
                return $this->upload->data('file_name');
            }
        }
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
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim|regex_match[/^[1-9]\d{4}$/]', [
            'required' => '{field} harus diisi!',
            'regex_match' => '{field} harus berupa angka dan terdiri dari 5 digit!'
        ]);
        $this->form_validation->set_rules('nisn', 'Nomor Induk Siswa Nasional (NISN)', 'required|trim|is_unique[data_pribadi.nisn]', [
            'required' => '{field} harus diisi!',
            'is_unique' => '{field} sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('no_telepon', 'No. Telp/HP', 'required|trim|is_unique[data_pribadi.no_telepon]|regex_match[/^0\d{9,}$/]', [
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
        $this->form_validation->set_rules('provinsi_asal_sekolah', 'Provinsi Asal Sekolah', 'required|trim', [
            'required' => '{field} harus diisi!'
        ]);
        $this->form_validation->set_rules('kota_kabupaten_asal_sekolah', 'Kota/Kabupaten Asal Sekolah', 'required|trim', [
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

        if ($this->form_validation->run() == true) {
            // Jika data berhasil divalidasi, data dimasukkan ke database
            // Data Pribadi
            $nama_lengkap = $this->input->post('nama_lengkap');
            $alamat = $this->input->post('alamat');
            $kode_pos = $this->input->post('kode_pos');
            $nisn = $this->input->post('nisn');
            $no_telepon = $this->input->post('no_telepon');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tinggi_badan = $this->input->post('tinggi_badan');
            $berat_badan = $this->input->post('berat_badan');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');

            // Pas Foto
            $pas_foto = $this->upload_file(
                'pas_foto', // $name_attr
                'uploads/img/pas_foto/', // $upload_path
                'jpg|png|jpeg', // $allowed_types
                'pas_foto_' . $nisn, // $file_name
            );

            // Data Sekolah
            $jenis_pendidikan_menengah = $this->input->post('jenis_pendidikan_menengah');
            $jurusan = $this->input->post('jurusan');
            $nama_sekolah = $this->input->post('nama_sekolah');
            $jenis_sekolah = $this->input->post('jenis_sekolah');
            $provinsi_asal_sekolah = $this->input->post('provinsi_asal_sekolah');
            $kota_kabupaten_asal_sekolah = $this->input->post('kota_kabupaten_asal_sekolah');
            $akreditasi_sekolah = $this->input->post('akreditasi_sekolah');
            $tahun_lulus = $this->input->post('tahun_lulus');
            $rata_rata_nilai_rapot = $this->input->post('rata_rata_nilai_rapot');
            // Peringkat
            $semester_1 = $this->input->post('semester_1');
            $semester_2 = $this->input->post('semester_2');
            $semester_3 = $this->input->post('semester_3');
            $semester_4 = $this->input->post('semester_4');
            $semester_5 = $this->input->post('semester_5');

            // Rekap Nilai Rapot
            $rekap_nilai_rapot = $this->upload_file(
                'rekap_nilai_rapot', // $name_attr
                'uploads/pdf/rekap_nilai_rapot/', // $upload_path
                'pdf', // $allowed_types
                'rekap_nilai_rapot_' . $nisn, // $file_name
            );

            $data_pribadi = [
                'nama_lengkap' => htmlspecialchars($nama_lengkap, true),
                'alamat' => htmlspecialchars($alamat, true),
                'kode_pos' => htmlspecialchars($kode_pos, true),
                'nisn' => htmlspecialchars($nisn, true),
                'no_telepon' => htmlspecialchars($no_telepon, true),
                'jenis_kelamin' => $jenis_kelamin,
                'tinggi_badan' => htmlspecialchars($tinggi_badan, true),
                'berat_badan' => htmlspecialchars($berat_badan, true),
                'tempat_lahir' => htmlspecialchars($tempat_lahir, true),
                'tanggal_lahir' => $tanggal_lahir,
                'pas_foto' => $pas_foto,
                'jalur_pendaftaran' => $jalur_pendaftaran
            ];

            $data_sekolah = [
                'jenis_pendidikan_menengah' => htmlspecialchars($jenis_pendidikan_menengah, true),
                'jurusan' => htmlspecialchars($jurusan, true),
                'nama_sekolah' => htmlspecialchars($nama_sekolah, true),
                'jenis_sekolah' => $jenis_sekolah,
                'provinsi_asal_sekolah' => $provinsi_asal_sekolah,
                'kota_kabupaten_asal_sekolah' => $kota_kabupaten_asal_sekolah,
                'akreditasi_sekolah' => $akreditasi_sekolah,
                'tahun_lulus' => htmlspecialchars($tahun_lulus, true),
                'rekap_nilai_rapot' => $rekap_nilai_rapot,
                'rata_rata_nilai_rapot' => htmlspecialchars($rata_rata_nilai_rapot, true),
                'nisn' => $nisn
            ];

            $data_peringkat = [
                'nisn' => $nisn,
                'semester_1' => htmlspecialchars($semester_1, true),
                'semester_2' => htmlspecialchars($semester_2, true),
                'semester_3' => htmlspecialchars($semester_3, true),
                'semester_4' => htmlspecialchars($semester_4, true),
                'semester_5' => htmlspecialchars($semester_5, true)
            ];

            // Data Pribadi
            $this->Daftar_Model->tambah_data('data_pribadi', $data_pribadi);
            // Data Sekolah
            $this->Daftar_Model->tambah_data('data_sekolah', $data_sekolah);
            // Data Peringkat
            $this->Daftar_Model->tambah_data('peringkat', $data_peringkat);

            redirect();
        }

        // Jika data gagal divalidasi, user dikembalikan ke halaman daftar
        $this->load->view('form-pendaftaran');
    }

    public function form_pendaftaran_lanjut()
    {
        $jalur_pendaftaran = $this->input->get('jalur');
        // Cek nilai $jalur_pendaftaran dan jika nilainya bukan 'pmdp' atau 'ktmse', user akan di redirect() ke halaman utama
        if ($jalur_pendaftaran != 'pmdp' && $jalur_pendaftaran != 'ktmse') {
            redirect();
        }

        // Validasi data menggunakan form_validation
        // Program Studi
        if (empty($_FILES['bukti_pembayaran']['name'])) {
            $this->form_validation->set_rules('bukti_pembayaran', 'Bukti Pembayaran', 'required');
        }
        $this->form_validation->set_rules('pilihan_1', 'Program Studi Pilihan 1', 'required', [
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('pilihan_2', 'Program Studi Pilihan 2', 'required', [
            'required' => '{field} harus diisi'
        ]);

        // Data Prestasi

        if ($this->form_validation->run() == true) {
            // Jika data berhasil divalidasi, data dimasukkan ke database
            // Program Studi
            // $bukti_pembayaran = $this->upload_file(
            //     'bukti_pembayaran', // $name_attr
            //     'uploads/img/bukti_pembayaran/', // $upload_path
            //     'jpg|png|jpeg', // $allowed_types
            //     'bukti_pembayaran_' . $nisn, // $file_name
            // );
            $pilihan_1 = $this->input->post('pilihan_1');
            $pilihan_2 = $this->input->post('pilihan_2');

            // Data Prestasi

            $program_studi = [
                // 'bukti_pembayaran' => $bukti_pembayaran,
                'pilihan_1' => $pilihan_1,
                'pilihan_2' => $pilihan_2,
            ];

            $data_prestasi = [];

            // Program Studi
            // $this->Daftar_Model->tambah_data();
            // Data Prestasi
            // $this->Daftar_Model->tambah_data();

            redirect();
        }

        // Jika data gagal divalidasi, user dikembalikan ke halaman daftar
        $this->load->view('form-pendaftaran-lanjut');
    }

}
