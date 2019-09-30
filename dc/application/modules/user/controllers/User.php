<?php

class User extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->model('market/Marketmodel');
//        $this->load->helper('common');
//        $this->load->helper('user');
//        $this->load->library('session');
    }

    public function index()
    {
        $data['user'] = $this->Usermodel->getUser();

        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_user_list');
        $this->load->view('include/footer');

    }

    public function addUser()
    {
        $data['marketLists'] = $this->Marketmodel->getMarketList();
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_user', $data);
        $this->load->view('include/footer');
    }

    public function viewUser()
    {

        $data['user'] = $this->Usermodel->getUserId();
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_user');
        $this->load->view('include/footer');
    }

    public function editUser()
    {
        $data['user'] = $this->Usermodel->getUserId();
        $data['marketLists'] = $this->Marketmodel->getMarketList();
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('edit_user', $data);
        $this->load->view('include/footer');
    }

    public function deleteUser()
    {
        $data['user'] = $this->Usermodel->deleteUser();
        redirect(base_url() . 'user');
    }

    public function getUserDetails()
    {
        //echo "<pre>";print_r($_FILES);die;
        $data = $this->input->post();
        $result = $this->Usermodel->addUser($data);
        // echo "<pre>";print_r($result);die;
        if ($result) {
            $data['user'] = $this->Usermodel->getUser();
            $this->load->view('include/header');
            $this->load->view('include/breadcrum');
            $this->load->view('view_user_list', $data);
            $this->load->view('include/footer');
        }

    }

    public function updateUserDetails()
    {
        $data = $this->input->post();


        $result = $this->Usermodel->updateUser($data);
        //echo "<pre>"; print_r($result); die;
        if ($result) {

            redirect(base_url() . 'user');
        } else {
            $this->load->view('view_user_list', $error);
        }

    }

    private function set_upload_options($imageName)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'upload/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '10000KB';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $imageName;

        return $config;
    }

    public function userActiveStatus()
    {
        $result = $this->Usermodel->cancelUserStatus($this->input->post());
        //echo "<pre>"; print_r($result);die;
        if ($result) {

            redirect(base_url() . 'user');

        }
    }

}