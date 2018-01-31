<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceStatus extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('InvoiceStatusModel','invoicestatus');
    header('Content-Type: application/json');
  }

  public function listAll() {
    echo json_encode($this->invoicestatus->listAll());
  }
}
