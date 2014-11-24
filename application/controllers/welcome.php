<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	function __construct()
	    {
	        parent::__construct();
			$this->load->model('admin_model');
	    }

	public function index()
	{
	    $this->load->view('home');
	}

	function increase(){
	   echo 'algo';
	}


}