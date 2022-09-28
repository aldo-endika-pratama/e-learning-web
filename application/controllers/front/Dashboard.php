<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/controllers/Base.php');

class Dashboard extends Base
{

  public function __construct()
  {
    parent::__construct();
    $cekUser = $this->isUserLogin();
    if ($cekUser == false) {
      redirect('');
    }
    $this->load->model('fequiz_model', 'fequmo');
  }

  public function index()
  {
    $user_id = $this->session->userdata('user_id');
    $data['judul']    = 'User - Dashboard Materi E-Learning';
    $data['quizAvai']       = $this->fequmo->GetQuizAvailable($user_id);
    $data['quizDone']       = $this->fequmo->GetQuizDone($user_id);

    $this->load->view('frontend/layout/headerview', $data);
    $this->load->view('frontend/layout/sidebarView');
    $this->load->view('frontend/indexView', $data);
    $this->load->view('frontend/layout/footerView');
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


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */