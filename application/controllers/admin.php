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
			'numRows' 	=>	$this->admin_model->numRows(),
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

		$this->load->library('MY_Upload');

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


				$upload_path_url = base_url().'uploads/';

				$config['upload_path'] = FCPATH.'uploads/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = '30000';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('upload', $error);

				} else {
					$data = $this->upload->data();
					/*
					        // to re-size for thumbnail images un-comment and set path here and in json array   
					$config = array(
					    'source_image' => $data['full_path'],
					    'new_image' => $this->$upload_path_url '/thumbs',
					    'maintain_ration' => true,
					    'width' => 80,
					    'height' => 80
					);

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					*/
					//set the data for the json array   
					$info->name = $data['file_name'];
					    $info->size = $data['file_size'];
					$info->type = $data['file_type'];
					    $info->url = $upload_path_url .$data['file_name'];
					// I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
					$info->thumbnail_url = $upload_path_url .$data['file_name'];
					    $info->delete_url = base_url().'upload/deleteImage/'.$data['file_name'];
					    $info->delete_type = 'DELETE';

					//this is why we put this in the constants to pass only json data
					if (IS_AJAX) {
					    echo json_encode(array($info));
					    //this has to be the only data returned or you will get an error.
					    //if you don't give this a json array it will give you a Empty file upload result error
					    //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)

					// so that this will still work if javascript is not enabled
					} else {
					    $file_data['upload_data'] = $this->upload->data();
					    $this->load->view('admin/upload_success', $file_data);
					}
				}
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