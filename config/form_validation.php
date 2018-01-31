<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->model('CustomersModel','customers');
$CI->load->model('ProductsModel','products');
$CI->load->model('UsersModel','users');
$CI->load->model('SettingsModel','settings');

$config['sign-in'] = [
  [
    'field' => 'login',
    'label' => 'login',
    'rules' => 'trim|required',
    'errors' => [
      'required' => 'Must provide your username or email'
    ]
  ],
  [
    'field' => 'password',
    'label' => 'password',
    'rules' => 'required',
    'errors' => [
      'required' => 'Must provide a password'
    ]
  ]
];

$config['request-password-recovery'] = [
  [
    'field' => 'email',
    'label' => 'email',
    'rules' => [
      'trim',
      'required',
      ['isValidEmail', [$CI->users, 'isValidEmail']]
    ],
    'errors' => [
      'required' => 'Must provide a valid email address',
      'isValidEmail' => 'Must provide a valid email address'
    ]
  ]
]; 

$config['change-password'] = [
  [
    'field' => 'currentPassword',
    'label' => 'currentPassword',
    'rules' => 'required',
    'errors' => [
      'required' => 'Must provide the current password'
    ]
  ],
  [
    'field' => 'password',
    'label' => 'password',
    'rules' => 'required|min_length[8]',
    'errors' => [
      'required' => 'Must provide a password',
      'min_length' => 'Password must contain at least 8 characters'
    ]
  ],
  [
    'field' => 'passwordRepeat',
    'label' => 'passwordRepeat',
    'rules' => 'required|matches[password]',
    'errors' => [
      'required' => 'Must provide a password',
      'matches' => 'The password repeat field do not match with the password field'
    ]
  ]
];

$config['update-all'] = [
  [
    'field' => 'COMPANY_NAME',
    'label' => 'COMPANY_NAME',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a company name'
    ]
  ],
  [
    'field' => 'COMPANY_EMAIL',
    'label' => 'COMPANY_EMAIL',
    'rules' => [
      'trim',
      'required',
      'max_length[255]',
      ['isValidEmail', [$CI->settings, 'isValidEmail']]
    ],
    'errors' => [
      'required' => 'Must provide a valid email',
      'isValidEmail' => 'Must provide a valid email'
    ]
  ],
  [
    'field' => 'COMPANY_ADDRESS',
    'label' => 'COMPANY_ADDRESS',
    'rules' => 'required|max_length[255]',
    'errors' => [
      'required' => 'Must provide an address'
    ]
  ],
  [
    'field' => 'COMPANY_PHONE_NUMBER',
    'label' => 'COMPANY_PHONE_NUMBER',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a phone number'
    ]
  ],
  [
    'field' => 'COMPANY_WEB_SITE',
    'label' => 'COMPANY_WEB_SITE',
    'rules' => [
      'trim',
      ['isValidURL', [$CI->settings, 'isValidURL']]
    ],
    'errors' => [
      'isValidURL' => 'Must provide a valid URL'
    ]
  ]
];

$config['get-by-id'] = [
  [
    'field' => 'id',
    'label' => 'id',
    'rules' => 'trim|required|numeric'
  ]
];

$config['register-customer'] = [
  [
    'field' => 'name',
    'label' => 'name',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a customer full name'
    ]
  ],
  [
    'field' => 'phoneNumber',
    'label' => 'phoneNumber',
    'rules' => [
      'trim',
      'max_length[50]',
      ['oneOfTwoNumbers', [$CI->customers, 'oneOfTwoNumbers']],
      ['uniquePhoneNumber', [$CI->customers, 'uniquePhoneNumber']]
    ],
    'errors' => [
      'oneOfTwoNumbers' => 'Register at least one phone number',
      'uniquePhoneNumber' => 'Phone number already exist for another customer'
    ]
  ],
  [
    'field' => 'mobileNumber',
    'label' => 'mobileNumber',
    'rules' => [
      'trim',
      'max_length[50]',
      ['oneOfTwoNumbers', [ $CI->customers, 'oneOfTwoNumbers']],
      ['uniqueMobileNumber', [$CI->customers, 'uniqueMobileNumber']]
    ],
    'errors' => [
      'oneOfTwoNumbers' => 'Register at least one phone number',
      'uniqueMobileNumber' => 'Mobile number already exist for another customer'
    ]
  ],
  [
    'field' => 'email',
    'label' => 'email',
    'rules' => [
      'trim',
      'required',
      'max_length[255]',
      ['uniqueEmail', [$CI->customers, 'uniqueEmail']],
      ['isValidEmail', [$CI->users, 'isValidEmail']]
    ],
    'errors' => [
      'required' => 'Must provide a valid email',
      'isValidEmail' => 'Must provide a valid email',
      'uniqueEmail' => 'Email address already exist for another customer'
    ]
  ],
  [
    'field' => 'address',
    'label' => 'address',
    'rules' => 'trim|required|max_length[255]'
  ]
];

