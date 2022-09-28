<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('Base.php');

class Beranda extends Base
{

  public function __construct()
  {
    parent::__construct();
    $cekUser = $this->isAdminLogin();
    if ($cekUser == false) {
      redirect('');
    }
  }

  public function index()
  {
    $data['judul'] = 'Admin - E-Learning';
    $this->load->view('backend/layout/headerview', $data);
    $this->load->view('backend/layout/sidebarView');
    $this->load->view('backend/indexView', $data);
    $this->load->view('backend/layout/footerView');
  }
}


/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */