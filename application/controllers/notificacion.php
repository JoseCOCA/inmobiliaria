<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('notificacion_modelo');

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
				'Correo' => $correo,
				'Filtro'	=> $filtro
				);

			//chequeo de contacto no repetido
			if ($this->notificacion_modelo->isContact($contacto['Correo'])) {

				
				if(!empty($comentarios)){


					$this->_sendEmail($correo,$comentarios);


				 }else{

				 	echo "Recibira notificacion de disponibilidad de esta propiedad";
				 }
				 

			}else{

					if(!empty($comentarios)){	//si existen comentarios

						$this->_sendEmail($correo,$comentarios);
						
					}
				//captura de datos de nuevo contacto en DB
				echo "Nuevo contacto agregado gracias por su preferencia";
				$this->notificacion_modelo->nuevoContacto($contacto);
			}

		}
	
	}
		//funcion para enviar notificaciones
	public function Notificaciones()
	{
		//checar si la propiedad status ha cambiado
		if($this->notificacion_modelo->notificar($Filtro)){ //agregar filtro para corroborar notificacion
			//si cambia selecciona los correos relacionados
		$emails = $this->notificacion_modelo->selecMails($Filtro);
			//los manda desde la dirección correspondiente
			$this->email->from('test@inmobiliariayarrendadora.com.mx'); //agregar direccion
			$this->email->to($emails);				//emails en DB			
			$this->email->subject('Notificacion de disponibilidad');
			$this->email->message('La propiedad esta disponible');
						
			if($this->email->send()){

				echo "mail sent";
				echo $this->email->print_debugger();

			}else{

				echo $this->email->print_debugger();

			}

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

			echo "Su mensaje fue enviado correctamente";
			// echo $this->email->print_debugger();

		}else{

		echo "fallo en el envio, por favor intentelo más tarde";

			// echo $this->email->print_debugger();

		}
	}

}

/* End of file notificacion.php */
/* Location: ./application/controllers/notificacion.php */ 