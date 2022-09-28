<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('Base.php');


class Login extends Base
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'lomo');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('loginView');
        } else {
            // Jika validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username   = $this->input->post('username', true);
        $pass       = $this->input->post('password', true);
        $password   = $this->convert_to_md5($pass);

        $user = $this->db->get_where('users', ['user_name' => $username])->row_array();

        if ($user) {
            //Jika user ada
            if ($password == $user['user_password']) {
                //masukkan session
                $data = [
                    'user_id'       => $user['user_id'],
                    'user_name'     => $user['user_name'],
                    'user_role'     => $user['user_role']
                ];
                $this->session->set_userdata($data);

                // Kondisi Role
                if ($user['user_role'] == 1) {
                    redirect('beranda');
                } else {
                    redirect('front/dashboard');
                }
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Maaf password salah. Periksa kembali !</div>');
                redirect('');
            }
        } else {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Maaf username salah. Periksa kembali !</div>');
            redirect('');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_role');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Anda Berhasil Logout !</div>');
        redirect('');
    }
}
