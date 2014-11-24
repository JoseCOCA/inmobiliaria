<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data = array(
			'query' => $this->admin_model->get_desc()
			);
		echo json_encode($data);
	}

}

/* End of file request.php */
/* Location: ./application/controllers/request.php */ 