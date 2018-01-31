<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('SettingsModel','settings');
    header('Content-Type: application/json');
  }

  public function listAll() {
    echo json_encode($this->settings->listAll());
  }

  public function updateAll() {
    echo json_encode($this->settings->updateAll());
  }
}
