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


	}

	public function index()
	{
		if (!isset($_SESSION['username'])) {
			redirect('/admin/login');
		}
		$data = array(
			'title' => 'Admin',
			'query' => $this->admin_model->get_imagesDesc(),
			'query1' =>$this->admin_model->get_imagesFilter()
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

		$config['upload_path'] = 'images/banners';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2000';
		$config['max_height']  = '800';

		$this->load->library('MY_Upload', $config);	

		if ( ! $this->upload->do_multi_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			//obtener los datos de upload
			$var = 1;
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
   			        'url' 		=> 'images/banners/'. $data['upload_data']['file_name'] ,
   			        'link' 		=> base_url("image"),
				    'nombre' 	=> $data['upload_data']['file_name'],
				    'padre'  	=> $this->input->post('padre')
				);

			// echo '<pre>';
			// print_r($insert);
			// echo '</pre>';
			
			$this->admin_model->insert_images('images',$insert);
			//redirect('admin');

			//$this->load->view('upload_succes', $insert);

		}

		if(is_file($config['upload_path']))
		{
		    chmod($config['upload_path'], 777); ## this should change the permissions
		}


		$dataForm = array(
		 	'Descripcion' 	=> $this->input->post('descripcion'),
		 	'Tipo'			=> $this->input->post('inmueble'),
		 	'Status'		=> $this->input->post('Status'),
		 	'Condiciones'	=> $this->input->post('condiciones'),
		 	'CalleNo'		=> $this->input->post('CalleNumero'),
		 	'Colonia'		=> $this->input->post('Colonia'),
		 	'Delegacion'	=> $this->input->post('Delegacion'),
		 	'CP'			=> $this->input->post('CodigoPostal')
		);

		$Filter = $this->input->post('Filtro');

		$this->admin_model->update_data('imagefilters', $dataForm,$Filter);

		foreach ($dataForm as $item => $value) {
			echo $value, '<br>';
		}

		echo $Filter;
		// redirect('admin');

	}

	public function getContactData(){
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */