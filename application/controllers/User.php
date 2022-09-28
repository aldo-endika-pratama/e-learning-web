<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('Base.php');

class User extends Base
{

    public function __construct()
    {
        parent::__construct();
        $cekUser = $this->isAdminLogin();
        if ($cekUser == false) {
            redirect('');
        }
        $this->load->model('user_model', 'umo');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['judul']    = 'Admin - User Materi E-Learning';
        $data['user'] = $this->umo->GetallUser();
        $this->load->view('backend/layout/headerview', $data);
        $this->load->view('backend/layout/sidebarView');
        $this->load->view('backend/user/indexView', $data);
        $this->load->view('backend/layout/footerView');
    }

    public function tambah()
    {
        $data['judul']         = 'Tambah User - E-Learning Online';

        // aturan validasi
        $this->form_validation->set_rules('firstName', 'Nama Awal', 'trim|required');
        $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->input->post('role', true)) {
            $this->form_validation->set_rules('role', 'Role Akses', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/user/addView', $data);
            $this->load->view('backend/layout/footerView');
        } else {
            $ceratedDate  = date('Y-m-d H:i:s');
            $firstName    = $this->input->post('firstName', true);
            $lastName     = $this->input->post('lastName', true);
            $gender       = $this->input->post('jenisKelamin', true);
            $username     = $this->input->post('username', true);
            $password     = $this->convert_to_md5($this->input->post('password', true));
            $userRole     = $this->input->post('role', true);

            $data = array(
                'user_name'         => $username,
                'user_password'     => $password,
                'first_name'        => $firstName,
                'last_name'         => $lastName,
                'gender'            => $gender,
                'user_role'         => $userRole,
                'is_active'         => 1,
                'created_date'      => $ceratedDate
            );

            $this->db->insert('users', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Pengguna Berhasil di Tambahkan</div>');
            redirect('user');
        }
    }

    public function ubah($idUser)
    {
        $data['judul']      = 'Tambah User - E-Learning Online';
        $data['user']       = $this->umo->GetUserById($idUser);

        // aturan validasi
        $this->form_validation->set_rules('firstName', 'Nama Awal', 'trim|required');
        $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        if (!$this->input->post('role', true)) {
            $this->form_validation->set_rules('role', 'Role Akses', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/user/editView', $data);
            $this->load->view('backend/layout/footerView');
        } else {
            $firstName    = $this->input->post('firstName', true);
            $lastName     = $this->input->post('lastName', true);
            $gender       = $this->input->post('jenisKelamin', true);
            $username     = $this->input->post('username', true);
            $passwordBaru = $this->input->post('passwordBaru');
            $userRole     = $this->input->post('role', true);

            if ($passwordBaru) {
                $password     = $this->convert_to_md5($this->input->post('passwordBaru', true));
            }

            if ($password) {
                $data = array(
                    'user_name'         => $username,
                    'user_password'     => $password,
                    'first_name'        => $firstName,
                    'last_name'         => $lastName,
                    'gender'            => $gender,
                    'user_role'         => $userRole,
                    'is_active'         => 1
                );
            } else {
                $data = array(
                    'user_name'         => $username,
                    'first_name'        => $firstName,
                    'last_name'         => $lastName,
                    'gender'            => $gender,
                    'user_role'         => $userRole,
                    'is_active'         => 1
                );
            }

            $update = $this->umo->UbahUser($idUser, $data);

            if ($update) {
                $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Pengguna Berhasil di Update</div>');
                redirect('user');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert">Pengguna Tidak Berhasil di Update</div>');
                redirect('user');
            }
        }
    }

    public function hapus($idUser)
    {
        $this->db->where('user_id', $idUser);
        $this->db->delete('users');
        $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Pengguna berhasil di Hapus</div>');
        redirect('user');
    }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */