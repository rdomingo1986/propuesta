<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('CustomersModel','customers');
    header('Content-Type: application/json');
  }

	public function listAll() {
		echo json_encode($this->customers->listAll());
  }

  public function getById() {
		echo json_encode($this->customers->getById());
  }

  public function register() {
    echo json_encode($this->customers->register());
  }

  public function edit() {
    echo json_encode($this->customers->edit());
  }

  public function search() {
    echo json_encode($this->customers->search());
  }
}
