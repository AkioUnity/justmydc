<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'justmy',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => 'justmy',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> 'akio',
		'description'	=> '',
		'keywords'		=> ''
	),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
		),
		'foot'	=> array(
			'assets/dist/frontend/lib.min.js',
			'assets/dist/frontend/app.min.js'
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/frontend/lib.min.css',
			'assets/dist/frontend/app.min.css',
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',
	
	// Multilingual settings
	'languages' => array(
		'default'		=> 'en',
		'autoload'		=> array('general'),
		'available'		=> array(
			'en' => array(
				'label'	=> 'English',
				'value'	=> 'english'
			),
			'zh' => array(
				'label'	=> '繁體中文',
				'value'	=> 'traditional-chinese'
			),
			'cn' => array(
				'label'	=> '简体中文',
				'value'	=> 'simplified-chinese'
			),
			'es' => array(
				'label'	=> 'Español',
				'value' => 'spanish'
			)
		)
	),

	// Google Analytics User ID
	'ga_id' => '',

	// Menu items
    'menu' => array(
        'my info' => array(
            'name'		=> 'my info',
            'url'		=> '',
            'icon'		=> 'fa fa-home',
        ),
        'my profiles' => array(
            'name'		=> 'my profiles',
            'url'		=> '',
            'icon'		=> 'fa fa-home',
        ),
        'profile1' => array(
            'name'		=> 'Absolute Moving Service',
            'url'		=> '',
            'icon'		=> 'fa fa-home',
        ),
        'create a profile' => array(
            'name'		=> 'create a profile',
            'url'		=> '',
            'icon'		=> 'fa fa-home',
        ),
        'my post' => array(
            'name'		=> 'my post',
            'url'		=> '',
            'icon'		=> 'fa fa-home',
        ),
        'create a post' => array(
            'name'		=> 'create a post',
            'url'		=> '',
            'icon'		=> 'fa fa-home',
        ),
//        'auth' => array(
//            'name'		=> 'Auth',
//            'url'		=> 'auth',
//            'icon'		=> 'fa fa-users',
//            'children'  => array(
//                'Login'			=> 'login',
//                'Sign Up'		=> 'register',
//            )
//        ),
    ),

	// Login page
    'login_url' => 'login',

	// Restricted pages
	'page_auth' => array(
	),

	// Email config
	'email' => array(
        'from_email'		=> 'akioUnity@gmail.com',
        'from_name'			=> 'Akio',
        'subject_prefix'	=> '[Akio project] ',

        // Mailgun HTTP API
        'mailgun_api'		=> array(
            'domain'			=> '',
            'private_api_key'	=> ''
        ),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_frontend';