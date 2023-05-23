<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //method pertama yang akan di eksekusi
    public function index()
    {
        $data['title'] = 'HEXA | Password';
        $data['edit'] = $this->db->get_where('admin', ['username' =>  $this->session->userdata('username')])->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Password/index', $data);
        //load view index.php pada folder views/siswa
        // $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim');
        $this->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|min_length[2]|matches[password]',
            [
                'matches' => 'password dont match!',
                'min_length' => 'password to short',
                'required' => 'requires a password'
            ]
        );
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[2]');
        // print_r($this->form_validation->run());
        // die;
        if ($this->form_validation->run() == false) {
            redirect('password');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->db->update('admin', $data, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data admin berhasil di edit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("password");
        }
    }
}
