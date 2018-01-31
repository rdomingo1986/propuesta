<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomersModel extends CI_Model {

	public function listAll() {
    $result = $this->db->order_by('id','ASC')
      ->get('costumers')
      ->result();

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
  }

  public function getById() {
    $result = $this->db->from('costumers')
      ->where('id', $this->input->post('id'))
      ->get()
      ->row();

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];  
  }
  
  public function register() {
    $res = $this->db->insert('costumers', [
      'name' => $this->input->post('name'),
      'phone_number' => empty($this->input->post('phoneNumber')) ? NULL : $this->input->post('phoneNumber'),
      'mobile_number' => empty($this->input->post('mobileNumber')) ? NULL : $this->input->post('mobileNumber'),
      'email' => $this->input->post('email'),
      'notes' => empty($this->input->post('notes')) ? NULL : $this->input->post('notes'),
      'address' => $this->input->post('address')
    ]);

    return [
      'status' => 'success',
      'message' => 'Customer have been registered',
      'code' => 0,
      'data' => $this->db->insert_id()
    ];
  }

  public function edit() {
    $res = $this->db->where('id', $this->input->post('id'))
      ->update('costumers', [
				'name' => $this->input->post('name'),
        'phone_number' => empty($this->input->post('phoneNumber')) ? NULL : $this->input->post('phoneNumber'),
        'mobile_number' => empty($this->input->post('mobileNumber')) ? NULL : $this->input->post('mobileNumber'),
        'email' => $this->input->post('email'),
        'notes' => empty($this->input->post('notes')) ? NULL : $this->input->post('notes'),
        'address' => $this->input->post('address')
    ]);

    return [
      'status' => 'success',
      'message' => 'Customer have been edited',
      'code' => 0
    ];
  }

  public function search() {
    $result = $this->db->from('costumers')
      ->where('phone_number', $this->input->post('searchNumber'))
      ->or_where('mobile_number', $this->input->post('searchNumber'))
      ->get()
      ->row();

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
  }

  public function oneOfTwoNumbers() {
    return (($this->input->post('phoneNumber') != '' || $this->input->post('phoneNumber') != null) || ($this->input->post('mobileNumber') != '' || $this->input->post('mobileNumber') != null));
  }

  public function uniquePhoneNumber() {
    $where['phone_number'] = $this->input->post('phoneNumber');
    if(!empty($this->input->post('id'))) {
      $where['id !='] = $this->input->post('id');
    }
    $numRows = $this->db->select('id')
      ->from('costumers')
      ->where($where)
      ->get()
      ->num_rows();

    return $numRows === 0 ? true : false;
  }

  public function uniqueMobileNumber() {
    $where['mobile_number'] = $this->input->post('mobileNumber');
    if(!empty($this->input->post('id'))) {
      $where['id !='] = $this->input->post('id');
    }
    $numRows = $this->db->select('id')
      ->from('costumers')
      ->where($where)
      ->get()
      ->num_rows();

    return $numRows === 0 ? true : false;
  }

  public function uniqueEmail() {
    $where['email'] = $this->input->post('email');
    if(!empty($this->input->post('id'))) {
      $where['id !='] = $this->input->post('id');
    }
    $numRows = $this->db->select('id')
      ->from('costumers')
      ->where($where)
      ->get()
      ->num_rows();

    return $numRows === 0 ? true : false;
  }
}
