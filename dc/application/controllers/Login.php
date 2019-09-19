<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // CI Bootstrap libraries
        $this->load->library('form_builder');
        $this->load->library('system_message');
        $this->load->library('my_email');
//        $this->load->library('ion_auth','form_validation'));
        $this->push_breadcrumb('Auth');
        $this->load->library('google');

        $this->load->library('facebook');
        $this->load->model('social_login_model');
        $this->load->config('social_auth_config');
    }
    /**
     * Login page and submission
     */
    public function index()
    {
        $this->mViewData['google_login_url']=$this->google->get_login_url();
        // facebook login URL
        $this->mViewData['fbUrl'] =  $this->facebook->login_url();

        // passed validation
        $identity = $this->input->post('email');
        $password = $this->input->post('password');
        if (isset($identity)){
            $remember = false;//($this->input->post('remember')=='on');

            if ($this->ion_auth->login($identity, $password, $remember)) {
                // login succeed
                $messages = $this->ion_auth->messages();
                $this->mViewData['message'] = $messages;
                redirect('dashboard');
            } else {
                // login failed
                $errors = $this->ion_auth->errors();
                $this->mViewData['message'] = "a wrong email or password is put in";
                $this->render('auth/login', 'full_width');
            }
        }
        else
            $this->render('auth/login','full_width');
    }

    public function SocialCallBack(){
        $userData=$this->google->validate();
        $this->social_login($userData);
    }

    public function logout(){
        session_destroy();
        unset($_SESSION['access_token']);
        $session_data=array(
            'sess_logged_in'=>0);
        $this->session->set_userdata($session_data);
        redirect(base_url());
    }

    public function social_login($userData)
    {
        $userData['market_id']=$this->default_market_id;
        $username = $userData['first_name']."_".$userData['last_name'];
        $email    = $userData['email'];
        // Insert or update user data
        $userID = $this->social_login_model->socail_login($userData,$username,$email);
        if($userID)
        {
            //if the login is successful
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect(base_url());
        }
        else
        {
            // if the login was un-successful
            // redirect them back to the login page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        }
    }

    public function facebook_login()
    {
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData = array(
//                'oauth_provider' => 'facebook',
                'fb_id'      => $userProfile['id'],
                'first_name' 	   => $userProfile['first_name'],
                'last_name' 	   => $userProfile['last_name'],
                'email' 		   => $userProfile['email'],
                // 'gender' 		   => $userProfile['gender'],
                // 'locale' 		   => $userProfile['locale'],
                // 'profile_url'    => 'https://www.facebook.com/'.$userProfile['id'],
                // 'picture_url'    => $userProfile['picture']['data']['url']
            );

            $useremail = $userData['email'];
            if (!$useremail)
            {
                $userData['email']= $userData['first_name']."".$userData['last_name']."@facebook.com";
            }
            $this->social_login($userData);
        } else {
            $fbuser = '';
            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
    }

    public function fb_logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userdata('userData');
        // Redirect to login page
        redirect('Auth');
    }
}
