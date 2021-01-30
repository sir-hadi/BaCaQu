<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSantri');
    }

    public function index() {
        $this->load->view('templates/header-dashboard');
        // $this->load->view('dashboardUstad');
        $this->load->view('templates/footer');
    }

    public function set_santri()
    {
        $data_santri = array(
            'id_santri' => $this->input->post('id', true),
            'id_ustadz' => 'empty';
            'nama' => $this->input->post('nama', true),
            'level' => 1,
            'telepon' => $this->input->post('telepon', true)
        );
        $cek = $this->ModelSantri->daftar($data_santri);

        if ($cek) {
            $this->session->set_flashdata('setting_profil', 'sukses');
        } else {
            $this->session->set_flashdata('setting_profil', 'gagal');
        }
        redirect('santri', 'refresh');
    }
}