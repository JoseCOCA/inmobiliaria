<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}

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
			'title' => 'Inicio - Inmobiliaria',
			'query' => $this->admin_model->get_imagesDesc(),
			'query1' => $this->admin_model->get_imagesFilter(),
			'contenido' => $this->admin_model->getContent('1')
			);
		$this->load->view('header',$data);
		$this->load->view('public/home');
		$this->load->view('footer');
	}
	public function info(){
		$data = array(
			'title' => 'info',
			'query' => $this->admin_model->get_imagesDesc(),
			'query1' => $this->admin_model->get_imagesFilter(),
			'contenido' => $this->admin_model->getContent('2')
			);
		$this->load->view('header',$data);
		$this->load->view('public/info');
		$this->load->view('footer2');
	}
	public function privacy(){
		$data = array(
			'title' => 'privacy',
			'query' => $this->admin_model->get_imagesDesc(),
			'query1' => $this->admin_model->get_imagesFilter(),
			'contenido' => $this->admin_model->getContent('3')
			);
		$this->load->view('header',$data);
		$this->load->view('public/privacy');
		$this->load->view('footer2');
	}

	public function terms(){
		$data = array(
			'title' => 'terms',
			'query' => $this->admin_model->get_imagesDesc(),
			'query1' => $this->admin_model->get_imagesFilter(),
			'contenido' => $this->admin_model->getContent('4')
			);
		$this->load->view('header',$data);
		$this->load->view('public/terms');
		$this->load->view('footer2');
	}

	public function contacto()
	{
		$this->load->view('contactForm');
	}

	public function descripcion()
	{
		$this->load->view('getDescription');
	}


}