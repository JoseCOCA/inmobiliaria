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



	}

	public function index()
	{
		if (!isset($_SESSION['username'])) {
			redirect('/admin/login');
		}
		$data = array(
			'title' => 'Admin'

			);
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/admin_view');
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */