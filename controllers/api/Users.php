<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('UsersModel','users');
    header('Content-Type: application/json');
  }

	public function signIn() {
		echo json_encode($this->users->signIn());
  }

  public function signOut() {
		echo json_encode($this->users->signOut());
  }

  public function requestPasswordRecovery() {
    echo json_encode($this->users->requestPasswordRecovery());
  }
  
  public function changePassword() {
    echo json_encode($this->users->changePassword());
  }

  public function usersListTable() {
    echo json_encode($this->users->usersListTable());
  }

  public function getById() {
    echo json_encode($this->users->getById());
  }

  public function register() {
    echo json_encode($this->users->register());
  }

  public function edit() {
    echo json_encode($this->users->edit());
  }

  public function resetPassword() {
    echo json_encode($this->users->resetPassword());
  }

  public function listDrivers() {
    echo json_encode($this->users->listDrivers());
  }
}
