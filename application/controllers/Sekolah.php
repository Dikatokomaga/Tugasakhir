<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sekolah_model"); //load model siswa
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "HEXA | List Data sekolah";
        //ambil fungsi getAll untuk menampilkan semua data siswa
        $data["data_sekolah"] = $this->Sekolah_model->GettAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');

        //load view index.php pada folder views/siswa
        $this->load->view('sekolah/index');
        // $this->load->view('templates/footer
    }

    //method add digunakan untuk menampilkan form tambah data siswa
    public function add()
    {
        $Sekolah = $this->Sekolah_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Sekolah->rules()); //menerapkan rules validasi pada siswa_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada siswa_model
        if ($validation->run()) {
            $Sekolah->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data siswa berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("sekolah");
        }
        $data["title"] = "Tambah Data Sekolah";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Sekolah/add', $data);
        // $this->load->view('templates/footer');
    }


    public function delete($id)
    {

        $this->Sekolah_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data siswa berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }

    public function detail($id)
    {
        $data["title"] = "HEXA | Detail Data Sekolah";
        $data["data_sekolah"] = $this->Sekolah_model->getById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');

        $this->load->view('sekolah/detail', $data);
        // $this->load->view('templates/footer');
    }




    public function edit($id)
    {
        if (!isset($id)) redirect('Sekolah');

        $sekolah = $this->Sekolah_model;
        $validation = $this->form_validation;
        $validation->set_rules($sekolah->rules());

        if ($validation->run()) {
            $sekolah->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Sekolah berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            // redirect("Sekolah");
        }
        $data["title"] = "HEXA | Edit Data Sekolah";
        $data["data_sekolah"] = $sekolah->getById($id);
        if (!$data["data_sekolah"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Sekolah/edit', $data);
        $this->load->view('templates/footer');
    }


    public function update($id)
    {

        $this->db->set('nama_sekolah',  $this->input->post('Sekolah'));
        $this->db->set('alamat_sekolah',  $this->input->post('alamat_sekolah'));
        $this->db->set('web',  $this->input->post('web'));
        $this->db->set('no_wa',  $this->input->post('no_wa'));
        $this->db->set('no_kontak',  $this->input->post('no_kontak'));
        $this->db->set('email',  $this->input->post('email'));
        $this->db->where('id', $id);
        $this->db->update('sekolah'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Sekolah berhasil disimpan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>');

        redirect('sekolah');
    }
}
