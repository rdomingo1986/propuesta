<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

	public function signIn() {
		$regex = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
		$field = preg_match($regex, $this->input->post('login')) ? 'email' : 'login';
		
		$res = $this->db->from('users')
			->where([
				$field => $this->input->post('login'),
				'password' => md5($this->input->post('password'))
			])
			->get()
			->row();

		if(!isset($res)) {
			return [
				'status' => 'error',
				'message' => 'Invalid login or password',
				'code' => 0
			];
		}

		$userData = [
			'id' => $res->id,
			'email' => $res->email,
			'userType' => $res->usertype_id,
			'isTempPass' => $res->is_temporal_pass
		];
		$this->session->set_userdata($userData);

		return [
			'status' => 'success',
			'message' => 'Welcome to the system',
			'code' => 0
		];
	}

	public function signOut() {
		$this->session->sess_destroy();

		return [
			'status' => 'success',
			'message' => '',
			'code' => 0
		];
	}

	public function requestPasswordRecovery() {
		$res = $this->db->select('email')
			->where('email', $this->input->post('email'))
			->get('users')
			->row();

		if(!isset($res)) {
			return [
				'status' => 'error',
				'message' => 'Email is not registered in the application',
				'code' => 0
			];
		}
		
		$this->load->helper('Utils');
		$password = Utils::generateRandomString(8);

		$this->db->where('email', $this->input->post('email'))
			->update('users', [
				'password' => md5($password),
				'is_temporal_pass' => 1
			]);

		$this->load->helper('Mailer');
		Mailer::sendMail(array(
			'mails' => array($res->email),
			'subject' => 'Temporal Password',
			'body' => 'Your temporal password is: '. $password
		));

		return [
			'status' => 'success',
			'message' => 'We have sent a temporal password to your email account ' . $res->email,
			'code' => 0
		];
	}

	public function changePassword() {
		$this->db->where([
			'id' => $this->session->id,
			'password' => md5($this->input->post('currentPassword'))
		])
		->update('users', [
			'password' => md5($this->input->post('password')),
			'is_temporal_pass' => 0
		]);

		if($this->db->affected_rows() === 1) {
			$this->session->set_userdata('isTempPass', 0);
			return [
				'status' => 'success',
				'message' => 'Password has been changed',
				'code' => 0
			];
		}
		
		return [
			'status' => 'error',
			'message' => 'Incorrect current password',
			'code' => 0
		];
	}

	public function usersListTable() {
		$result = $this->db->select('users.id, users.login, users.email, user_types.name AS user_type')
			->from('users')
			->join('user_types', 'user_types.id=users.usertype_id')
			->where('users.id !=', $this->session->id)
			->where('users.usertype_id !=','1')
			->order_by('users.id','ASC')
      ->get()
      ->result();

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
	}

	public function listDrivers() {
		$result = $this->db->select('id, name')
			->from('users')
			->where('usertype_id', 5)
      ->get()
      ->result();

    return [
      'status' => 'success',
      'message' => '',
      'code' => 0,
      'data' => $result
    ];
	}

	public function getById() {
		$result = $this->db->select('*, \'null\' AS password')
			->from('users')
      ->where([
				'id' => $this->input->post('id'),
				'id !=' => $this->session->id
			])
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
    $res = $this->db->insert('users', [
      'login' => $this->input->post('login'),
      'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'usertype_id' => $this->input->post('usertype'),
			'name' => $this->input->post('name'),
			'country' => $this->input->post('country'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'zip_code' => $this->input->post('zip_code'),
			'address' => $this->input->post('address')
    ]);

    return [
      'status' => 'success',
      'message' => 'User have been registered',
      'code' => 0
    ];
	}
	
	public function edit() {
    $res = $this->db->where('id', $this->input->post('id'))
      ->update('users', [
				'login' => $this->input->post('login'),
				'email' => $this->input->post('email'),
				'usertype_id' => $this->input->post('usertype'),
				'name' => $this->input->post('name'),
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city'),
				'zip_code' => $this->input->post('zip_code'),
				'address' => $this->input->post('address')
    ]);

    return [
      'status' => 'success',
      'message' => 'User have been edited',
      'code' => 0
    ];
	}
	
	public function resetPassword() {
		$res = $this->db->where('id', $this->input->post('id'))
			->update('users', [
				'password' => md5($this->input->post('password')),
				'is_temporal_pass' => 1
			]);

		$email = $this->db->select('email')
			->from('users')
			->where('id', $this->input->post('id'))
			->get()
			->row()
			->email;

		$this->load->helper('Mailer');
		Mailer::sendMail(array(
			'mails' => array($email),
			'subject' => 'Temporal Password',
			'body' => 'Your temporal password is: '. $this->input->post('password')
		));

		return [
			'status' => 'success',
			'message' => 'User\'s password have been reseted',
			'code' => 0
		];
	}

	public function uniqueLogin() {
		$where['login'] = $this->input->post('login');
    if(!empty($this->input->post('id'))) {
      $where['id !='] = $this->input->post('id');
    }
    $numRows = $this->db->select('id')
      ->from('users')
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
      ->from('users')
      ->where($where)
      ->get()
      ->num_rows();

    return $numRows === 0 ? true : false;
	}
	
	public function isValidEmail() {
		return preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $this->input->post('email')) ? true : false;
	}
}
