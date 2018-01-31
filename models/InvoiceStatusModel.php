<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceStatusModel extends CI_Model {

	public function listAll() {
    $result = $this->db->from('invoice_status')
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
