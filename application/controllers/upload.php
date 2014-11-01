<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');

	}


	function upload_images()
	{
		$config['upload_path'] = 'assets/images/sld';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);	
		if ( ! $this->upload->do_upload())
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
   			        'url' 		=> 'assets/images/sld/'. $data['upload_data']['file_name'] ,
   			        'link' 		=> base_url("image"),
				    'nombre' 	=> $data['upload_data']['file_name'],
				    'padre'  	=> $this->input->post('padre')
				);

			// echo '<pre>';
			// print_r($insert);
			// echo '</pre>';
			
			$this->admin_model->insert_images('images',$insert);
			redirect('admin');

			//$this->load->view('upload_succes', $insert);

		}

		if(is_file($config['upload_path']))
		{
		    chmod($config['upload_path'], 777); ## this should change the permissions
		}
	}

}

/* End of file upload.php */
/* Location: ./application/controllers/upload.php */