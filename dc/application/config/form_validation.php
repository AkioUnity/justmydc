<?php

/**
 * Config file for form validation
 * http://www.codeigniter.com/user_guide/libraries/form_validation.html (Under section "Creating Sets of Rules")
 */

$config = array(
	'auth/login' => array(
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'required|valid_email',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
	),
    'auth/forgot_password' => array(
        array(
            'field'		=> 'email',
            'label'		=> 'Email',
            'rules'		=> 'required|valid_email',
        ),
    ),
    'auth/reset_password' => array(
        array(
            'field'		=> 'password',
            'label'		=> 'Password',
            'rules'		=> 'required|matches[retype_password]\'',
        ),
        array(
            'field'		=> 'retype_password',
            'label'		=> 'Retype Password',
            'rules'		=> 'required',
        ),
    ),
);

/**
 * Google reCAPTCHA settings
 * https://www.google.com/recaptcha/
 */
$config['recaptcha'] = array(
	'site_key'		=> '',
	'secret_key'	=> '',
);
