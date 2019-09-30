<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mytoolbox extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // only login users can access Account controller
//        $this->verify_login();
        $this->load->model('post_model');
        $this->load->model('Profilemodel');
    }

    public function index()
    {
        $this->mViewData['user'] = $this->mUser;
        $this->render('account');
    }

    public function myprofile($id)
    {
        if ($id==0){  //add new
            $data = $this->input->post();
            $id = $this->post_model->insert_post($data);
            redirect('profile/business/'.$id);
        }

        $this->mViewData['spotlights'] = $this->Postmodel->getPostSpotLights();

        $this->mViewData['categories'] = $this->Categoriesmodel->getDropDown(0);
        $this->mViewData['post'] = $this->Profilemodel->getProfile($id);
//        print_r($this->mViewData);
        $this->mViewData['view_file']='post_edit_view';
        $this->render('my_toolbox', 'main_layout');
//        $this->render('business_edit_view', 'main_layout');
    }

    public function view($id){
        $this->mViewData['isViewMode'] = true;
        $this->business($id);
    }

    public function updatepost()
    {
        $state_active = get_settings('business_settings', 'show_state_province', 'yes');
        $id = $this->input->post('profile_id');

        $this->load->helper('date');
        $time = time();
        $data =  $this->input->post();  //unset($marks["Ram"]);
//        $data['parent_category'] = get_category_parent_by_id($data['category']);

        $this->load->model('admin/system_model');

//        $data['gallery'] = ($this->input->post('gallery') != false) ? json_encode($this->input->post('gallery')) : '[]';

        if ($this->input->post('assigned_to') != '')
            $data['created_by'] = $this->input->post('assigned_to');

        $opening_hours = array();
        $days = $this->input->post('days');
        $opening_times = $this->input->post('opening_hour');
        $closing_times = $this->input->post('closing_hour');
        if ($days){
            foreach ($days as $key => $day) {
                $opening_hour = array();
                if ($opening_times[$key] == 'Closed') {
                    $opening_hour['day'] = $day;
                    $opening_hour['closed'] = 1;
                    $opening_hour['start_time'] = '';
                    $opening_hour['close_time'] = '';
                } else {
                    $opening_hour['day'] = $day;
                    $opening_hour['closed'] = 0;
                    $opening_hour['start_time'] = $opening_times[$key];
                    $opening_hour['close_time'] = $closing_times[$key];
                }
                array_push($opening_hours, $opening_hour);
            }
        }

//        $data['opening_hour'] = json_encode($opening_hours);
//
//        $data['last_update_time'] = $time;

        unset($data['business_logo']);
        for ($i=1;$i<6;$i++){
            unset($data['label'.$i]);
            unset($data['link'.$i]);
        }


        $this->Profilemodel->update($id,$data);
        $post_id = $id;

        add_post_meta($post_id, 'facebook_profile', $this->input->post('facebook_profile'));
        $data_post=$this->input->post();
        //links

        for ($i=1;$i<6;$i++){
            add_post_meta($post_id, 'label'.$i, $data_post['label'.$i]);
            add_post_meta($post_id, 'link'.$i, $data_post['link'.$i]);
        }


//        add_post_meta($post_id, 'twitter_profile', $data_post['twitter_profile']);
//        add_post_meta($post_id, 'linkedin_profile', $data_post['linkedin_profile']);
//        add_post_meta($post_id, 'pinterest_profile', $data_post['pinterest_profile']);
//        add_post_meta($post_id, 'googleplus_profile', $data_post['googleplus_profile']);
//        add_post_meta($post_id, 'instagram_profile', $data_post['instagram_profile']);//added on version 1.8
        add_post_meta($post_id, 'business_logo', $this->input->post('business_logo'));
        // added on version 1.6
        add_post_meta($post_id, 'hide_my_phone', $this->input->post('hide_my_phone'));
        add_post_meta($post_id, 'camera_spin', $this->input->post('camera_spin'));
        // added on version 1.5
        add_post_meta($post_id, 'always_open', $this->input->post('always_open'));
        add_post_meta($post_id, 'hide_my_email', $this->input->post('hide_my_email'));
        add_post_meta($post_id, 'disable_email_contact', $this->input->post('disable_email_contact'));
        add_post_meta($post_id, 'disable_google_street_view', $this->input->post('disable_google_street_view'));
        // end

        $this->session->set_flashdata('msg', '<div class="alert alert-success">Business Profile was updated</div>');

        redirect('mytoolbox/myprofile/' . $id);
    }

    public function claim($profile_id)
    {

    }
}