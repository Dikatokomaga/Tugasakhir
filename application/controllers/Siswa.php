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
        $data["data_siswa"] = $Siswa->getById($id);
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
    public function file($id)
    {
        $query = $this->db->get_where('siswa', ['Id' => $id])->row();
        if ($query) {
            $file_path = './assets/sertifikat/'.$query->Sertifikat;
            // printf($file_path);
            // die;
            force_download($file_path,null);
        } else {
            redirect('siswa');
        }
    }
}
