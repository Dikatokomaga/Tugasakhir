<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{
    private $table = 'sekolah';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'nama_sekolah',  //samakan dengan atribute name pada tags input
                'label' => 'sekolah',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required',
                'errors' => ['required' => 'Kolom sekolah wajib di isi!'], //rules validasi
            ],
            [
                'field' => 'alamat_sekolah',  //samakan dengan atribute name pada tags input
                'label' => 'alamat sekolah',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required', //rules validasi
                'errors' => ['required' => 'Kolom Alamat Sekolah wajib di isi!'],
            ],
            [
                'field' => 'web',  //samakan dengan atribute name pada tags input   
                'label' => 'web sekolah',  // label yang kan ditampilkan pada pesan error
                'rules' => 'required', //rules validasi
                'errors' => ['required' => 'Kolom Web Sekolah di isi!'],
            ],
            [
                'field' => 'no_wa',  //samakan dengan atribute name pada tags input
                'label' => 'nomer sekolah',  // label yang kan ditampilkan pada pesan error
                'rules' => 'required', //rules validasi
                'errors' => ['required' => 'Kolom Nomer WA Sekolah di isi!'],
            ],
            [
                'field' => 'no_kontak',  //samakan dengan atribute name pada tags input
                'label' => 'kontak sekolah',  // label yang kan ditampilkan pada pesan error
                'rules' => 'required', //rules validasi
                'errors' => ['required' => 'Kolom Nomer Kontak Sekolah wajib di isi!'],
            ],
            [
                'field' => 'email',  //samakan dengan atribute name pada tags input
                'label' => 'email sekolah',  // label yang kan ditampilkan pada pesan error
                'rules' => 'required', //rules validasi
                'errors' => ['required' => 'Kolom Email Sekolah wajib di isi!'],
            ],

        ];
    }

    //menampilkan data siswa berdasarkan id siswa
    public function getById($id)
    {
        $data = $this->db->get_where($this->table, ["id" => $id])->row();
        // print_r($data);die;
        return $data;
    }

    //menampilkan semua data sekolah
    public function gettAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("Id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    //menyimpan data siswa
    public function save()
    {
        $data = array(
            "nama_sekolah" => $this->input->post('nama_sekolah'),
            "alamat_sekolah" => $this->input->post('alamat_sekolah'),
            "web" => $this->input->post('web'),
            "no_wa" => $this->input->post('no_wa'),
            "no_kontak" => $this->input->post('no_kontak'),
            "email" => $this->input->post('email')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data siswa
    public function update()
    {
        $data = array(
            "nama_sekolah" => $this->input->post('nama_sekolah'),
            "alamat_sekolah" => $this->input->post('alamat_sekolah'),
            "web" => $this->input->post('web'),
            "no_wa" => $this->input->post('no_wa'),
            "no_kontak" => $this->input->post('no_kontak'),
            "email" => $this->input->post('email')

        );
        return $this->db->update($this->table, $data, array('Id' => $this->input->post('Id')));
    }

    //hapus data siswa
    public function delete($nama_sekolah)
    {
        $this->db->delete('siswa', array("Sekolah" => $nama_sekolah));
        return $this->db->delete($this->table, array("Id" => $nama_sekolah));
    }

    public function getkalender()
    {

        $query = "SELECT id,Nama,Mulai,Berakhir FROM siswa ORDER BY Nama,Mulai Desc";
        $data = $this->db->query($query);
        return $data->result();
    }

    public function select_by_siswa()
    {
        $this->db->select('sis.*,sekol.id as id_sekolah, sekol.nama_sekolah as sekolah');
        $this->db->from('siswa sis');
        $this->db->join('sekolah sekol', 'sis.Sekolah = sekol.id ');
        $query = $this->db->get();
        return $query->result();
    }

    public function daftar($id)
    {

        $query = $this->db->get_where('sekolah', array('id' => $id))->result();
        // echo "<pre>";
        // print_r($query);die;
        // echo "</pre>";
        return $query;
    }
}
