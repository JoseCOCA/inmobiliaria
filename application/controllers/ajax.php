<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if($Filtro = $this->input->post('id')){ //Agregar nombre del post de ajax;
			$query = $this->admin_model->get_desc($Filtro);
		    echo json_encode($query);
		}else{
			echo "something get wrong";
		}

	}
	
	public function getContentData(){
		$padre = isset($_GET['padre']) ? $_GET['padre'] : '1';
		echo json_encode($this->admin_model->getContent($padre));
	}


	public function getBanners(){
		$padre = isset($_GET['banner']) ? $_GET['banner'] : 'principal';
		echo json_encode($this->admin_model->get_banner());

	}
	

}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */