<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public $myprofile_link = 'myprofile/';

    function __construct()
    {
        parent::__construct();

        $this->load->model('Profilemodel');
        $this->load->model('profile/Profile_social_model');
        $this->load->model('market/Marketmodel');
        $this->load->model('channel/Channelmodel');
        $this->load->model('categories/Categoriesmodel');
        $this->load->model('user/Usermodel');
        $this->load->library("user_agent");
        $this->load->library('upload');
    }

    public function index()
    {
        if (isset($_GET['status'])) {
            if ($this->input->get('status')) {
                $profile_status = $this->input->get('status');
            } else {
                $profile_status = 'All';
            }
            $data['profile'] = $this->Profilemodel->getProfileList($profile_status);
        } elseif (isset($_GET['statusall'])) {
            $data['profile'] = $this->Profilemodel->getProfileList();
        } else {
            $data['profile'] = $this->Profilemodel->getProfileList();
        }
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_profile_list');
        $this->load->view('include/footer');

    }

    public function searchInfogroup_id()
    {
        $name = $this->input->post('name');
        if ($name) {  //at the first
            $this->mViewData['profile_list'] = $this->Profilemodel->searchProfileList($name);
        } else {
            $this->mViewData['profile_list'] = null;
        }
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('search_business_result_view', $this->mViewData);
        $this->load->view('include/footer');
    }

    public function claim($infogroup_id)
    {
        $profile0 = $this->Profilemodel->getClaimedProfile($infogroup_id);
//        print_r($profile0);
        $profile0 = $profile0[0];
        $profile = array(
            'profile_name' => $profile0['name'],
            'profile_contact' => $profile0['phone'],
//            'profile_user_name'=>$profile0['name'],
            'profile_zip' => $profile0['zip'],
            'profile_email' => $profile0['email'],
            'profile_web' => $profile0['website'],
            'profile_add' => $profile0['street'] . ' ' . $profile0['city'] . ' ' . $profile0['state'],
            'profile_city' => $profile0['city'],
            'profile_st' => $profile0['state'],
            'infogroup_id' => $infogroup_id,
        );
        $data['profile'] = $profile;
//        print_r($data);

        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_profile', $data);
        $this->load->view('include/footer');
    }

    public function addProfile()
    {
        $data['profile'] = $this->Profilemodel->getProfile(0)[0];

        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_profile', $data);
        $this->load->view('include/footer');
    }

    public function editProfileSection($file_name)
    {
        $this->mViewData['link'] = $this->input->get('link');
//        echo "<pre>";  print_r($data['profileMedia']); die;
        if ($this->mViewData['link'] == $this->myprofile_link) {
            $this->mViewData['view_file'] = $file_name;
            $this->render('my_toolbox', 'main_layout');
        } else {
            $this->load->view('include/header');
            $this->load->view('include/breadcrum');
            $this->load->view($file_name, $this->mViewData);
            $this->load->view('include/footer');
        }
    }

    public function editProfileMedia()
    {
        $this->mViewData['profileMedia'] = $this->Profilemodel->getProfileMediaOnly($this->input->get('id'));
        $this->editProfileSection('edit_profile_media');
    }

    public function editProfileFeatures()
    {
        $this->mViewData['profileFeatures'] = $this->Profilemodel->getProfileFeaturesDetails($this->input->get('id'));
        $this->editProfileSection('edit_profile_keyword');
    }

    public function insertProfile()
    {
        $data = $this->input->post();
        if ($result = $this->Profilemodel->insertProfile($data)) {
            redirect(base_url() . 'profile/');
        }
    }

    public function insertProfileImage()
    {
        $data = $this->input->post();
        $this->load->library('upload');
        $attachment = "";
        if ($_FILES['pi_image']['name'] != "") {
            $fieldName = 'pi_image';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'pi_image' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['pi_image'] = $attachment;
        if ($result = $this->Profilemodel->insertProfileImage($data)) {
            redirect(base_url() . 'profile/');
        }
    }

    public function LoadProfile($id)
    {

        $this->mViewData['profileMedia'] = $this->Profilemodel->getProfileMedia($id);
        $this->mViewData['profileSocial'] = $this->Profilemodel->getProfileSocial($id);
        $this->mViewData['profileFeatures'] = $this->Profilemodel->getProfileFeatures($id);
    }

    public function editProfile()
    {
        $id = $this->input->get('id');
        $this->LoadProfile($id);
        $this->mViewData['marketLists'] = $this->Marketmodel->getMarketList();
        $this->mViewData['channelLists'] = $this->Channelmodel->getChannel();
        $this->mViewData['typeList'] = $this->Profilemodel->getTypeList();
        $this->mViewData['profileLists'] = $this->Profilemodel->getProfileOnly();
        $this->mViewData['UserLists'] = $this->Usermodel->getUserOnly();

        $this->mViewData['marketAddedLists'] = $this->Profilemodel->getAddedMarketsById($this->input->get('id'));

        $this->mViewData['categoryLists'] = $this->Categoriesmodel->getCategories();
        $this->mViewData['categoryAddedLists'] = $this->Profilemodel->getAddedCategoriesById($this->input->get('id'));
        $this->mViewData['channelAddedLists'] = $this->Profilemodel->getAddedChannelById($this->input->get('id'));
        $this->mViewData['channelAddedLists'] = $this->Profilemodel->getAddedChannelById($this->input->get('id'));

        $this->mViewData['profileAdmins'] = $this->Profilemodel->getProfileAdminsById($this->input->get('id'));

        $this->mViewData['profile'] = $this->Profilemodel->get($this->input->get('id'));
        $this->mViewData['post'] = $this->mViewData['profile'];
        $this->mViewData['profileReview'] = $this->Profilemodel->getProfileReviews($this->input->get('id'));
//        echo "<pre>";  print_r($data); die;
        $this->mViewData['link'] = 'editProfile?id=';

        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('edit_profile', $this->mViewData);
        $this->load->view('include/footer');
    }

    public function myprofile($id)
    {

//        $this->mViewData['spotlights'] = $this->Postmodel->getPostSpotLights();
//        $this->mViewData['categories'] = $this->Categoriesmodel->getDropDown(0);
        $this->LoadProfile($id);

        $this->mViewData['post'] = $this->Profilemodel->getProfile0($id);
//        print_r($this->mViewData);
        $this->mViewData['view_file'] = 'post_edit_view';

        $this->mViewData['social_enum'] = $this->Profile_social_model->get_enums('ps_name');

        $this->mViewData['link'] = $this->myprofile_link;
        $this->render('my_toolbox', 'main_layout');
//        $this->render('business_edit_view', 'main_layout');
    }

    public function updateProfile()
    {
        $data = $this->input->post();
        $this->post_data = $data;
        $id = $this->input->get('profileId');

        $this->SetData('profile_name');
        $this->SetData('profile_add');
        $this->SetData('profile_city');
        $this->SetData('profile_st');
        $this->SetData('profile_zip');
        $this->SetData('profile_contact');
        $this->SetData('profile_email');
        $this->SetData('profile_tagline');
        $this->SetData('profile_about');

        $this->Profilemodel->update($id, $this->update_data);

        $this->Profile_social_model->updateProfileSocial($data, $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">Business Profile was updated</div>');
        redirect('profile/myprofile/' . $id);
    }

    public function updateProfileDetail()
    {
        $data = $this->input->post();
        $id = $this->input->get('profileId');

        $link = 'editProfile?id=';
        $this->Profilemodel->update($id, $data);
        redirect('profile/' . $link . $id);
    }

    public function updateProfileSocial()
    {
        $data = $this->input->post();
        //echo "<pre>";  print_r($data); die;
        $profileId = $this->input->get('profileId');
        if ($result = $this->Profile_social_model->updateProfileSocial($data, $profileId)) {
            redirect(base_url() . 'profile/editProfile?id=' . $profileId);
        }
    }

    public function updateProfileAdmin()
    {
        $data = $this->input->post();
        //echo "<pre>";  print_r($data); die;
        $profileId = $this->input->get('profileId');
        if ($result = $this->Profilemodel->updateProfileAdmin($data, $profileId)) {
            redirect(base_url() . 'profile/editProfile?id=' . $profileId);
        }
    }

    public function insertProfileFeatures()  //keyword
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');
        $this->Profilemodel->insertProfileFeatures($data, $profileId);
        redirect('profile/' . $data['link'] . $profileId);
    }

    public function updateProfileFeatures()
    {
        $data = $this->input->post();
        //echo "<pre>";  print_r($data); die;
        $profileId = $this->input->get('profileId');
        $Id = $this->input->get('Id');
        $link = $data['link'];
        $this->Profilemodel->updateProfileFeatures($data, $profileId, $Id);
        redirect('profile/' . $link . $profileId);
    }


    public function updateProfileMap()
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');
        if ($result = $this->Profilemodel->updateProfileMap($data, $profileId)) {
            redirect(base_url() . 'profile/editProfile?id=' . $profileId);
        }
    }

    public function updateProfileReviews()
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');
        if ($result = $this->Profilemodel->updateProfileReviews($data, $profileId)) {
            redirect(base_url() . 'profile/editProfile?id=' . $profileId);
        }
    }

    public function insertProfileMedia()
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');

        //echo "<pre>";  print_r(); die;

        $attachment = $this->upload($_FILES['logo']['name'], 'logo');

        if ($attachment != '')
            $this->Profilemodel->update_field($profileId, 'logo', $attachment);
