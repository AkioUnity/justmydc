<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{
        redirect('dashboard');

//        $this->render('dashboard', 'full_width');
	}
}
