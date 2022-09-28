<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('Base.php');

class Kategori extends Base
{

  public function __construct()
  {
    parent::__construct();
    $cekUser = $this->isAdminLogin();
    if ($cekUser == false) {
      redirect('');
    }
    $this->load->model('materi_model', 'mamo');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['judul']    = 'Admin - Kategori Materi E-Learning';
    $data['kategori'] = $this->mamo->GetAllKategori();
    $this->load->view('backend/layout/headerview', $data);
    $this->load->view('backend/layout/sidebarView');
    $this->load->view('backend/kategori/indexView', $data);
    $this->load->view('backend/layout/footerView');
  }

  public function tambah()
  {
    $data['judul']         = 'Tambah Kategori - E-Learning Online';

    // aturan validasi
    $this->form_validation->set_rules('namaKat', 'Nama Kategori', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('backend/layout/headerview', $data);
      $this->load->view('backend/layout/sidebarView');
      $this->load->view('backend/kategori/addView', $data);
      $this->load->view('backend/layout/footerView');
    } else {
      $ceratedDate  = date('Y-m-d H:i:s');
      $namaKat      = $this->input->post('namaKat', true);
      $isActive     = $this->input->post('isActive', true);

      $data = array(
        'created_date'  => $ceratedDate,
        'nama_kat'      => $namaKat,
        'is_active'     => $isActive
      );

      $this->db->insert('materi_kategori', $data);

      $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Materi Kategori Berhasil di Tambahkan</div>');
      redirect('kategori');
    }
  }

  public function ubah($idKategori)
  {
    $data['judul']      = 'Ubah Kategori - E-Learning Online';
    $data['kategori']   = $this->mamo->GetKategoriById($idKategori);

    // aturan validasi
    $this->form_validation->set_rules('namaKat', 'Nama Kategori', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('backend/layout/headerview', $data);
      $this->load->view('backend/layout/sidebarView');
      $this->load->view('backend/kategori/editView', $data);
      $this->load->view('backend/layout/footerView');
    } else {

      $namaKat      = $this->input->post('namaKat', true);
      $isActive     = $this->input->post('isActive', true);

      $data = array(
        'nama_kat'      => $namaKat,
        'is_active'     => $isActive
      );

      $update = $this->mamo->UbahKategori($idKategori, $data);

      if ($update) {
        $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Materi Kategori Berhasil di Ubah</div>');
        redirect('kategori');
      } else {
        $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert">Materi Kategori Gagal di Ubah</div>');
        redirect('kategori');
      }
    }
  }

  public function hapus($idKategori)
  {
    $this->db->where('id', $idKategori);
    $this->db->delete('materi_kategori');
    $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Materi Kategori Berhasil di Hapus</div>');
    redirect('kategori');
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */