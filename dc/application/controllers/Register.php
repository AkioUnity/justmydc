<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Register extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // CI Bootstrap libraries
        $this->load->library('form_builder');
        $this->load->library('system_message');
        $this->load->library('my_email');
        $this->push_breadcrumb('Auth');
    }

    /**
     * Login page and submission
     */
    public function index()
    {
        $this->load->library('google');
        $this->load->library('facebook');

        $identity = $this->input->post('email');
        $password = $this->input->post('password');
        $this->mViewData['google_login_url']=$this->google->get_login_url();
// facebook login URL
        $this->mViewData['fbUrl'] =  $this->facebook->login_url();

        if (isset($identity)) {
            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'market_id' => $this->input->post('market'),
            );
            // create user (default group as "members")
            $user = $this->ion_auth->register($identity, $password, $identity, $additional_data);
            if ($user) {
                // send email using Email Client library
                if ($this->config->item('email_activation', 'ion_auth') && !$this->config->item('use_ci_email', 'ion_auth')) {
                    $subject = $this->lang->line('email_activation_subject');
                    $email_view = $this->config->item('email_templates', 'ion_auth') . $this->config->item('email_activate', 'ion_auth');
//                    $this->my_email->send($identity, $subject, $email_view, $user);
                }
                // success
                $messages = $this->ion_auth->messages();
                $this->mViewData['message'] = $messages;
                $this->system_message->set_success($messages);
                redirect('dashboard');
            } else {
                // failed
                $errors = $this->ion_auth->errors();
                $this->mViewData['message'] = "Email was duplicated";
                $this->system_message->set_error($errors);
            }
        }
        // require reCAPTCHA script at page head
        $this->mScripts['head'][] = 'https://www.google.com/recaptcha/api.js';

        $this->load->model('market_model');
        $this->mViewData['marketList'] = $this->market_model->dropdown('market_id','market_name');
        // display form
        $this->mViewData['market_id'] = $this->default_market_id;
        $this->render('auth/register', 'full_width');
    }
}
