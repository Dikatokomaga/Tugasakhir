<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function login($user, $pass)
	{
		$a = password_hash($pass, PASSWORD_DEFAULT); 
		// print_r($a);
		// die;
		$cek  = $this->db->get_where('admin', ['username' => $user]);
		if($cek->num_rows() > 0){
			$hasil = $cek->row_array();
			// print_r($pass);
			// die;
			if(password_verify($pass, $a))
			{
				redirect('dasbor');
				return $hasil;
			} else {
				print_r('amama');
				die;
				return false;
			}
		}
	
	}
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */