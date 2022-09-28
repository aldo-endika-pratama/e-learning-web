<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/controllers/Base.php');

class Materi extends Base
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('femateri_model', 'femamo');
        $cekUser = $this->isUserLogin();
        if ($cekUser == false) {
            redirect('');
        }
    }

    public function index()
    {
        $data['judul']    = 'Materi - User E-Learning';

        $this->load->library('pagination');

        // Pagination
        $config['base_url']     = base_url() . '/front/materi/index/';
        $config['total_rows']   = $this->femamo->CountAllMateri();
        $config['per_page']     = 3;

        // $config['full_tag_open']    = '<ul class="pagination pagination-rounded justify-content-end">';
        // $config['full_tag_close']   = '</ul>';

        // $config['first_link']        = 'First';
        // $config['first_tag_open']    = '<li class="page-item">';
        // $config['first_tag_close']   = '</li>';

        // $config['last_link']        = 'Last';
        // $config['last_tag_open']    = '<li class="page-item">';
        // $config['last_tag_close']   = '</li>';

        // $config['next_link']        = '»';
        // $config['next_tag_open']    = '<li class="page-item">';
        // $config['next_tag_close']   = '</li>';

        // $config['prev_link']        = '«';
        // $config['prev_tag_open']    = '<li class="page-item">';
        // $config['prev_tag_close']   = '</li>';

        // $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="javascript: void(0);">';
        // $config['cur_tag_close']   = '</a></li>';

        // $config['num_tag_open']    = '<li class="page-item">';
        // $config['num_tag_close']   = '</li>';

        // $config['attributes']       = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['start']      = $this->uri->segment(4);
        $data['materi']     = $this->femamo->GetMateri($config['per_page'], $data['start']);

        $this->load->view('frontend/layout/headerview', $data);
        $this->load->view('frontend/layout/sidebarView');
        $this->load->view('frontend/materi/indexView', $data);
        $this->load->view('frontend/layout/footerView');
    }

    public function download($kodeMat)
    {
        $materi = $this->db->get_where('materi', ['kode_mat' => $kodeMat])->row_array();
        force_download('assets/uploads/materi/' . $materi['file_mat'], null);
    }

    public function downloadVideo($kodeMat)
    {
        $materi = $this->db->get_where('materi', ['kode_mat' => $kodeMat])->row_array();
        force_download('assets/uploads/video/' . $materi['file_vid'], null);
    }
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */