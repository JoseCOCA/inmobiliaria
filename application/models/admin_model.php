<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	// Insertar imagenes

	public function insert_images($table, $data){
		$this->db->insert($table, $data);
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

	//realiza la consulta de los parametros de la imagen del slide

	public function get_images()
	{
		$query = $this->db->get('images');
		if ($query->num_rows() > 0) {
		
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;		
		}
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */ ?>