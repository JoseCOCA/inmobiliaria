<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion_modelo extends CI_Model {

	public function nuevoContacto($data)
	{
		$this->db->insert('contactos', $data);
	}

	public function isContact($contacto)
	{
		$this->db->where('Correo', $contacto);
		$query = $this->db->get('contactos');

		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function notificar($Filtro)
	{
		
		$this->db->select('Status');
		$this->db->from('imagefilters');
		$this->db->where('Filtro', $Filtro);
		$query = $this->db->get();

		if($query->result() == 'DISPONIBLE'){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function selecMails($Filtro)
	{
		$this->db->select('Correos');
		$this->db->from('correos');
		$this->db->where('Filtro', $Filtro);
		$query = $this->db->get();

		foreach ($query->result as $row) {
			$data[] = $row;
		}

		return $data;

	}

}

/* End of file notificacion_modelo.php */
/* Location: ./application/models/notificacion_modelo.php */ 