<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Model_Pendaftaran extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('mahasiswa');
    }

    public function simpan_data()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'phone' => $this->input->post('phone'),
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
