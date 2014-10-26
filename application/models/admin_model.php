<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function verify_user($email, $password){
		$q = $this
			->db
			->where('email_address',$email)
			->where('password',sha1($password))
			->limit(1)
			->get('users');

		if ($q->num_rows > 0) {
	
			return $q->row();
		}

		return false;

	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */ ?>