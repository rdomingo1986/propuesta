<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserTypes extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('UserTypesModel','usertypes');
    header('Content-Type: application/json');
  }

  public function listAll() {
    echo json_encode($this->usertypes->listAll());
  }
}
