<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsModel extends CI_Model {

	public function listAll() {
    $result = $this->db->order_by('id','ASC')
      ->get('products')
      ->result();

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
  }

  public function getById() {
    $result = $this->db->from('products')
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
    $res = $this->db->insert('products', [
      'code' => $this->input->post('code'),
      'description' => $this->input->post('description'),
      'price' => $this->input->post('price')
    ]);

    return [
      'status' => 'success',
      'message' => 'Product have been registered',
      'code' => 0
    ];
  }

  public function edit() {
    $res = $this->db->where('id', $this->input->post('id'))
      ->update('products', [
      'code' => $this->input->post('code'),
      'description' => $this->input->post('description'),
      'price' => $this->input->post('price')
    ]);

    return [
      'status' => 'success',
      'message' => 'Product have been edited',
      'code' => 0
    ];
  }

  public function uniqueCode() {
    $where['code'] = $this->input->post('code');
    if(!empty($this->input->post('id'))) {
      $where['id !='] = $this->input->post('id');
    }
    $numRows = $this->db->select('id')
      ->from('products')
      ->where($where)
      ->get()
      ->num_rows();

    return $numRows === 0 ? true : false;
  }

  public function priceIsDecimal() {
    return preg_match('/^(\d+|\d+[.]\d{1,2})$/', $this->input->post('price')) ? true : false;
  }
}
