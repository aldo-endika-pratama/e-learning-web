<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Base extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function convert_to_md5($string)
  {
    return md5($string);
  }

  public function isAdminLogin()
  {
    if (!empty($this->session->userdata('user_id'))) {
      if ($this->session->userdata('user_role') == 1) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function isUserLogin()
  {
    if (!empty($this->session->userdata('user_id'))) {
      if ($this->session->userdata('user_role') == 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}


/* End of file Base.php */
/* Location: ./application/controllers/Base.php */