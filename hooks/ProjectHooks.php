<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectHooks {

  private $rules = [
    'users' => [
      'signin' => [
        'validationRule' => 'sign-in'
      ],
      'requestpasswordrecovery' => [
        'validationRule' => 'request-password-recovery'
      ],
      'changepassword' => [
        'validateSignIn' => true,
        'validationRule' => 'change-password'
      ],
      'listall' => [
        'validateSignIn' => true
      ],
      'register' => [
        
        'validationRule' => 'register-user'
      ],
      'getbyid' => [
        'validateSignIn' => true,
        'validationRule' => 'get-by-id'
      ],
      'edit' => [
        'validateSignIn' => true,
        'validationRule' => 'edit-user'
      ],
      'resetpassword' => [
        'validateSignIn' => true,
        'validationRule' => 'reset-password'
      ],
      'listdrivers' => [
        'validateSignIn' => true
      ]
    ],
    'settings' => [
      'updateall' => [
        'validateSignIn' => true,
        'validationRule' => 'update-all'
      ]
    ],
    'customers' => [
      'listall' => [
        'validateSignIn' => true
      ],
      'register' => [
        'validateSignIn' => true,
        'validationRule' => 'register-customer'
      ],
      'getbyid' => [
        'validateSignIn' => true,
        'validationRule' => 'get-by-id'
      ],
      'edit' => [
        'validateSignIn' => true,
        'validationRule' => 'edit-customer'
      ],
      'search' => [
        'validateSignIn' => true,
        'validationRule' => 'search-customer'
      ]
    ],
    'products' => [
      'listall' => [
        'validateSignIn' => true
      ],
      'register' => [
        'validateSignIn' => true,
        'validationRule' => 'register-product'
      ],
      'getbyid' => [
        'validateSignIn' => true,
        'validationRule' => 'get-by-id'
      ],
      'edit' => [
        'validateSignIn' => true,
        'validationRule' => 'edit-product'
      ],
    ],
    'invoices' => [
      'listall' => [
        'validateSignIn' => true
      ],
      'register' => [
        'validateSignIn' => true,
        'validationRule' => 'register-invoice'
      ],
      'getbyid' => [
        'validateSignIn' => true,
        'validationRule' => 'get-by-id'
      ],
      'edit' => [
        'validateSignIn' => true,
        'validationRule' => 'edit-invoice'
      ]
    ],
    'deliverystatus' => [
      'listall' => [
        'validateSignIn' => true
      ]
    ]
  ];

  public function __construct() { }

  public function isSignIn() {
    $CI =& get_instance();
    
    if(isset($this->rules[ strtolower($CI->router->class) ][ strtolower($CI->router->method) ]['validateSignIn'])) {
      if(!isset($CI->session->id)) {
        header('Content-Type: application/json');
        echo json_encode([
          'status' => 'sessionError',
          'messages' => 'You don\'t have a session in the server',
          'code' => 900,
          'data' => []
        ]);
        exit;
      }
    }
  }

  public function validateInputData() {
    $CI =& get_instance();

    if(isset($this->rules[ strtolower($CI->router->class) ][ strtolower($CI->router->method) ]['validationRule'])) {
      $rule = $this->rules[ strtolower($CI->router->class) ][ strtolower($CI->router->method) ]['validationRule'];
      if($CI->form_validation->run($rule) === false) {
        header('Content-Type: application/json');
        echo json_encode([
          'status' => 'validationError',
          'messages' => 'You have errors in your input data',
          'code' => 800,
          'data' => $CI->form_validation->error_array()
        ]);
        exit;
      }
    }
  }
}
