<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model FeMateri_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class FeMateri_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // Bagian Materi

  public function CountAllMateri()
  {
    return $this->db->get('materi')->num_rows();
  }

  public function GetAllMateri()
  {
    return $this->db->get('materi')->result_array();
  }

  public function GetMateri($limit, $start)
  {
    $this->db->select('materi_kategori.nama_kat, materi.*');
    $this->db->join('materi_kategori', 'materi.id_kat = materi_kategori.id', 'left');
    $this->db->where('status', '1');
    return $query = $this->db->get('materi', $limit, $start)->result_array();
  }
}

/* End of file FeMateri_model.php */
/* Location: ./application/models/FeMateri_model.php */