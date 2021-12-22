<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Model extends CI_Model
{
    public function tambah_data($nama_tabel, $data)
    {
        return $this->db->insert($nama_tabel, $data);
    }
}
