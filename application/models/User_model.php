<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function GetAllUser()
  {
    return $this->db->get('users')->result_array();
  }

  public function GetUserById($idUser)
  {
    $this->db->where('user_id', $idUser);
    return $this->db->get('users')->row_array();
  }

  public function UbahUser($idUser, $data)
  {
    $this->db->where('user_id', $idUser);
    return $this->db->update('users', $data);
  }
  // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */