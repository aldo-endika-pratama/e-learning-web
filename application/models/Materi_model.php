<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Materi_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function GetKodeMateri()
  {
    $this->db->select('RIGHT(materi.kode_mat,4) as kode_materi', FALSE);
    $this->db->order_by('kode_mat', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('materi');

    //cek dulu apakah ada sudah ada kode di tabel. 

    if ($query->num_rows() <> 0) {
      //cek kode jika telah tersedia    
      $data = $query->row();
      $kode = intval($data->kode_materi) + 1;
    } else {
      $kode = 1;  //cek jika kode belum terdapat pada table
    }

    $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
    $kodetampil = "MAT" . $batas;  //format kode
    return $kodetampil;
  }

  // Bagian Kategori 
  public function GetAllKategori()
  {
    $result = $this->db->get('materi_kategori')->result_array();
    return $result;
  }

  public function GetKategoriById($idKate)
  {
    $this->db->where('id', $idKate);
    return $this->db->get('materi_kategori')->row_array();
  }

  public function UbahKategori($idKate, $data)
  {
    $this->db->where('id', $idKate);
    return $this->db->update('materi_kategori', $data);
  }

  // Bagian Materi
  public function GetAllMateri()
  {
    $this->db->select('materi_kategori.nama_kat, materi.*');
    $this->db->join('materi_kategori', 'materi.id_kat = materi_kategori.id', 'left');
    return $query = $this->db->get('materi')->result_array();
  }

  public function GetMateriById($idMateri)
  {
    $this->db->where('id', $idMateri);
    return $this->db->get('materi')->row_array();
  }

  public function UbahMateri($idMateri, $data)
  {
    $this->db->where('id', $idMateri);
    return $this->db->update('materi', $data);
  }
}

/* End of file Materi_model.php */
/* Location: ./application/models/Materi_model.php */