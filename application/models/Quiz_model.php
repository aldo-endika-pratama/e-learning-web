<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Quiz_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function GetAllQuiz()
  {
    $this->db->select('*');
    $this->db->where('is_active', 1);
    $this->db->order_by('quiz_id', 'desc');
    return $this->db->get('quiz_details')->result_array();
  }

  public function GetQuizById($idQuiz)
  {
    $this->db->where('quiz_id', $idQuiz);
    return $this->db->get('quiz_details')->row_array();
  }

  public function UbahQuiz($idQuiz, $data)
  {
    $this->db->where('quiz_id', $idQuiz);
    return $this->db->update('quiz_details', $data);
  }

  public function UpdateCounterQuiz($idQuiz)
  {
    $this->db->set('counter', 'counter + 1', FALSE);
    $this->db->where('quiz_id', $idQuiz);
    return $this->db->update('quiz_details');
  }

  // ------------------------------------------------------------------------

  public function GetAllSoalQuiz()
  {
    $this->db->select('quiz_questions.question, quiz_questions.id, quiz_questions.option1, quiz_questions.option2, quiz_questions.option3, quiz_questions.option4, quiz_questions.answer, quiz_details.quiz_name');
    $this->db->join('quiz_details', 'quiz_details.quiz_id = quiz_questions.quiz_id', 'inner');
    $this->db->where('quiz_questions.is_active', 1);
    $this->db->order_by('quiz_questions.quiz_id', 'desc');
    return $this->db->get('quiz_questions')->result_array();
  }

  public function GetSoalQuizById($idSoal)
  {
    $this->db->where('id', $idSoal);
    return $this->db->get('quiz_questions')->row_array();
  }

  public function UbahSoalQuiz($idSoal, $data)
  {
    $this->db->where('id', $idSoal);
    return $this->db->update('quiz_questions', $data);
  }
}

/* End of file Quiz_model.php */
/* Location: ./application/models/Quiz_model.php */