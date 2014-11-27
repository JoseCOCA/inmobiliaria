<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if($Filtro = $_POST['id']){ //Agregar nombre del post de ajax;
		// if($Filtro = $this->input->post('id')){ //Agregar nombre del post de ajax;
			$query = $this->admin_model->get_desc($Filtro);
		    echo json_encode($query);
		}

	}
	
	public function getContentData(){
		$padre = isset($_GET['padre']) ? $_GET['padre'] : '1';
		echo json_encode($this->admin_model->getContent($padre));
	}

	public function contacto()
	{
		if($this->input->post('ajaxForm') != ""){
			$data = json_decode($this->input->post('ajaxForm')); 	// decodificar post de ajax
			$Contacto = array(										//arreglo para insertar en tabla contactos
				'Nombre' 	=> $data['nombre'] ,
				'Telefono' 	=> $data['telefono'] ,
				'Celular' 	=> $data['celular'] ,
				'Correo' 	=> $data['correo'] ,
				'Empresa' 	=> $data['empresa']
				);
			$this->admin_model->nuevoContacto($data);				//insertar en DB nuevo contacto
			$Notificacion = array(
				'Usuario'	=> $data['correo'],
				'Propiedad'	=> $data['Filtro'],
				'Enviado'	=> '0'				);
		}
	}

}

/* End of file request.php */
/* Location: ./application/controllers/request.php */