<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeliveryStatusModel extends CI_Model {

	public function listAll() {
    $result = $this->db->from('delivery_status')
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
