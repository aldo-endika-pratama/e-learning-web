<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('Base.php');

class Soal extends Base
{

    public function __construct()
    {
        parent::__construct();
        $cekUser = $this->isAdminLogin();
        if ($cekUser == false) {
            redirect('');
        }
        $this->load->model('Quiz_model', 'qumo');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/jakarta');
    }

    public function index()
    {
        $data['judul']            = 'Soal Quiz - E-Learning';
        $data['quiz_questions']   = $this->qumo->GetAllSoalQuiz();

        $this->load->view('backend/layout/headerview', $data);
        $this->load->view('backend/layout/sidebarView');
        $this->load->view('backend/soal/indexView', $data);
        $this->load->view('backend/layout/footerView');
    }

    public function tambah()
    {
        $data['judul']        = 'Tambah Soal Quiz - E-Learning';
        $data['quiz']         = $this->qumo->GetAllQuiz();

        // aturan validasi
        $this->form_validation->set_rules('soalQuiz', 'Mulai Quiz', 'trim|required');
        $this->form_validation->set_rules('option1', 'Option1', 'trim|required');
        $this->form_validation->set_rules('option2', 'Option2', 'trim|required');
        $this->form_validation->set_rules('option3', 'Option3', 'trim|required');
        $this->form_validation->set_rules('option4', 'Option4', 'trim|required');
        $this->form_validation->set_rules('jawaban', 'Jawaban Soal', 'trim|required');
        if (!$this->input->post('quiz', true)) {
            $this->form_validation->set_rules('quiz', 'Nama Quiz', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/soal/addView', $data);
            $this->load->view('backend/layout/footerView');
        } else {

            $createdDate    = date('Y-m-d H:i:s');
            $quiz           = $this->input->post('quiz', true);
            $soal           = $this->input->post('soalQuiz', true);
            $option1        = $this->input->post('option1', true);
            $option2        = $this->input->post('option2', true);
            $option3        = $this->input->post('option3', true);
            $option4        = $this->input->post('option4', true);
            $jawaban        = $this->input->post('jawaban', true);

            $data = array(
                'quiz_id'       => $quiz,
                'question'      => $soal,
                'option1'       => $option1,
                'option2'       => $option2,
                'option3'       => $option3,
                'option4'       => $option4,
                'answer'        => $jawaban,
                'is_active'     => 1,
                'created_date'  => $createdDate,
                'created_by'    => 1
            );

            $insert = $this->db->insert('quiz_questions', $data);

            if ($insert) {
                $updateCounter = $this->qumo->UpdateCounterQuiz($quiz);
                if ($updateCounter) {
                    $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Soal Quiz Berhasil di Tambahkan</div>');
                    redirect('soal');
                } else {
                    $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert">Soal Quiz Tidak Berhasil di Tambahkan</div>');
                    redirect('soal');
                }
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert">Soal Quiz Tidak Berhasil di Tambahkan</div>');
                redirect('soal');
            }
        }
    }

    public function ubah($idSoal)
    {
        $data['judul']        = 'Ubah Soal Quiz - E-Learning';
        $data['quiz']         = $this->qumo->GetAllQuiz();
        $data['soal']         = $this->qumo->GetSoalQuizById($idSoal);

        // aturan validasi
        $this->form_validation->set_rules('soalQuiz', 'Mulai Quiz', 'trim|required');
        $this->form_validation->set_rules('option1', 'Option1', 'trim|required');
        $this->form_validation->set_rules('option2', 'Option2', 'trim|required');
        $this->form_validation->set_rules('option3', 'Option3', 'trim|required');
        $this->form_validation->set_rules('option4', 'Option4', 'trim|required');
        $this->form_validation->set_rules('jawaban', 'Jawaban Soal', 'trim|required');
        if (!$this->input->post('quiz', true)) {
            $this->form_validation->set_rules('quiz', 'Nama Quiz', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/soal/editView', $data);
            $this->load->view('backend/layout/footerView');
        } else {

            $quiz           = $this->input->post('quiz', true);
            $soal           = $this->input->post('soalQuiz', true);
            $option1        = $this->input->post('option1', true);
            $option2        = $this->input->post('option2', true);
            $option3        = $this->input->post('option3', true);
            $option4        = $this->input->post('option4', true);
            $jawaban        = $this->input->post('jawaban', true);

            $data = array(
                'quiz_id'       => $quiz,
                'question'      => $soal,
                'option1'       => $option1,
                'option2'       => $option2,
                'option3'       => $option3,
                'option4'       => $option4,
                'answer'        => $jawaban
            );

            $update = $this->qumo->UbahSoalQuiz($idSoal, $data);

            if ($update) {
                $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Soal Quiz Berhasil di Ubah</div>');
                redirect('soal');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert">Soal Quiz Tidak Berhasil di Ubah</div>');
                redirect('soal');
            }
        }
    }

    public function hapus($idSoal)
    {
        $this->db->where('id', $idSoal);
        $this->db->delete('quiz_questions');
        $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Soal Quiz Berhasil di Hapus</div>');
        redirect('soal');
    }
}


/* End of file Soal.php */
/* Location: ./application/controllers/Soal.php */