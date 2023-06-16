<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Siswa_model"); //load model siswa
        $this->load->helper('download');
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "HEXA | List Data Siswa OJT";
        //ambil fungsi getAll untuk menampilkan semua data siswa
        $data["data_siswa"] = $this->Siswa_model->joinmas();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        //load view index.php pada folder views/siswa
        $this->load->view('siswa/index', $data);
    }

    //method add digunakan untuk menampilkan form tambah data siswa
    public function add()
    {
        $Siswa = $this->Siswa_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Siswa->rules()); //menerapkan rules validasi pada siswa_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada siswa_model
        $data['joinmas'] = $this->Siswa_model->joinmas();
        $data['dropdown'] = $this->Siswa_model->dropdown();
        // echo '<pre>';
        // print_r ($data['dropdown']);die;
        // echo '</pre>';
        if ($validation->run()) {
            $Siswa->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data siswa berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("siswa");
        } else {

            $data["title"] = "HEXA | Tambah siswa";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('Siswa/add', $data);
        }
    }

    public function edit($id = null)
    {

        if (!isset($id)) redirect('Siswa');

        $Siswa = $this->Siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($Siswa->rules());
        $data['dropdown'] = $this->Siswa_model->dropdown();


        if ($validation->run()) {
            $Siswa->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data siswa berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("siswa");
        }
        $data['gambar'] = $this->db->get_where('siswa', ['id' => $id])->row_array();
        $data["title"] = "HEXA | Edit siswa";
        $this->db->select('s.*');
        // $this->db->from('siswa s');
        // $this->db->join("(select id_siswa, nama_sekolah from riwayat_pendidikan where id_siswa=".$id." and jenjang='sd') as sd", 'sd.id_siswa= s.id','left');

        // $this->db->join(" (select id_siswa, nama_sekolah from riwayat_pendidikan where id_siswa=".$id." and jenjang='smp') as smp", ' smp.id_siswa= s.Id ','left');

        // $this->db->join("(select id_siswa, nama_sekolah from riwayat_pendidikan where id_siswa=".$id." and jenjang='sma') as sma", 'sma.id_siswa= s.id','left');

        // $this->db->where('s.id',$id);

        $data["data_siswa"] = $this->db->get_where('siswa s', ['s.id' => $id])->row();
        $data["data_riwayat_pendidikan"]= $this->db->get_where('riwayat_pendidikan', ['id_siswa' => $id])->result();
        $data["data_portofolio"]= $this->db->get_where('portofolio', ['id_siswa' => $id])->result();
        
        // $data["data_siswa"] = $Siswa->getById($id);
        // echo "<pre>";
        // print_r($data["data_riwayat_pendidikan"][0]);die;
        // echo "</pre>";
        if (!$data["data_siswa"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('siswa/edit', $data);
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Siswa_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data siswa berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }

    public function detail($id = null)
    {
        if (!isset($id)) redirect('Siswa');

        $Siswa = $this->Siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($Siswa->rules());
        $data['dropdown'] = $this->Siswa_model->dropdown();


        if ($validation->run()) {
            $Siswa->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data siswa berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("siswa");
        }
        $data["title"] = "HEXA | Detail siswa";
        $data["data_siswa"] = $Siswa->getById($id);
        if (!$data["data_siswa"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('siswa/detail', $data);
    }
    // public function file($id)
    // {
    //     $query = $this->db->get_where('siswa', ['Id' => $id])->row();
    //     if ($query) {
    //         $file_path = './assets/sertifikat/'.$query->Sertifikat;
    //         // printf($file_path);
    //         // die;
    //         force_download($file_path,null);
    //     } else {
    //         redirect('siswa');
    //     }
    // }

    public function pdf($Id)
    {
        $data['magang'] = $this->Siswa_model->getMahasiswaById($Id);
        $data['portofolio'] = $this->Siswa_model-> getPortofolio($Id);
        $data['riwayat_pendidikan'] = $this->Siswa_model->getriwayatpendidikan($Id);
        $this->load->library('pdf');
        // echo "<pre>";
        // print_r($data);die;
        // echo "</pre>";
        $html = $this->load->view('siswa/pdfmahasiswa', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

    public function file($id)
    {
        $data['siswa'] = $this->Siswa_model->getMahasiswaById($id);
        $this->load->library('pdf');
        $html = $this->load->view('siswa/template', $data['siswa'], true);
        // print_r($data['siswa']); die;
        $this->pdf->createPDF($html, 'mypdf', false);
    
    }
 
}
