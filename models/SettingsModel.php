<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {

	public function listAll() {
    $result = $this->db->order_by('id','ASC')
      ->get('company_metas')
      ->result();

    $result[] = base_url();
    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
  }
  
  public function updateAll() {
    $companyLogo = $this->db->select('mvalue')
      ->where('mkey', 'COMPANY_LOGO')
      ->get('company_metas')
      ->row()
      ->mvalue;
    
    foreach($_POST AS $metaKey => $metaValue) {
      $this->db->where('mkey', strtoupper($metaKey))
        ->update('company_metas', [
          'mvalue' => $metaValue
        ]);
    }

    $image = '';
    if(!empty($_FILES['COMPANY_LOGO'])) {
      $image = date('Ymd_His') . '.' . explode('/', $_FILES['COMPANY_LOGO']['type'])[1];

      if(move_uploaded_file($_FILES['COMPANY_LOGO']['tmp_name'],'./uploads/' . $image)){
        if(trim($companyLogo) === '') {
          unlink('./uploads/' . $companyLogo);
        }
      }
    }

    $this->db->where('mkey', 'COMPANY_LOGO')
      ->update('company_metas', [
        'mvalue' => $image == '' ? $companyLogo : $image
      ]);

    return [
      'status' => 'success',
      'message' => 'Data have been updated',
      'code' => 0,
      'data' => $image == '' ? null : base_url() . 'uploads/' . $image
    ];
  }
  
  public function isValidURL() {
    return empty($this->input->post('COMPANY_WEB_SITE')) || preg_match('/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)$/', $this->input->post('COMPANY_WEB_SITE')) ? true : false;
  }

  public function isValidEmail() {
		return preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $this->input->post('COMPANY_EMAIL')) ? true : false;
	}
}
