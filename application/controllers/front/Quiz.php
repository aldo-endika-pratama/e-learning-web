<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/controllers/Base.php');

class Quiz extends Base
{

    public function __construct()
    {
        parent::__construct();
        $cekUser = $this->isUserLogin();
        if ($cekUser == false) {
            redirect('');
        }
        $this->load->model('fequiz_model', 'fequmo');
        date_default_timezone_set('Asia/jakarta');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['judul']          = 'User - Quiz Materi E-Learning';
        $data['quizAvai']       = $this->fequmo->GetQuizAvailable($user_id);
        $data['quizDone']       = $this->fequmo->GetQuizDone($user_id);

        $this->load->view('frontend/layout/headerview', $data);
        $this->load->view('frontend/layout/sidebarView');
        $this->load->view('frontend/quiz/indexView', $data);
        $this->load->view('frontend/layout/footerView');
    }

    public function handleError($heading, $message)
    {
        $data['heading']    = $heading;
        $data['message']    = $message;
        $this->load->view('errors/html/error_404', $data);
    }

    public function mulaiQuiz()
    {
        $user_id = $this->session->userdata('user_id');
        $quizid = $this->input->post('idQuiz', true);

        if ($quizid) {
            $refresh_select_users = "select * from users where is_active = " . 1 . " and user_id = '$user_id'";
            $query_res = $this->db->query($refresh_select_users);

            $res = $query_res->row();

            // $row = $res->is_refresh;

            // if ($row == 1) {
            //     redirect('save-answer');
            // } else {

            $data['judul']          = 'User - Mulai Quiz Materi E-Learning';
            $data['question']       = $this->fequmo->GetSoalQuiz($quizid);
            $data['time']           = $this->fequmo->GetWaktuQuiz($quizid);

            $this->load->view('frontend/layout/headerview', $data);
            $this->load->view('frontend/quiz/mulaiView', $data);
            $this->load->view('frontend/layout/footerView', $data);
        } else {
            $this->handleError('Ooppss 404 Not Found', 'Akses Tidak Di Perbolehkan !');
        }
    }

    public function submitQuiz()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $user_id = $this->session->userdata('user_id');
            $quiz_id = $this->input->post('quizid', true);
            $select_query = "select * from quiz_questions where quiz_id = $quiz_id";
            $quiz_question = $this->db->query($select_query)->result_array();

            $jumlahJawab = 0;
            $jumlahBenar = 0;

            foreach ($quiz_question as $row) {
                $correct = 0;
                // Ambil Jawaban setiap pertanyaan
                $jawaban = $this->input->post('question_' . $row['id'], true);

                if ($jawaban) {
                    if ($jawaban == $row['answer']) {
                        $correct = 1;
                        $jumlahBenar += 1;
                    } else {
                        $correct = 0;
                    }
                    $jumlahJawab += 1;
                }

                // Input ke tabel answer
                $this->fequmo->insertRecord('quiz_answer', array('user_id' => $user_id, 'quiz_id' => $quiz_id, 'question_id' => $row['id'], 'answer' => $jawaban, 'is_correct' => $correct));
            }

            $grade = ($jumlahBenar / $jumlahJawab) * 100;

            // Cek Dahulu Di Tabel Quiz Done
            $quizDone = $this->fequmo->GetQuizDoneById($user_id, $quiz_id);
            if ($quizDone) {
                // Update Datanya Ke Dalam Tabel Quiz Done
                $data = [
                    'tgl_kerja'     => date('Y-m-d H:i:s'),
                    'total_jawab'   => $quizDone['total_jawab'] + 1,
                    'total_grade'   => $grade
                ];
                $this->db->where('id', $quizDone['id']);
                $this->db->update('quiz_done', $data);
            } else {
                // Insert Ke dalam Tabel Quiz Done  
                $data = [
                    'id_user'       => $user_id,
                    'id_quiz'       => $quiz_id,
                    'total_jawab'   => 1,
                    'total_grade'   => $grade
                ];
                $this->db->insert('quiz_done', $data);
            }

            $data['nilaiQuiz']      = $grade;
            $data['jumlahJawab']    = $jumlahJawab;
            $data['jumlahBenar']    = $jumlahBenar;
            $data['judul']          = 'Hasil Quiz - Quiz Materi E-Learning';

            $this->load->view('frontend/layout/headerview', $data);
            $this->load->view('frontend/layout/sidebarView');
            $this->load->view('frontend/quiz/hasilView', $data);
            $this->load->view('frontend/layout/footerView');
        }
    }
}
