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

		$this->load->library('email');

		//validación del formulario

		//$this->form_validation->set_message();

		$this->form_validation->set_rules('Nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('Telefono', 'Teléfono', 'required');
		$this->form_validation->set_rules('Correo', 'Correo', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('contactForm');
		}else{
			//Variables del nuevo contacto
			$nombre 	= 	$this->input->post('Nombre');	
			$telefono 	=	$this->input->post('Telefono');
			$correo 	=	$this->input->post('Correo');
			$cel 		=	$this->input->post('Celular');
			$empresa 	=	$this->input->post('Empresa');

			//arreglo para el nuevo contacto
			$contacto = array(		
				'Nombre' => $nombre, 
				'Telefono' => $telefono,
				'Correo' => $correo,
				'Celular' => $cel,
				'Empresa' => $empresa,
				);

			//chequeo de contacto no repetido
			if ($this->notificacion_modelo->isContact($contacto['Correo'])) {
				$comentarios = $this->input->post('Comentarios');
				if($comentarios !== ""){

					
					
					$this->email->from(set_value($comentarios));
					$this->email->to('josecoca0890@gmail.com');
					
					$this->email->subject('Comentarios de las propiedades');
					$this->email->message(set_value($comentarios));
					
					if($this->email->send()){

						echo "mail sent";
						echo $this->email->print_debugger();

					}else{

						echo $this->email->print_debugger();

					}
					
					
				}

			}else{

					if($comentarios !== ""){	//si existen comentarios

						$this->email->from(set_value($correo));
						$this->email->to('josecoca0890@gmail.com');
						
						$this->email->subject('Comentarios de las propiedades');
						$this->email->message(set_value($comentarios));
						
						if($this->email->send()){

							echo "mail sent";
							echo $this->email->print_debugger();

						}else{

							echo $this->email->print_debugger();

						}
						
					}
				//captura de datos de nuevo contacto en DB
				$this->notificacion_modelo->nuevoContacto($contacto);
			}

			//mensaje de aprovación
			$this->load->view('succesContact');


		}
	
	}
		//funcion para enviar notificaciones
	public function Notificaciones()
	{
		//checar si la propiedad status ha cambiado
		if($this->notificacion_modelo->notificar($Filtro)){ //agregar filtro para corroborar notificacion
			//si cambia elecciona los correos relacionados
		$emails = $this->notificacion_modelo->selecMails($Filtro);
			//los manda desde la dirección correspondiente
			$this->email->from('admin@admin.com'); //agregar direccion
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

}

/* End of file notificacion.php */
/* Location: ./application/controllers/notificacion.php */ 