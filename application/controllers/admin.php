<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct(){
		parent::__construct();

		session_start();
		$this->load->model('admin_model');
		$error = "";
		$this->load->helper(array('form', 'url'));


	}

	public function index()
	{
		if (!isset($_SESSION['username'])) {
			redirect('/admin/login');
		}
		$data = array(
			'title' 	=> 	'Admin',
			'query' 	=> 	$this->admin_model->get_imagesDesc(),
			'query1' 	=>	$this->admin_model->get_imagesFilter(),
			'lastFilter' 	=>	$this->admin_model->lastFilter(),
			);
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/admin_view',$data);
		$this->load->view('admin/footer_admin');
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

		if ($this->form_validation->run() !== false) {

			$this->load->model('admin_model');
		    $res = $this
		    		->admin_model
		    		->verify_user(
		    			$this->input->post('email_address'),
		    			$this->input->post('password')
		    			);

		    if ($res !== false) {

		    	$_SESSION['username'] = $this->input->post('email_address');
		    	redirect('admin');
		    }
		}
		$this->load->view('login_view');
	}

	public function logout(){
		session_unset();
		redirect('admin/login');
	}

	public function getData(){

		//$this->load->library('MY_Upload');

		$config = array(

	        "upload_path"   => "images/banners",
	        "allowed_types" => "gif|jpg|png",
			"max_size"		=> "1000",
			"max_width"  	=> "2000",
			"max_height"	=> "800",

		);

		$configRules = array(
		               array(
		                     'field'   => 'inmueble',
		                     'label'   => 'Tipo de Inmmueble',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'Status',
		                     'label'   => 'Status',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'CalleNumero',
		                     'label'   => 'Calle y número',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'Colonia',
		                     'label'   => 'Colonia',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'Delegacion',
		                     'label'   => 'Delegación',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'CodigoPostal',
		                     'label'   => 'Codigo Postal',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'descripcion',
		                     'label'   => 'Descripcion',
		                     'rules'   => 'required'
		                  ),
		            );

		$this->form_validation->set_rules($configRules);



		switch ($this->input->post('adminPanel')) {

			case 'Eliminar Imagenes':

				$FilesToDelete = $this->input->post('delete');

				foreach ($FilesToDelete as $name) {

					$this->db->delete('imagedesc',array('nombre' => $name) );

					// unlink('images/banners/'.$name);
				}


				// redirect('admin');
				// 
				echo 'ok';
				break;

			case 'Agregar imagenes':

 			// 	$this->upload->initialize($config);

				// if ( $this->upload->do_multi_upload("files"))
				// {
				// 	//obtener los datos de upload

				// 	$Filter = $this->input->post('Filtro');

				// 	$data = array('upload_data' => $this->upload->get_multi_upload_data());


				// 	$Length = count($data['upload_data']);

				// 	echo $Length;

				// 	for ($i=0; $i < $Length; $i++) {

				// 		$insert = array(
				// 				'url' 		=> 'images/banners/'. $data['upload_data'][$i]['file_name'] ,
		  //  			        	'Filtro'	=> $Filter,
		  //  			        	'nombre'	=> $data['upload_data'][$i]['file_name']
				// 		);
				// 	$this->admin_model->insert_images('imagedesc',$insert);

				// 	}

				// 	if(is_file($config['upload_path'])){

				// 	    chmod($config['upload_path'], 777); ## this should change the permissions

				// 	}

				// 	// redirect('admin');
				// 	// 
				// 	echo 'ok';
				// }
				// else
				// {

				// 	$error = array('error' => $this->upload->display_errors());
					
				// 	echo '10';
				// 	echo $error;
				// 	// $this->load->view('upload_form', $error);

				// }

				// break;

				// $allowed = array('png', 'jpg', 'gif','zip');

				// if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

				// 	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

				// 	if(!in_array(strtolower($extension), $allowed)){
				// 			echo '{"status":"error"}';
				// 		exit;
				// 		}

				// 		if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
				// 			echo '{"status":"success"}';
				// 		exit;
				// 	}
				// }

				// echo '{"status":"error"}';
				// exit;
				$insert = array(

					'Filtro'      => $this->input->post('Filtro'),
					'nombre'      => $this->input->post('nombre'),
					'url'         => 'images/banners/'.$this->input->post('nombre'),
					'principal'   => '0',
					'recomendado' => '0'
				
				);
				if($this->admin_model->insert_images('imagedesc',$insert)){
					echo 'ok';
				}else{
					echo 'error';
				}
				
				break;
			case 'Modificar':


				if ($this->form_validation->run() == FALSE) {

					// $this->load->view('errorsPage');
					echo validation_errors();

				}else{

					$Filter = array('Filtro' => $this->input->post('Filtro') );
					$dataForm = array(
					 	'Descripcion' 	=> $this->input->post('descripcion'),
					 	'Tipo'			=> $this->input->post('inmueble'),
					 	'Status'		=> $this->input->post('Status'),
					 	'Condiciones'	=> $this->input->post('condiciones'),
					 	'CalleNo'		=> $this->input->post('CalleNumero'),
					 	'Colonia'		=> $this->input->post('Colonia'),
					 	'Delegacion'	=> $this->input->post('Delegacion'),
					 	'CP'			=> $this->input->post('CodigoPostal'),
					 	'Dimension'		=> $this->input->post('dimensiones'),
					 	'Precio'		=> $this->input->post('precio')
						);

					$padre1  	= 	$this->input->post('principal');
					$padre2  	=	$this->input->post('recomendado');

					if($padre1 or $padre2 != '0'){

						echo $padre1;
						echo $padre2;

						$filtroPrincipal = array(

						'Filtro' => $this->input->post('Filtro'),
						'nombre' => $padre1

						);

						if ($padre1 != '0') {
							$this->admin_model->update_data('imagedesc',array('principal'=>'1'),$filtroPrincipal);
						}


						$filtroRecomendado = array(

						'Filtro' => $this->input->post('Filtro'),
						'nombre' => $padre2

						);

						if ($padre2 != '0') {

							$this->admin_model->update_data('imagedesc',array('recomendado'=>'1'),$filtroRecomendado);

						}

					}else{

						$filtro = array(

						'Filtro' => $this->input->post('Filtro'),

						);

						$this->admin_model->update_data('imagedesc',array('principal'=>'0'),$filtro);

						$this->admin_model->update_data('imagedesc',array('recomendado'=>'0'),$filtro);


					}

						$this->admin_model->update_data('imagefilters', $dataForm,$Filter);


						// redirect('admin');
						// 
						echo 'ok';

				}


						break;

				case 'Eliminar':

					$Filter = $this->input->post('Filtro');

					$this->db->delete('imagefilters',array('Filtro' => $Filter) );
					$this->db->delete('imageDesc', array('Filtro' => $Filter));

					redirect('admin');

				break;
				
				case 'Nueva Propiedad':
				
				$insert = array(

					'Filtro'      => $this->input->post('Filtro'),
					'nombre'      => $this->input->post('nombre'),
					'url'         => 'images/filtros/'.$this->input->post('imagen'),
					'Status'   => 'NO DISPONIBLE'
				
				);
				if($this->admin_model->insert_images('imagefilters',$insert)){
					echo 'ok';
				}else{
					echo 'error';
				}
				
				break;
				default:
					echo 'nel';
				break;
		}


	}

	public function newFilter()
	{
		$config['upload_path'] = 'images/filtros';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '300';
		$config['max_height']  = '300';

		$this->upload->initialize($config);

		echo $config['upload_path'];

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			//obtener los datos de upload

			$data = array('upload_data' => $this->upload->data());
			$insert = array(
   			        'url' 		=> 'images/filtros/'. $data['upload_data']['file_name'] ,
				    'nombre' 	=> $_POST['propiedad-nombre']?$_POST['propiedad-nombre']:'PROPIEDAD X',
				    // 'nombre' 	=> $data['upload_data']['file_name'],
				    'Filtro'	=> $this->input->post('Filtro')
				);

			$this->admin_model->insert_images('imagefilters',$insert);

			// redirect('admin');

			//$this->load->view('upload_succes', $insert);

		}

		if(is_file($config['upload_path']))
		{
		    chmod($config['upload_path'], 777); ## this should change the permissions
		}
	}

	public function getContactData(){

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */