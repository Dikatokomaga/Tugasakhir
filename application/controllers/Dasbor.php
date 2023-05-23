<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("Siswa_model");
    $this->load->library('form_validation');
  }

  //method pertama yang akan di eksekusi
  public function index()
  {
    $data['title'] = 'HEXA | Dasbord';
    $data['diagram'] = $this->Siswa_model->lingkaran();
   
    //ambil fungsi getAll untuk menampilkan semua data siswa
    $data['dasbor'] = $this->Siswa_model->hitungjumlahsiswa();
    $data['dasbor2'] = $this->Siswa_model->hitungjumlahsekolah();
    //load view header.php pada folder views/templates
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('dasbor/index', $data);
    //load view index.php pada folder views/siswa
    // $this->load->view('templates/footer');
  }


  public function getdata()
  {
    $data = $this->Siswa_model->getdasbor();
    header('Content-Type: application/json; charset=utf8');
    echo json_encode($data);
  }

  public function hitungjumlahsiswa()
  {
    $query = $this->db->get('siswa');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function hitungjumlahsekolah()
  {
    $query = $this->db->get('sekolah');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
}