//        echo "<pre>";  print_r($attachment); die;
        //echo "<pre>";  print_r($_FILES['media_file']['name']);
        for ($i = 0; $i < count($_FILES['media_file']['name']); $i++) {
            $attachments = "";
            if ($_FILES['media_file']['name'][$i] != "") {
                $fieldName = 'media_file';
                $ext = pathinfo($_FILES[$fieldName]['name'][$i], PATHINFO_EXTENSION);
                $attachments = 'media_file_' . $i . time() . '.' . $ext;
                $_FILES['fileName']['name'] = $_FILES[$fieldName]['name'][$i];
                $_FILES['fileName']['type'] = $_FILES[$fieldName]['type'][$i];
                $_FILES['fileName']['tmp_name'] = $_FILES[$fieldName]['tmp_name'][$i];
                $_FILES['fileName']['error'] = $_FILES[$fieldName]['error'][$i];
                $_FILES['fileName']['size'] = $_FILES[$fieldName]['size'][$i];
                $this->upload->initialize($this->set_upload_options($attachments));

                if ($this->upload->do_upload('fileName')) {
                    $msg = "upload success";//die;
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
            $data['media_file_name'][] = $attachments;
        }

        //echo "<pre>";  print_r($data['media_file_name']); die;
        $this->Profilemodel->insertProfileMedia($data, $profileId);
        redirect('profile/' . $data['link'] . $profileId);
    }

    public function updateProfileMedia()
    {
        $data = $this->input->post();
        $this->load->library('upload');
        //echo "<pre>";  print_r($data); die;
        $attachment = "";
        if ($_FILES['media_file']['name'] != "") {
            $fieldName = 'media_file';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'media_file' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['media_file'] = $attachment;
        $profileId = $this->input->get('profileId');
        $Id = $this->input->get('Id');
        $link = $data['link'];
        $this->load->library('upload');
        $this->Profilemodel->updateProfileMedia($data, $profileId, $Id);
        redirect('profile/' . $link . $profileId);
    }

    public function updateProfileMarket()
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');
        if (count($data['markets']) > 0) {
            $this->Profilemodel->updateProfileMarket($profileId, $data['markets']);
        } else {
            $this->Profilemodel->deleteAllProfileMarkets($profileId);
        }

        redirect(base_url() . 'profile/editProfile?id=' . $profileId);

    }

    public function updateProfileCategory()
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');
        if (count($data['categories']) > 0) {
            $this->Profilemodel->updateProfileCategory($profileId, $data['categories']);
        } else {
            $this->Profilemodel->deleteAllProfileCategory($profileId);
        }

        redirect(base_url() . 'profile/editProfile?id=' . $profileId);

    }

    public function updateProfileType()
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');
        $this->Profilemodel->updateProfileField('profile_type_id', $data['profile_type_id']);
        redirect(base_url() . 'profile/editProfile?id=' . $profileId);
    }

    public function updateProfileChannel()
    {
        $data = $this->input->post();
        $profileId = $this->input->get('profileId');
        if (count($data['channel']) > 0) {
            $this->Profilemodel->updateProfileChannel($profileId, $data['channel']);
        } else {
            $this->Profilemodel->deleteAllProfileChannel($profileId);
        }

        redirect(base_url() . 'profile/editProfile?id=' . $profileId);

    }

    public function deleteProfile()
    {
        $id = $this->input->get('id');
        $result = $this->Profilemodel->deleteProfile($id);
        redirect(base_url() . 'profile/');
    }

    public function deleteProfileSocialMedia()
    {
        $id = $this->input->get('id');
        $profileId = $this->input->get('profileId');
        $result = $this->Profilemodel->deleteProfileSocialMedia($id);
        redirect(base_url() . 'profile/editProfile?id=' . $profileId);
    }

    public function deleteProfileFeatures()
    {
        $id = $this->input->get('id');
        $profileId = $this->input->get('profileId');
        $result = $this->Profilemodel->deleteProfileFeatures($id);
        redirect(base_url() . 'profile/editProfile?id=' . $profileId);
    }

    public function deleteProfileMedia()
    {
        $id = $this->input->get('id');
        $link = $this->input->get('link');
        $profileId = $this->input->get('profileId');
        $result = $this->Profilemodel->deleteProfileMedia($id);
        redirect('profile/' . $link . $profileId);
    }

    public function deleteProfileAdmin()
    {
        $id = $this->input->get('id');
        $profileId = $this->input->get('profileId');
        $result = $this->Profilemodel->deleteProfileAdmin($id);
        redirect(base_url() . 'profile/editProfile?id=' . $profileId);
    }

    public function youtube_id_from_url($url)
    {
        $pattern =
            '%^# Match any youtube URL
	        (?:https?://)?  # Optional scheme. Either http or https
	        (?:www\.)?      # Optional www subdomain
	        (?:             # Group host alternatives
	          youtu\.be/    # Either youtu.be,
	        | youtube\.com  # or youtube.com
	          (?:           # Group path alternatives
	            /embed/     # Either /embed/
	          | /v/         # or /v/
	          | /watch\?v=  # or /watch\?v=
	          )             # End path alternatives.
	        )               # End host alternatives.
	        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id. 
	        $%x';
        $result = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }
        return false;
    }

    public function getYoutubeData()
    {
        $url = $this->input->get('url');
        //echo $url; die;
        $video_url = $url;
        $api_key = 'AIzaSyCNfVp4aO21MrfZoki-8skeJkKGFJVQVjM';

        $api_urls = 'https://www.googleapis.com/youtube/v3/videos?id=' . $this->youtube_id_from_url($video_url) . '&key=' . $api_key . '&part=snippet';
        $data = file_get_contents($api_urls);
        echo $data;
        die;
    }

    protected function set_upload_options($imageName)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'upload/profile';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4';
        $config['max_size'] = '50000KB';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $imageName;
        return $config;
    }

}

?>