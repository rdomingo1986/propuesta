<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeliveryStatus extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('DeliveryStatusModel','deliverystatus');
    header('Content-Type: application/json');
  }

  public function listAll() {
    echo json_encode($this->deliverystatus->listAll());
  }
}
