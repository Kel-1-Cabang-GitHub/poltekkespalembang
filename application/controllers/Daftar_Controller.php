<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Controller extends CI_Controller
{
    public function pilih_jalur() {
        $this->load->view('index');
    }
    public function form_pendaftaran(){
        $this->load->view('form-pendaftaran');
    }

    public function daftar() {
        // Data Pribadi
        $nama_lengkap = $this->input->post('nama_lengkap');
        $alamat = $this->input->post('alamat');
        $kode_pos = $this->input->post('kode_pos');
        $no_telepon = $this->input->post('no_telepon');
        $nisn = $this->input->post('nisn');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $berat_badan = $this->input->post('berat_badan');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $pas_foto = $this->input->post('pas_foto');

        // Data Sekolah

    }
}
