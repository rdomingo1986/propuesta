<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentsModel extends CI_Model {

	public function getByInvoiceId($invoiceId) {
    $result = $this->db->from('payments')
      ->where('invoice_id', $invoiceId)
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