$config['register-product'] = [
  [
    'field' => 'code',
    'label' => 'code',
    'rules' => [
      'trim',
      'required',
      'max_length[80]',
      ['uniqueCode', [$CI->products, 'uniqueCode']]
    ],
    'errors' => [
      'required' => 'Must provide a product code',
      'uniqueCode' => 'Product code already exists'
    ]
  ],
  [
    'field' => 'description',
    'label' => 'description',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a product description'
    ]
  ],
  [
    'field' => 'price',
    'label' => 'price',
    'rules' => [
      'trim',
      'required',
      ['priceIsDecimal', [$CI->products, 'priceIsDecimal']]
    ],
    'errors' => [
      'required' => 'Must provide a product price',
      'priceIsDecimal' => 'Only acept numbers and decimal with 2 digits'
    ]
  ]
];

$config['register-user'] = [
  [
    'field' => 'login',
    'label' => 'login',
    'rules' => [
      'trim',
      'required',
      'max_length[100]',
      ['uniqueLogin', [$CI->users, 'uniqueLogin']]
    ],
    'errors' => [
      'required' => 'Must provide a user name',
      'uniqueLogin' => 'User name already exists'
    ]
  ],
  [
    'field' => 'email',
    'label' => 'email',
    'rules' => [
      'trim',
      'required',
      ['isValidEmail', [$CI->users, 'isValidEmail']],
      'max_length[255]',
      ['uniqueEmail', [$CI->users, 'uniqueEmail']]
    ],
    'errors' => [
      'required' => 'Must provide a valid email',
      'isValidEmail' => 'Must provide a valid email',
      'uniqueEmail' => 'Email already exists'
    ]
  ],
  [
    'field' => 'password',
    'label' => 'password',
    'rules' => 'trim|required|min_length[8]',
    'errors' => [
      'required' => 'Must provide a password'
    ]
  ],
  [
    'field' => 'name',
    'label' => 'name',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a name'
    ]
  ],
  [
    'field' => 'country',
    'label' => 'country',
    'rules' => 'trim|required|max_length[100]',
    'errors' => [
      'required' => 'Must provide a country'
    ]
  ],
  [
    'field' => 'state',
    'label' => 'state',
    'rules' => 'trim|required|max_length[100]',
    'errors' => [
      'required' => 'Must provide a state'
    ]
  ],
  [
    'field' => 'city',
    'label' => 'city',
    'rules' => 'trim|required|max_length[100]',
    'errors' => [
      'required' => 'Must provide a city'
    ]
  ],
  [
    'field' => 'zip_code',
    'label' => 'zip_code',
    'rules' => 'trim|required|max_length[40]',
    'errors' => [
      'required' => 'Must provide a zip code'
    ]
  ],
  [
    'field' => 'address',
    'label' => 'address',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide an address'
    ]
  ]
];

$config['edit-customer'] = [
  [
    'field' => 'id',
    'label' => 'id',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'name',
    'label' => 'name',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a customer full name'
    ]
  ],
  [
    'field' => 'phoneNumber',
    'label' => 'phoneNumber',
    'rules' => [
      'trim',
      'max_length[50]',
      ['oneOfTwoNumbers', [$CI->customers, 'oneOfTwoNumbers']],
      ['uniquePhoneNumber', [$CI->customers, 'uniquePhoneNumber']]
    ],
    'errors' => [
      'oneOfTwoNumbers' => 'Register at least one phone number',
      'uniquePhoneNumber' => 'Phone number already exist for another customer'
    ]
  ],
  [
    'field' => 'mobileNumber',
    'label' => 'mobileNumber',
    'rules' => [
      'trim',
      'max_length[50]',
      ['oneOfTwoNumbers', [ $CI->customers, 'oneOfTwoNumbers']],
      ['uniqueMobileNumber', [$CI->customers, 'uniqueMobileNumber']]
    ],
    'errors' => [
      'oneOfTwoNumbers' => 'Register at least one phone number',
      'uniqueMobileNumber' => 'Mobile number already exist for another customer'
    ]
  ],
  [
    'field' => 'email',
    'label' => 'email',
    'rules' => [
      'trim',
      'required',
      ['isValidEmail', [$CI->users, 'isValidEmail']],
      'max_length[255]',
      ['uniqueEmail', [$CI->customers, 'uniqueEmail']]
    ],
    'errors' => [
      'required' => 'Must provide a valid email',
      'isValidEmail' => 'Must provide a valid email',
      'uniqueEmail' => 'Email address already exist for another customer'
    ]
  ],
  [
    'field' => 'address',
    'label' => 'address',
    'rules' => 'trim|required|max_length[255]'
  ]
];

