<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion_modelo extends CI_Model {

	public function nuevoContacto($data)
	{
		if ($this->db->insert('contactos', $data)) {
			return TRUE;
		}
		
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
		$this->db->select('Enviado');
		$queryB = $this->db->get_where('correos', array('Propiedad' => $Filtro ));
		if($queryB->num_rows()>0){
			foreach ($queryB->result() as $row) {
				$enviado = $row->Enviado;
			}
		}
		$this->db->select('Status');
		$query = $this->db->get_where('imagefilters',array('Filtro' => $Filtro ));
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$status = $row->Status;
			}
		}
		if( $status == "Disponible" and $enviado == '0'){
			return '0';
		}else if($status == "Disponible" and $enviado == '1'){
			return '1';
		}else if($status == "No disponible"){
			return '2';
		}
	}

	public function selecMails($Filtro)
	{
		$this->db->select('Correos');
		$query = $this->db->get_where('correos',array('Propiedad'=>$Filtro));

		foreach ($query->result() as $row) {
			$data = $row->Correos;
		}

		if(!empty($data)){
			return $data;
		}
	}

}

/* End of file notificacion_modelo.php */
/* Location: ./application/models/notificacion_modelo.php */ 