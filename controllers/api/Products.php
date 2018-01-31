<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('ProductsModel','products');
    header('Content-Type: application/json');
  }

	public function listAll() {
		echo json_encode($this->products->listAll());
  }

  public function getById() {
    echo json_encode($this->products->getById());
  }

  public function register() {
    echo json_encode($this->products->register());
  }

  public function edit() {
    echo json_encode($this->products->edit());
  }
}
