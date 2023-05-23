<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sekolah_model");
        $this->load->library('form_validation');
    }

    //method pertama yang akan di eksekusi
    public function index()
    {
        $data["kalender"] = $this->Sekolah_model->gettAll();
        $data['title']='HEXA | Kalender';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/siswa
        $this->load->view('kalender/index', $data);
        //  $this->load->view('templates/footer');
    }

    public function getdata()
    {
        $data = $this->Sekolah_model->getkalender();
        header('Content-Type: application/json; charset=utf8');
        echo json_encode($data);
    }
}

