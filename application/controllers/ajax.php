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

}

/* End of file request.php */
/* Location: ./application/controllers/request.php */ 