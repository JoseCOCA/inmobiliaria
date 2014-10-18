<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {

/* This is where are the templates */

	function public_file(){
		$this->load->view('public_file');
	}

	function admin(){
		$this->load->view('admin');
	}
	function work_template(){
		$this->load->view('work_template');
	}

}

/* End of file template.php */
/* Location: ./application/modules/template.php */