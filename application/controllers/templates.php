<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends CI_Controller {

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

	public function index()
	{
		$data = array(
			'title' => 'Home'

			);
		$this->load->view('header',$data);
		$this->load->view('public/home');
		$this->load->view('footer');
	}
	public function admin(){
		//$this->load->view('header');
		$this->load->view('admin/admin');
		//$this->load->view('footer');
	}
	public function info(){
		$data = array(
			'title' => 'info'

			);
		$this->load->view('header',$data);
		$this->load->view('public/info');
		$this->load->view('footer');
	}
	public function privacy(){
		$data = array(
			'title' => 'privacy'

			);
		$this->load->view('header',$data);
		$this->load->view('public/privacy');
		$this->load->view('footer');
	}

	public function terms(){
		$data = array(
			'title' => 'terms'

			);
		$this->load->view('header',$data);
		$this->load->view('public/terms');
		$this->load->view('footer');
	}


}