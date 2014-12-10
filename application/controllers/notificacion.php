<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('notificacion_modelo');
		$this->load->model('admin_model');

	}

	public function index()
	{
		$this->load->view('contactForm');
	}

	public function obtenerDatos()
	{
		//validación del formulario

		$this->form_validation->set_message('required', 'El campo %s es requerido');

		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('tel', 'Teléfono', 'required');
		$this->form_validation->set_rules('email', 'Correo', 'required|valid_email');

	    //Variables del nuevo contacto
		$nombre 	= 	$this->input->post('name');	
		$telefono 	=	$this->input->post('tel');
		$correo 	=	$this->input->post('email');
		$cel 		=	$this->input->post('cel');
		$empresa 	=	$this->input->post('emp');
		$comentarios =  $this->input->post('com');
		$Filtro 	=	$this->input->post('filtro');

		if ($this->form_validation->run() == FALSE) {
			
			echo validation_errors(' ',' ');

		}else{

			//arreglo para el nuevo contacto
			$contacto = array(		
				'Nombre' => $nombre, 
				'Telefono' => $telefono,
				'Correo' => $correo,
				'Celular' => $cel,
				'Empresa' => $empresa,
				
				);
			$notificarA = array(
				 'Nombre' => $nombre,
				 'Correo' => $correo
				);

			//chequeo de contacto no repetido
			if ($this->notificacion_modelo->isContact($contacto['Correo'])) {

				
				if(!empty($comentarios)){

					$this->_sendEmail($correo,$comentarios);

				 }
				 	$this->jsonMail($Filtro,$notificarA);
			}else{

					if(!empty($comentarios)){	//si existen comentarios
						$this->_sendEmail($correo,$comentarios);	
					}
				//captura de datos de nuevo contacto en DB
				echo "Nuevo contacto agregado gracias por su preferencia\n";
				if($this->notificacion_modelo->nuevoContacto($contacto)){
					$this->jsonMail($Filtro,$notificarA);
				}
			}
		}
	}
		//funcion para enviar notificaciones
	public function Notificaciones()
	{
		$this->load->library('email');
		//agregar filtro para corroborar notificacion
		$Filtro = $this->input->post('Filtro');		
		$emails = $this->notificacion_modelo->selecMails($Filtro);
		// echo $emails;
		$data = json_decode($emails);

		  // $countMail = count($data);
		  // echo $countMail;
		if ($data) {
			foreach ($data as $key) {
			  	//print_r($key);
				$dataMails[] = $key->Correo;
			}
		 	// print_r($dataMails) ;
			// los manda desde la dirección correspondiente
			$this->email->from('test@inmobiliariayarrendadora.com.mx'); //agregar direccion
			$this->email->to('');
			$this->email->bcc($dataMails);				//emails en DB			
			$this->email->subject('Notificacion de disponibilidad');
			$this->email->message('La propiedad esta disponible');
						
			if($this->email->send()){				
				// echo $this->email->print_debugger();
				if($this->admin_model->update_data('correos',array('Enviado' => '1', ),array('Propiedad'=>$Filtro))){
				echo "Su mensaje fue enviado correctamente \n";	
				}

			}else{
				echo $this->email->print_debugger();
				echo "Fallo en el envío intentelo más tarde \n";
			}
		}else{
		  	echo "No se encontraron correos para notificar \n";
		}
	}
	//JSON agregado a DB

	public function jsonMail($Filtro, $datos)
	{
		$notificarA = $datos;
		//agregar correo para notificacion
		$data = $this->notificacion_modelo->selecMails($Filtro);

		if ($data) {

			$findMail = strpos($data, $notificarA['Correo']);
			//echo $findMail;
			if($findMail === false){
			    echo "Recibira notificacion de disponibilidad de esta propiedad \n";
				//insertar solo el correo en JSON de tabla correos
				 
				$json = json_decode($data,true);

				$json[] = $notificarA;
				 // print_r($json);
				$json = json_encode($json,JSON_FORCE_OBJECT);

				 //echo $json;

				$this->admin_model->update_data('correos',array('Correos' => $json),array('Propiedad' => $Filtro));
			 
			}else{
				echo "Este correo ya existe por favor espere a ser notificado \n";
			}
		}else{
			//crear JSON para filtro
			$NotJson = array($notificarA);
			$json = json_encode($NotJson, JSON_FORCE_OBJECT);
			// echo $json;
			$this->admin_model->update_data('correos',array('Correos' => $json),array('Propiedad' => $Filtro));
			echo "Agregado correo notificacion \n";
		}		
	}

	//envio de mensajes a la dirección del admin

		private function _sendEmail($emailFrom,$comentarios)
	{
		
		// activar envio de email
		$this->load->library('email');

		
		$this->email->from($emailFrom);
		$this->email->to('test@inmobiliariayarrendadora.com.mx');
		
		$this->email->subject('Comentarios de las propiedades');
		$this->email->message($comentarios);
		
		if($this->email->send()){

			echo "Su mensaje fue enviado correctamente \n";
			// echo $this->email->print_debugger();

		}else{

		echo "fallo en el envio, por favor intentelo más tarde \n";

			// echo $this->email->print_debugger();

		}
	}

}

/* End of file notificacion.php */
/* Location: ./application/controllers/notificacion.php */ 