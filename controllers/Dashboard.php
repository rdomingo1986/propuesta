<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct() {
    parent::__construct();
    header('Content-Type: text/html');
  }

	public function index() {
    if(!isset($this->session->id)) { 
      redirect(base_url());
      exit;
    }
    if($this->session->isTempPass == 1) {
      redirect(base_url('RecoveryPassword'));
      exit;
    }
		$this->load->view('Dashboard/dashboard_view');
	}
}
