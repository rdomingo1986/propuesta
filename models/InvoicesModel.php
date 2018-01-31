<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoicesModel extends CI_Model {

	public function invoicesListTable() {
    $result = $this->db->select('invoices.*, invoice_status.name AS status, costumers.name, costumers.phone_number, costumers.mobile_number')
      ->from('invoices')
      ->join('invoice_status', 'invoice_status.id=invoices.invoicestatus_id', 'left')
      ->join('costumers', 'costumers.id=invoices.costumer_id', 'left')
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
  
  public function register() {
    $items = $this->input->post('items');
    $payments = $this->input->post('payments');

    $res = $this->db->insert('invoices', [
      'costumer_id' => $this->input->post('customerId'),
      'receiver_id' => $this->input->post('receiverId') == '0' ? null : $this->input->post('receiverId'),
      'driver_id' => $this->input->post('driverId') == '0' ? null : $this->input->post('driverId'),
      'deliverystatus_id' => $this->input->post('deliveryStatusId') == '0' ? null : $this->input->post('deliveryStatusId'),
      'invoicestatus_id' => $this->input->post('invoiceStatusId') == '0' ? null : $this->input->post('invoiceStatusId'),
      'register_date' => date('Y-m-d H:i:s', time())
    ]);
    
    $invoiceId = $this->db->insert_id();
    $totalPrice = 0;
    if(count($items) > 0) {
      foreach($items AS $item) {
        $totalPrice += $item['price'];
        $res = $this->db->insert('invoice_items', [
          'invoice_id' => $invoiceId,
          'product_id' => $item['id'],
          'product_code' => $item['code'],
          'product_description' => $item['description'],
          'product_price' => $item['price']
        ]);
      }
      $res = $this->db->where('id', $invoiceId)
        ->update('invoices', [
        'total_price' => $totalPrice
      ]);
    }

    $totalPayed = 0;
    if(count($payments) > 0) {
      foreach($payments AS $payment) {
        $totalPayed += $payment['amount'];
        $res = $this->db->insert('payments', [
          'invoice_id' => $invoiceId,
          'amount' => $payment['amount'],
          'payment_date' => $payment['payment_date']
        ]);
      }
      $res = $this->db->where('id', $invoiceId)
        ->update('invoices', [
        'payed_amount' => $totalPayed,
        'unpayed_amount' => $totalPrice - $totalPayed
      ]);
    }

    return [
      'status' => 'success',
      'message' => 'Invoice has been created.',
      'code' => 0,
      'data' => $invoiceId
    ];
  }

  public function getById() {
    $invoiceId = $this->input->post('id');
    $result = $this->db->select('
      costumers.id AS c_id,
      costumers.name AS c_name,
      costumers.phone_number AS c_phone_number,
      costumers.mobile_number AS c_mobile_number,
      costumers.email AS c_email,
      costumers.address AS c_address,
      costumers.notes AS c_notes,
      receivers.id AS r_id,
      receivers.name AS r_name,
      receivers.phone_number AS r_phone_number,
      receivers.mobile_number AS r_mobile_number,
      receivers.email AS r_email,
      receivers.address AS r_address,
      receivers.notes AS r_notes,
      invoices.*,
      invoices.id AS invoiceId,
    ')
    ->from('invoices')
    ->join('costumers', 'costumers.id=invoices.costumer_id', 'left')
    ->join('costumers AS receivers', 'receivers.id=invoices.receiver_id', 'left')
    ->where('invoices.id', $invoiceId)
    ->get()
    ->row_array();

    $this->load->model('InvoiceItemsModel', 'invoiceitems');
    $result['items'] = $this->invoiceitems->getByInvoiceId($invoiceId);

    $this->load->model('PaymentsModel', 'payments');
    $result['payments'] = $this->payments->getByInvoiceId($invoiceId);

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
  }

  public function edit() {
    $items = $this->input->post('items');
    $payments = $this->input->post('payments');
    $invoiceId = $this->input->post('id');

    $res = $this->db->where('id', $invoiceId)
      ->update('invoices', [
      'receiver_id' => $this->input->post('receiverId') == '0' ? null : $this->input->post('receiverId'),
      'driver_id' => $this->input->post('driverId') == '0' ? null : $this->input->post('driverId'),
      'deliverystatus_id' => $this->input->post('deliveryStatusId') == '0' ? null : $this->input->post('deliveryStatusId'),
      'invoicestatus_id' => $this->input->post('invoiceStatusId') == '0' ? null : $this->input->post('invoiceStatusId')
    ]);

    $res = $this->db->where('invoice_id', $invoiceId)
      ->delete('invoice_items');

    $res = $this->db->where('invoice_id', $invoiceId)
      ->delete('payments');

    $totalPrice = 0;
    if(count($items) > 0) {
      $totalPrice = 0;
      foreach($items AS $item) {
        $totalPrice += $item['price'];
        $res = $this->db->insert('invoice_items', [
          'invoice_id' => $invoiceId,
          'product_id' => $item['id'],
          'product_code' => $item['code'],
          'product_description' => $item['description'],
          'product_price' => $item['price']
        ]);
      }
    }
    $res = $this->db->where('id', $invoiceId)
      ->update('invoices', [
      'total_price' => $totalPrice
    ]);

    $totalPayed = 0;
    if(count($payments) > 0) {
      foreach($payments AS $payment) {
        $totalPayed += $payment['amount'];
        $res = $this->db->insert('payments', [
          'invoice_id' => $invoiceId,
          'amount' => $payment['amount'],
          'payment_date' => $payment['payment_date']
        ]);
      }
      
    }
    $res = $this->db->where('id', $invoiceId)
      ->update('invoices', [
      'payed_amount' => $totalPayed,
      'unpayed_amount' => $totalPrice - $totalPayed
    ]);

    return [
      'status' => 'success',
      'message' => 'Invoice has been edited.',
      'code' => 0,
      'data' => []
    ];
  }
}
