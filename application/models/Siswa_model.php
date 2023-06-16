<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $table = 'siswa';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'Nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
                'rules' => '' //rules validasi
            ],
            [
                'field' => 'Sekolah',
                'label' => 'Sekolah',
                'rules' => 'trim'
            ],
            [
                'field' => 'Gambar',
                'label' => 'gambar',
                'rules' => 'trim'
            ],
            [
                'field' => 'DokumenCV',
                'label' => 'dokumen cv',
                'rules' => 'trim'
            ],
            [
                'field' => 'JenisKelamin',
                'label' => 'Jenis Kelamin',
                'rules' => ''
            ],
            [
                'field' => 'Alamat',
                'label' => 'Alamat',
                'rules' => ''
            ],
            [
                'field' => 'Agama',
                'label' => 'Agama',
                'rules' => ''
            ],
            [
                'field' => 'NoHp',
                'label' => 'No Hp',
                'rules' => 'numeric|max_length[15]'
            ],
            [
                'field' => 'Email',
                'label' => 'Email',
                'rules' => ''
            ],
            [
                'field' => 'Status',
                'label' => 'Status',
                'rules' => ''
            ],

        ];
    }
    public function lingkaran()
    {

        $query = "SELECT sekolah.id, sekolah.nama_sekolah, COUNT(siswa.Id) as count_sekolah
        FROM sekolah join  siswa on siswa.Sekolah = sekolah.id
        GROUP BY sekolah.id, sekolah.nama_sekolah";
        $sqlquery = $this->db->query($query);
        return $sqlquery->result();
    }

    //menampilkan data siswa berdasarkan id siswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["Id" => $id])->row();
    }

    //menampilkan semua data siswa
    public function getAll()
    {

        $this->db->from($this->table);
        // $this->db->join('siswa', 'sekolah.id = siswa.id');
        $this->db->order_by("Id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    //menyimpan data siswa
    public function save()
    {
        $config['upload_path']           =  './assets/img/';
        $config['allowed_types']         =  'gif|jpg|png';
        $config['max_size']              =  99999;
        $config['max_width']             =  99999;
        $config['max_height']            =  999999;
        $this->load->library('upload',  $config);

        if (!$this->upload->do_upload('Gambar')) {
            // redirect('siswa/add');
            
        } else {
            $uploud_image = $this->upload->data('file_name');
        }

        $config2['upload_path'] = './assets/img1/';
        $config2['allowed_types'] = 'pdf|doc|docx|png|jpg';
        $config2['max_size'] = 99999;
        $config2['max_width'] = 99999;
        $config2['max_height'] = 999999;
        $this->upload->initialize($config2);

        if (!$this->upload->do_upload('DokumenCV')) {
            // redirect('siswa/add');
        } else {
            $uploud_CV = $this->upload->data('file_name');
        }

        $config3['upload_path'] = './assets/sertifikat/';
        $config3['allowed_types'] = 'pdf|doc|docx|png|jpg';
        $config3['max_size'] = 99999;
        $config3['max_width'] = 99999;
        $config3['max_height'] = 999999;
        $this->upload->initialize($config3);

        if (!$this->upload->do_upload('Sertifikat')) {
            // redirect('siswa/add');
        } else {
            $uploud_sertifikat = $this->upload->data('file_name');
        }
        // echo "<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";

        $data = array(
            "Nama" => $this->input->post('Nama'),
            "Sekolah" => $this->input->post('Sekolah'),
            "Gambar" => $uploud_image,
            "DokumenCV " => $uploud_CV,
            "Sertifikat" => $uploud_sertifikat,
            "JenisKelamin" => $this->input->post('JenisKelamin'),
            "Alamat" => $this->input->post('Alamat'),
            "Agama" => $this->input->post('Agama'),
            "NoHp" => $this->input->post('NoHp'),
            "Email" => $this->input->post('Email'),
            "Status" => $this->input->post('Status'),
            "Mulai" => $this->input->post('Mulai'),
            "Berakhir" => $this->input->post('Berakhir'),
            "nis" => $this->input->post('NIS'),
            "nilai" => $this->input->post('NILAI')
        );

        if(!$uploud_image){
            unset($data['Gambar']);
        }

        if(!$uploud_sertifikat){
            unset($data['Sertifikat']);
        }

        if(!$uploud_CV){
            unset($data['DokumenCV']);
        }

         $this->db->insert($this->table, $data);
         $insert_id = $this->db->insert_id();
         $data1 = [
                ["id_siswa" => $insert_id,
                "nama_sekolah" => $this->input->post('SD'),
                "jenjang" => 'SD'],

                ["id_siswa" => $insert_id,
                    "nama_sekolah" => $this->input->post('SMP'),
                    "jenjang" => 'SMP'],

                ["id_siswa" => $insert_id,
                    "nama_sekolah" => $this->input->post('SMA'),
                    "jenjang" => 'SMA']];
                $this->db->insert_batch('riwayat_pendidikan', $data1);

        $tools= $this->input->post('tools');
        $projects= $this->input->post('project');

        $data_project = [];
        $hasil_img = array();
        $files = $_FILES;
        $count_hasil = sizeof($_FILES['hasil']['name']);
        $count_tools = sizeof($this->input->post('tools'));
        $count_projects = sizeof($this->input->post('project'));
        
        if ($count_hasil > 0) {
            for($i=0; $i<$count_hasil; $i++)
                {
                    $_FILES['hasil']['name']= $files['hasil']['name'][$i];
                    $_FILES['hasil']['type']= $files['hasil']['type'][$i];
                    $_FILES['hasil']['tmp_name']= $files['hasil']['tmp_name'][$i];
                    $_FILES['hasil']['error']= $files['hasil']['error'][$i];
                    $_FILES['hasil']['size']= $files['hasil']['size'][$i];    

                    // $config_img_hasil['upload_path'] = './assets/img1/';
                    // $config_img_hasil['allowed_types'] = 'pdf|doc|docx|png|jpg';
                    // $config_img_hasil['max_size'] = 99999;
                    // $config_img_hasil['max_width'] = 99999;
                    // $config_img_hasil['max_height'] = 999999;
                    // $this->upload->initialize($config_img_hasil);

                    $this->upload->do_upload('hasil');
                    $hasil_img[] = $this->upload->data();
                }
        }

            // echo"<pre>";
            //         // print_r($value);
            //         print_r($hasil_img);die;
            //         echo"</pre>";

        if ($count_projects > 0 || $count_hasil > 0) {
            foreach ($projects as $key => $value) {
                // foreach ($hasil_img as $key2 => $val) {
                    

                    $datas =  ["id_siswa"=> $insert_id,"jenis_tugas" => $value,"tools"=>$tools[$key],"hasil"=>$hasil_img[$key]['file_name']];
                    $this->db->insert('portofolio',$datas);
                // }
            }
        }
        

        $sekolah= $this->input->post('nama_sekolah');
        $jenjang= $this->input->post('jenjang');

        $count_sekolah = sizeof($this->input->post('nama_sekolah'));
        $count_jenjang = sizeof($this->input->post('jenjang'));

        if ($count_sekolah > 0 || $count_jenjang > 0) {
            foreach ($sekolah as $key => $value) {
                // foreach ($hasil_img as $key2 => $val) {
                    

                    $datas1 =  ["id_siswa"=> $insert_id,"nama_sekolah" => $value,"jenjang"=>$jenjang[$key]];
                    $this->db->insert('riwayat_pendidikan',$datas1);
                // }
            }
        }
        
        // print_r($hasil_img);die;

        // foreach ( $projects as $key => $value) {
        //     $project= ["id_siswa"=> $insert_id,"jenis_tugas" => $value,"tools"=>$tools[$key],"hasil"=>$hasil[$key]];
        //     $this->db->insert('portofolio',$project);
        // }
        


    }

    //edit data siswa
    public function update()
    {
        // echo"<pre>";
        // print_r($this->input->post());die;
        // echo "</pre>";
        $config['upload_path']           =  './assets/img/';
        $config['allowed_types']         =  'gif|jpg|png';
        $config['max_size']              =  99999;
        $config['max_width']             =  99999;
        $config['max_height']            =  999999;
        $this->load->library('upload',  $config);

        if (!$this->upload->do_upload('Gambar')) {
            // redirect('siswa/edit');
        } else {
            $uploud_image = $this->upload->data('file_name');
        }

        $config2['upload_path'] = './assets/img1/';
        $config2['allowed_types'] = 'pdf|doc|docx|png|jpg';
        $config2['max_size'] = 99999;
        $config2['max_width'] = 99999;
        $config2['max_height'] = 999999;
        $this->upload->initialize($config2);

        if (!$this->upload->do_upload('DokumenCV')) {
            // redirect('siswa/edit');
        } else {
            $uploud_CV = $this->upload->data('file_name');
        }

        $config3['upload_path'] = './assets/sertifikat/';
        $config3['allowed_types'] = 'pdf|doc|docx|png|jpg';
        $config3['max_size'] = 99999;
        $config3['max_width'] = 99999;
        $config3['max_height'] = 999999;
        $this->upload->initialize($config3);

        if (!$this->upload->do_upload('Sertifikat')) {
            // redirect('siswa/edit');
        } else {
            $uploud_sertifikat = $this->upload->data('file_name');
        }
        $data = array(
            "Nama" => $this->input->post('Nama'),
            "Sekolah" => $this->input->post('Sekolah'),
            "Gambar" => $uploud_image,
            "DokumenCV " => $uploud_CV,
            "Sertifikat" => $uploud_sertifikat,
            "JenisKelamin" => $this->input->post('JenisKelamin'),
            "Alamat" => $this->input->post('Alamat'),
            "Agama" => $this->input->post('Agama'),
            "NoHp" => $this->input->post('NoHp'),
            "Email" => $this->input->post('Email'),
            "Status" => $this->input->post('Status'),
            "Link" => $this->input->post('Link'),
            "Mulai" => $this->input->post('Mulai'),
            "Berakhir" => $this->input->post('Berakhir'),
            "nis" => $this->input->post('NIS'),
            "nilai" => $this->input->post('NILAI')

        );


        $sekolah= $this->input->post('nama_sekolah');
        $jenjang= $this->input->post('jenjang');

        $count_sekolah = sizeof($this->input->post('nama_sekolah'));
        $count_jenjang = sizeof($this->input->post('jenjang'));

        $this->db->where('id_siswa',$this->input->post('Id'));
        $this->db->delete('riwayat_pendidikan');

        if ($count_sekolah > 0 || $count_jenjang > 0) {
            foreach ($sekolah as $key => $value) {
                // foreach ($hasil_img as $key2 => $val) {
                    

                    $datas1 =  ["id_siswa"=> $this->input->post('Id'),"nama_sekolah" => $value,"jenjang"=>$jenjang[$key]];
                    $this->db->insert('riwayat_pendidikan',$datas1);
                // }
            }
        }

        $tools= $this->input->post('tools');
        $projects= $this->input->post('project');

        $data_project = [];
        $hasil_img = array();
        $files = $_FILES;
        $count_hasil = sizeof($_FILES['hasil']['name']);
        $count_tools = sizeof($this->input->post('tools'));
        $count_projects = sizeof($this->input->post('project'));
        
        if ($count_hasil > 0) {
            for($i=0; $i<$count_hasil; $i++)
                {
                    $_FILES['hasil']['name']= $files['hasil']['name'][$i];
                    $_FILES['hasil']['type']= $files['hasil']['type'][$i];
                    $_FILES['hasil']['tmp_name']= $files['hasil']['tmp_name'][$i];
                    $_FILES['hasil']['error']= $files['hasil']['error'][$i];
                    $_FILES['hasil']['size']= $files['hasil']['size'][$i];    

                    // $config_img_hasil['upload_path'] = './assets/img1/';
                    // $config_img_hasil['allowed_types'] = 'pdf|doc|docx|png|jpg';
                    // $config_img_hasil['max_size'] = 99999;
                    // $config_img_hasil['max_width'] = 99999;
                    // $config_img_hasil['max_height'] = 999999;
                    // $this->upload->initialize($config_img_hasil);

                    $this->upload->do_upload('hasil');
                    $hasil_img[] = $this->upload->data();
                }
        }
        $this->db->where('id_siswa',$this->input->post('Id'));
        $this->db->delete('portofolio');

        if ($count_projects > 0 || $count_hasil > 0) {
            foreach ($projects as $key => $value) {
                // foreach ($hasil_img as $key2 => $val) {
                    

                    $datas =  ["id_siswa"=> $this->input->post('Id'),"jenis_tugas" => $value,"tools"=>$tools[$key],"hasil"=>$hasil_img[$key]['file_name']];
                    $this->db->insert('portofolio',$datas);
                // }
            }
        }
    



    
        return $this->db->update($this->table, $data, array('Id' => $this->input->post('Id')));

    }

    //hapus data siswa
    public function delete($id)
    {
        return $this->db->delete($this->table, array("Id" => $id));
    }




    public function getdasbor()
    {
        return $this->db->get($this->table)->result_array();
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

    public function joinmas()
    {
        // $this->db->select('sis.*,sekol.id as id_sekolah, sekol.nama_sekolah as sekolah');
        // $this->db->from('siswa sis');
        // $this->db->join('sekolah sekol', 'sis.Sekolah = sekol.id ');
        // $query = $this->db->get();
        // return $query->result();
        $querymenu = "SELECT siswa.*,sekolah.nama_sekolah FROM siswa JOIN sekolah ON sekolah.id = siswa.Sekolah ";
        $query = $this->db->query($querymenu);
        return $query->result();
    }

    public function dropdown()
    {
        $this->db->select('*');
        $query = $this->db->get('sekolah');
        return $query->result();
    }

    public function getMahasiswaById($id)
    {
        $this->db->SELECT('s.*,sk.nama_sekolah');
        $this->db->join('sekolah as sk','sk.id=s.Sekolah','left');
        $data=$this->db->get_where('siswa as s', ['s.id' => $id])->row();
        // print_r($id);die;
         return $data;
    }
    public function getPortofolio($id)
    {
        $this->db->SELECT('*');
        // $this->db->join('sekolah as sk','sk.id=s.Sekolah','left');
        $data=$this->db->get_where('portofolio', ['id_siswa' => $id])->result();
         return $data;
    }

    public function getriwayatpendidikan($id)
    {
        $this->db->SELECT('*');
        // $this->db->join('sekolah as sk','sk.id=s.Sekolah','left');
        $data=$this->db->get_where('riwayat_pendidikan', ['id_siswa' => $id])->result();
         return $data;
    }
}
