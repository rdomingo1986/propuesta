<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
    header('Content-Type: text/html');
  }

	public function index() {
    if(isset($this->session->id)) { 
      redirect(base_url('Dashboard'));
      exit;
    }
		$this->load->view('Login/login_view');
	}
}
