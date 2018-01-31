<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('InvoicesModel','invoices');
    header('Content-Type: application/json');
  }

  public function invoicesListTable() {
    echo json_encode($this->invoices->invoicesListTable());
  }

  public function register() {
    echo json_encode($this->invoices->register());
  }

  public function getById() {
    echo json_encode($this->invoices->getById());
  }

  public function edit() {
    echo json_encode($this->invoices->edit());
  }
}
