<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceItemsModel extends CI_Model {

	public function getByInvoiceId($invoiceId) {
    $result = $this->db->select('
      id AS invoiceItemId,
      invoice_id,
      product_id AS id,
      product_code AS code,
      product_description AS description,
      product_price AS price
    ')
    ->from('invoice_items')
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
