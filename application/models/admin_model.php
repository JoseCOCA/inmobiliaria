<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	// Insertar imagenes

	public function insert_images($table, $data){
		if($this->db->insert($table, $data)) return true;
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

	public function get_imagesDesc()
	{
		$query = $this->db->get('imagedesc');
		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function get_desc($Filtro)
	{
		$data;
		$query = $this->db->get_where('imagefilters',array('Filtro' => $Filtro));
		$queryB = $this->db->get_where('imagedesc',array('Filtro' => $Filtro, 'principal =' => '0', 'recomendado =' => '0'));
		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$data[] = $row;

			}
			// return $data;
		}
		if ($queryB->num_rows() > 0) {

			foreach ($queryB->result() as $rowB) {
				$data[] = $rowB;

			}
		}
		return $data;
	}


	public function get_banner()
	{
		$data = array();
		$query = $this->db->get_where('imagedesc',array('principal' => '1'));
		$queryB = $this->db->get_where('imagedesc',array('recomendado' => '1'));
		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$data['principal'][] = $row;

			}
		}
		if ($queryB->num_rows() > 0) {

			foreach ($queryB->result() as $rowB) {
				$data['recomendados'][] = $rowB;

			}
		}
		if(count($data) >0){
			return $data;	
		}else{
			return FALSE;
		}
	}

	public function get_MAX_ID($tabla)
	{
		$this->db->select_max('ID');
		$query = $this->db->get($tabla);
		return $query->result();
	}


		public function get_imagesFilter()
	{
		$query = $this->db->get('imagefilters');

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;

		}
	}
	//obtiene los contenidos de las secciones principales
	//inicio 				= 1
	//info empresa 			= 2
	//Aviso de privacidad 	= 3
	//Terminos de usos 		= 4

	public function getContent($padre)
	{
		// $this->db->select('contenido');
		$query = $this->db->get_where('contenido', array('padre' => $padre));

		if ($query->num_rows() > 0) {

			$data = $query->result();
			return $data;
		}
	}

	public function numRows()
	{
		$query = $this->db->get('imagefilters');
		$numrows = $query->num_rows();
		return $numrows;
	}

	public function lastFilter()
	{
		$this->db->select('Filtro');
		$this->db->order_by('Filtro', 'desc');
		$query = $this->db->get('imagefilters', 1);

		if ($query->num_rows() > 0) {

			$row = $query->result_array();
			$value = $row['0']['Filtro'];
			$arrayTrimed = str_split($value);

			$lastNumFilter = $arrayTrimed['1'];
			return $lastNumFilter;
		}
	}


	public function update_data($table,$data,$Filter)
	{
		$this->db->where($Filter);
		return $this->db->update($table, $data)?true:false;
	}

	public function deleteImage($name)
	{
		$this->db->select('url');
		$data = $this->db->get_where('imagedesc',array('nombre' => $name));

		return $data->result();
	}
	
	/**
	 * Elimina los registros dados por un dato o array de datos 
	 * @param  Array $tables el array de las tablas en las que se eliminará el registro
	 * @param  Array $th     El array de los datos de los que se buscará coincidencia
	 * @return Boolean         True si lo hace, false si no
	 */	
	public function deleteReg($tables, $th)
	{
		$this->db->where($th);
		$this->db->delete($tables);
		return $this->db->affected_rows();
	}

	public function nuevoContacto($data)
	{
		$this->db->insert('contactos', $data);
	}

	public function addMailProp($nuevoFiltro)
	{
		$this->db->insert('Correos', $nuevoFiltro);
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */ ?>