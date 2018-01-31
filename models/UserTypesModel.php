<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserTypesModel extends CI_Model {

	public function listAll() {
    $result = $this->db->from('user_types')
      ->where('id !=', 1)
			->order_by('id','ASC')
      ->get()
      ->result();

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
	}
}