$config['edit-product'] = [
  [
    'field' => 'id',
    'label' => 'id',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'code',
    'label' => 'code',
    'rules' => [
      'trim',
      'required',
      'max_length[80]',
      ['uniqueCode', [$CI->products, 'uniqueCode']]
    ],
    'errors' => [
      'required' => 'Must provide a product code',
      'uniqueCode' => 'Product code already exists'
    ]
  ],
  [
    'field' => 'description',
    'label' => 'description',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a product description'
    ]
  ],
  [
    'field' => 'price',
    'label' => 'price',
    'rules' => [
      'trim',
      'required',
      ['priceIsDecimal', [$CI->products, 'priceIsDecimal']]
    ],
    'errors' => [
      'required' => 'Must provide a product price',
      'priceIsDecimal' => 'Only acept numbers and decimal with 2 digits'
    ]
  ]
];

$config['edit-user'] = [
  [
    'field' => 'id',
    'label' => 'id',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'login',
    'label' => 'login',
    'rules' => [
      'trim',
      'required',
      'max_length[100]',
      ['uniqueLogin', [$CI->users, 'uniqueLogin']]
    ],
    'errors' => [
      'required' => 'Must provide a user name',
      'uniqueLogin' => 'User name already exists'
    ]
  ],
  [
    'field' => 'email',
    'label' => 'email',
    'rules' => [
      'trim',
      'required',
      ['isValidEmail', [$CI->users, 'isValidEmail']],
      'max_length[255]',
      ['uniqueEmail', [$CI->users, 'uniqueEmail']]
    ],
    'errors' => [
      'required' => 'Must provide a valid email',
      'isValidEmail' => 'Must provide a valid email',
      'uniqueEmail' => 'Email already exists'
    ]
  ],
  [
    'field' => 'name',
    'label' => 'name',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide a name'
    ]
  ],
  [
    'field' => 'country',
    'label' => 'country',
    'rules' => 'trim|required|max_length[100]',
    'errors' => [
      'required' => 'Must provide a country'
    ]
  ],
  [
    'field' => 'state',
    'label' => 'state',
    'rules' => 'trim|required|max_length[100]',
    'errors' => [
      'required' => 'Must provide a state'
    ]
  ],
  [
    'field' => 'city',
    'label' => 'city',
    'rules' => 'trim|required|max_length[100]',
    'errors' => [
      'required' => 'Must provide a city'
    ]
  ],
  [
    'field' => 'zip_code',
    'label' => 'zip_code',
    'rules' => 'trim|required|max_length[40]',
    'errors' => [
      'required' => 'Must provide a zip code'
    ]
  ],
  [
    'field' => 'address',
    'label' => 'address',
    'rules' => 'trim|required|max_length[255]',
    'errors' => [
      'required' => 'Must provide an address'
    ]
  ]
];

$config['search-customer'] = [
  [
    'field' => 'searchNumber',
    'label' => 'searchNumber',
    'rules' => 'trim|required'
  ]
];

$config['reset-password'] = [
  [
    'field' => 'id',
    'label' => 'id',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'password',
    'label' => 'password',
    'rules' => 'required|min_length[8]',
    'errors' => [
      'required' => 'Must provide a password',
      'min_length' => 'Password must contain at least 8 characters'
    ]
  ]
];

$config['register-invoice'] = [
  [
    'field' => 'customerId',
    'label' => 'customerId',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'receiverId',
    'label' => 'receiverId',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'driverId',
    'label' => 'driverId',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'deliveryStatusId',
    'label' => 'deliveryStatusId',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'invoiceStatusId',
    'label' => 'invoiceStatusId',
    'rules' => 'trim|required|numeric'
  ]
];

$config['edit-invoice'] = [
  [
    'field' => 'id',
    'label' => 'id',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'receiverId',
    'label' => 'receiverId',
    'rules' => 'trim|required|numeric'
  ],
  [
    'field' => 'driverId',
    'label' => 'driverId',
    'rules' => 'trim|required|numeric'
  ]
];