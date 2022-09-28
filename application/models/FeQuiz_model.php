<?php
defined('BASEPATH') or exit('No direct script access allowed');


class FeQuiz_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // Base model
  public function insertRecord($table, $data_ar)
  {
    $this->db->insert($table, $data_ar);
    return $this->db->insert_id();
  }

  public function selectRecord($query)
  {
    $query_res = $this->db->query($query)->result_array();
    return $query_res;
  }


  // Ambil Data Quiz Dahulu

  public function GetQuizAvailable($user)
  {
    $query = "SELECT quiz_name, quiz_duration, quiz_id, end_date, is_active
                FROM quiz_details 
                WHERE CURRENT_DATE() BETWEEN start_date AND end_date AND is_active = TRUE AND show_it = 1 AND counter > 0 
                      AND quiz_id NOT IN 
                      (SELECT quiz_id FROM `quiz_answer` WHERE user_id = $user GROUP BY quiz_id) 
                ORDER BY quiz_id DESC";
    return $this->db->query($query)->result_array();
  }

  public function GetQuizDone($user)
  {
    $query = "SELECT qd.id, qd.id_quiz, qd.total_grade, qd.tgl_kerja, qd.total_jawab, qde.quiz_name
                FROM quiz_done AS qd
                JOIN quiz_details AS qde ON qd.id_quiz = qde.quiz_id
                WHERE qd.id_user = '$user'";
    return $this->db->query($query)->result_array();
  }

  public function GetQuizDoneById($user, $quizid)
  {
    $query = "SELECT qd.id, qd.id_quiz, qd.total_grade, qd.tgl_kerja, qd.total_jawab, qde.quiz_name
                FROM quiz_done AS qd
                JOIN quiz_details AS qde ON qd.id_quiz = qde.quiz_id
                WHERE qd.id_user = '$user' AND qd.id_quiz = '$quizid'";
    return $this->db->query($query)->row_array();
  }

  // Ambil Data Pertanyaan

  public function GetSoalQuiz($quizid)
  {
    $query = "SELECT * FROM quiz_questions WHERE is_active = " . 1 . " and quiz_id = $quizid";
    return $this->db->query($query)->result_array();
  }

  public function GetWaktuQuiz($quizid)
  {
    $query = "SELECT quiz_duration FROM quiz_details WHERE quiz_id = $quizid";
    return $this->db->query($query)->result_array();
  }
}

/* End of file FeQuiz_model.php */
/* Location: ./application/models/FeQuiz_model.php */