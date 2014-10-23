<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 public class MY_Controller extends CI_Controller {
    protected $data = array();
    
    public function __construct() {
        parent::__construct();
        $this->load_defaults();
    }
    
    public function load_defaults() {
       $this->data['pageTitle'] = 'Page Title';
    }
}
?> 