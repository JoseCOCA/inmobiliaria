<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	// Insertar imagenes del Slide

	public function insert_imagesSLD($data){
		$this->db->insert('images_sld', $data);
	}

	// verifica el login de usuario 
	
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

	public function get_images(){
		
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */ ?>