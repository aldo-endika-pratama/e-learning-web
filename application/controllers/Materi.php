<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('Base.php');

class Materi extends Base
{

    public function __construct()
    {
        parent::__construct();
        $cekUser = $this->isAdminLogin();
        if ($cekUser == false) {
            redirect('');
        }
        $this->load->model('Materi_model', 'mamo');
        $this->load->library('form_validation');
        $this->load->library('upload');
        date_default_timezone_set('Asia/jakarta');
    }

    public function configUpload($path, $filename)
    {
        // Config untuk upload filenya
        $config['upload_path']          = $path;
        $config['file_name']            = $filename;
        $config['allowed_types']        = 'pdf|jpg|png|jpeg|pptx|ppt|mp4|3gp|flv|mkv|avi';
        $config['max_size']             = 400000;
        $this->upload->initialize($config);
    }

    public function index()
    {
        $data['judul'] = 'Admin - Materi E-Learning';
        $data['materi'] = $this->mamo->GetAllMateri();

        $this->load->view('backend/layout/headerview', $data);
        $this->load->view('backend/layout/sidebarView');
        $this->load->view('backend/materi/indexView', $data);
        $this->load->view('backend/layout/footerView');
    }

    public function tambah()
    {
        $data['judul']        = 'Tambah Materi - Materi E-Learning';
        $data['kategori']     = $this->mamo->GetAllKategori();

        // aturan validasi
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('judul', 'Judul Materi', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Materi', 'trim|required');
        if (empty($_FILES['fileMateri']['name'])) {
            $this->form_validation->set_rules('fileMateri', 'File Materi', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/materi/addView', $data);
            $this->load->view('backend/layout/footerView');
        } else {
            $kodeMat      = $this->mamo->GetKodeMateri();
            $ceratedDate  = date('Y-m-d H:i:s');
            $kategori     = $this->input->post('kategori', true);
            $judul        = $this->input->post('judul', true);
            $deskripsi    = $this->input->post('deskripsi', true);
            $fotoSampul   = $_FILES['foto']['name'];
            $fileMateri   = $_FILES['fileMateri']['name'];
            $fileVideo    = $_FILES['video']['name'];
            $isActive     = $this->input->post('isActive', true);
            $isPublish    = $this->input->post('isPublish', true);

            // Do Upload File
            $uploadFoto   = $this->uploadFoto($fotoSampul, $kodeMat);
            $uploadFile   = $this->uploadFile($fileMateri, $kodeMat);
            $uploadVideo  = $this->uploadVideo($fileVideo, $kodeMat);

            $data = array(
                'created_date'  => $ceratedDate,
                'kode_mat'      => $kodeMat,
                'id_kat'        => $kategori,
                'nama_mat'      => $judul,
                'desk_mat'      => $deskripsi,
                'is_active'     => $isActive,
                'status'        => $isPublish,
                'foto_sampul'   => $uploadFoto,
                'file_mat'      => $uploadFile,
                'file_vid'      => $uploadVideo
            );

            $this->db->insert('materi', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Materi Berhasil di Tambahkan</div>');
            redirect('materi');
        }
    }

    public function ubah($idMateri)
    {
        $data['judul']        = 'Ubah Materi - Materi E-Learning';
        $data['kategori']     = $this->mamo->GetAllKategori();
        $data['materi']       = $this->mamo->GetMateriById($idMateri);

        // aturan validasi
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('judul', 'Judul Materi', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Materi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/layout/headerview', $data);
            $this->load->view('backend/layout/sidebarView');
            $this->load->view('backend/materi/editView', $data);
            $this->load->view('backend/layout/footerView');
        } else {
            $kodeMat      = $data['materi']['kode_mat'];
            $kategori     = $this->input->post('kategori', true);
            $judul        = $this->input->post('judul', true);
            $deskripsi    = $this->input->post('deskripsi', true);
            $fotoSampul   = $_FILES['foto']['name'];
            $fileMateri   = $_FILES['fileMateri']['name'];
            $fileVideo    = $_FILES['video']['name'];
            $isActive     = $this->input->post('isActive', true);
            $isPublish    = $this->input->post('isPublish', true);

            $uploadFoto = '';
            if ($fotoSampul) {
                $uploadFoto   = $this->uploadFoto($fotoSampul, $kodeMat);
            } else {
                $uploadFoto = $data['materi']['foto_sampul'];
            }

            $uploadFile = '';
            if ($fileMateri) {
                $uploadFile   = $this->uploadFile($fileMateri, $kodeMat);
            } else {
                $uploadFile = $data['materi']['file_mat'];
            }

            $uploadVideo = '';
            if ($fileVideo) {
                $uploadVideo = $this->uploadVideo($fileVideo, $kodeMat);
            } else {
                $uploadVideo = $data['materi']['file_vid'];
            }

            $data = array(
                'id_kat'        => $kategori,
                'nama_mat'      => $judul,
                'desk_mat'      => $deskripsi,
                'is_active'     => $isActive,
                'status'        => $isPublish,
                'foto_sampul'   => $uploadFoto,
                'file_mat'      => $uploadFile,
                'file_vid'      => $uploadVideo
            );

            $update = $this->mamo->UbahMateri($idMateri, $data);

            if ($update) {
                $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Materi Berhasil di Ubah</div>');
                redirect('materi');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert">Materi Tidak Berhasil di Ubah</div>');
                redirect('materi');
            }
        }
    }

    public function publishMateri($idMateri)
    {
        $data = [
            'status' => '1'
        ];
        $this->db->where('id', $idMateri);
        $this->db->update('materi', $data);
        $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Materi Berhasil di Publish</div>');
        redirect('materi');
    }

    public function hapus($idMateri)
    {
        $this->db->where('id', $idMateri);
        $this->db->delete('materi');
        $this->session->set_flashdata('info', '<div class="alert alert-success bg-success text-white border-0" role="alert">Materi Berhasil di Hapus</div>');
        redirect('materi');
    }

    public function uploadFoto($fotoSampul, $kodeMat)
    {
        $fotoSampulMateri = '';
        if ($fotoSampul) {
            // Load Config Dahulu
            $this->configUpload('./assets/uploads/sampul/', $kodeMat . '-' . $fotoSampul);

            if ($this->upload->do_upload('foto')) {
                $fotoSampulMateri    = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0r" role="alert"><span class="text-danger">Gagal Upload File Foto Materi ' . $this->upload->display_errors() . '</span></div>');
                redirect('materi');
            }
        } else {
            $fotoSampulMateri = null;
        }
        return $fotoSampulMateri;
    }

    public function uploadFile($fileMateri, $kodeMat)
    {
        $fileNamaMateri = '';
        if ($fileMateri) {
            // Load Config Dahulu
            $this->configUpload('./assets/uploads/materi/', $kodeMat . '-' . $fileMateri);

            if ($this->upload->do_upload('fileMateri')) {
                $fileNamaMateri    = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert"><span class="text-danger">Gagal Upload File Materi ' . $this->upload->display_errors() . '</span></div>');
                redirect('materi');
            }
        }
        return $fileNamaMateri;
    }

    public function uploadVideo($fileMateri, $kodeFile)
    {
        $fileNamaMateri = '';
        if ($fileMateri) {
            // Load Config Dahulu
            $this->configUpload('./assets/uploads/video/', $kodeFile . '-' . $fileMateri);

            if ($this->upload->do_upload('video')) {
                $fileNamaMateri    = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger bg-danger text-white border-0" role="alert"><span class="text-danger">Gagal Upload File Materi ' . $this->upload->display_errors() . '</span></div>');
                redirect('materi');
            }
        }
        return $fileNamaMateri;
    }
}


/* End of file Materi.php */
/* Location: ./application/controllers/Materi.php */