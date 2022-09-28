<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('Base.php');

class Quiz extends Base
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
        $data['judul']  = 'Quiz - E-Learning';
        $data['quiz_details']   = $this->qumo->GetAllQuiz();

        $this->load->view('backend/layout/headerview', $data);
        $this->load->view('backend/layout/sidebarView');
        $this->load->view('backend/quiz/indexView', $data);
        $this->load->view('backend/layout/footerView');
    }

    public function tambah()
    {
        $data['judul']        = 'Tambah Quiz - E-Learning';

        // aturan validasi
        $this->form_validation->set_rules('namaQuiz', 'Nama Quiz', 'trim|required');
        $this->form_validation->set_rules('mulaiQuiz', 'Mulai Quiz', 'required');
        $this->form_validation->set_rules('berakhirQuiz', 'Akhir Quiz', 'required');
        if (!$this->input->post('durasiQuiz', true)) {
            $this->form_validation->set_rules('durasiQuiz', 'Durasi Quiz', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/quiz/addView', $data);
            $this->load->view('backend/layout/footerView');
        } else {

            $createdDate    = date('Y-m-d H:i:s');
            $namaQuiz       = $this->input->post('namaQuiz', true);
            $durasiQuiz     = $this->input->post('durasiQuiz', true);
            $mulaiQuiz      = $this->input->post('mulaiQuiz', true);
            $berakhirQuiz   = $this->input->post('berakhirQuiz', true);
            $isShow         = $this->input->post('isShow', true);

            $data = array(
                'quiz_name'     => $namaQuiz,
                'quiz_duration' => $durasiQuiz,
                'start_date'    => $mulaiQuiz,
                'end_date'      => $berakhirQuiz,
                'is_active'     => 1,
                'show_it'       => $isShow,
                'created_date'  => $createdDate,
                'created_by'    => 1
            );

            $this->db->insert('quiz_details', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Quiz Berhasil di Tambahkan</div>');
            redirect('quiz');
        }
    }

    public function ubah($idQuiz)
    {
        $data['judul']  = 'Ubah Quiz - E-Learning';
        $data['quiz']   = $this->qumo->GetQuizById($idQuiz);

        // aturan validasi
        $this->form_validation->set_rules('namaQuiz', 'Nama Quiz', 'trim|required');
        $this->form_validation->set_rules('mulaiQuiz', 'Mulai Quiz', 'required');
        $this->form_validation->set_rules('berakhirQuiz', 'Akhir Quiz', 'required');
        if (!$this->input->post('durasiQuiz', true)) {
            $this->form_validation->set_rules('durasiQuiz', 'Durasi Quiz', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/quiz/editView', $data);
            $this->load->view('backend/layout/footerView');
        } else {

            $lastModified   = date('Y-m-d H:i:s');
            $namaQuiz       = $this->input->post('namaQuiz', true);
            $durasiQuiz     = $this->input->post('durasiQuiz', true);
            $mulaiQuiz      = $this->input->post('mulaiQuiz', true);
            $berakhirQuiz   = $this->input->post('berakhirQuiz', true);
            $isShow         = $this->input->post('isShow', true);

            $data = array(
                'quiz_name'             => $namaQuiz,
                'quiz_duration'         => $durasiQuiz,
                'start_date'            => $mulaiQuiz,
                'end_date'              => $berakhirQuiz,
                'is_active'             => 1,
                'show_it'               => $isShow,
                'last_modified_date'    => $lastModified,
                'last_modified_by'      => 1
            );

            $update = $this->qumo->UbahQuiz($idQuiz, $data);

            if ($update) {
                $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Quiz Berhasil di Ubah</div>');
                redirect('quiz');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert">Quiz Tidak Berhasil di Ubah</div>');
                redirect('quiz');
            }
        }
    }

    public function hapus($idQuiz)
    {
        $this->db->where('quiz_id', $idQuiz);
        $this->db->delete('quiz_details');
        $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Quiz Berhasil di Hapus</div>');
        redirect('quiz');
    }
}
