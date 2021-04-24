<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Pendaftaran');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function getAll()
    {
        return $this->load->view('pendaftaran_berhasil');
    }

    public function index()
    {
        $this->load->view('halaman_pendaftaran');
    }

    public function simpan()
    {
        $this->Model_Pendaftaran->simpan_data();

        redirect('pendaftaran');
    }


    public function validasi()
    {
        $rules = [
            [
                'field' => 'nim',
                'label' => 'NPM',
                'rules' => 'required|is_unique[mahasiswa.nim]'
            ],
            [
                'field' => 'name',
                'label' => 'Nama Mahasiswa',
                'rules' => 'required|is_unique[mahasiswa.name]'
            ], [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[mahasiswa.username]'
            ], [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|is_unique[mahasiswa.email]',
            ], [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ], [
                'field' => 'passconf',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
            ], [
                'field' => 'phone',
                'label' => 'No Hp',
                'rules' => 'required|is_unique[mahasiswa.phone]'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah ada');
        if ($this->form_validation->run() == FALSE) {
            # code...
            $data = [
                'nim' => form_error('nim'),
                'name' => form_error('name'),
                'username' => form_error('username'),
                'email' => form_error('email'),
                'password' => form_error('password'),
                'phone' => form_error('phone'),
            ];

            echo json_encode($data);
        } else {
            $this->Model_Pendaftaran->simpan_data();
            echo json_encode('sukses');
        }
    }
}
