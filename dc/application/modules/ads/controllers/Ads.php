<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends Admin_Controller
{

    protected $mViewData = array();

    function __construct()
    {
        parent::__construct();

        $this->load->model('Adsmodel');
        $this->load->model('market/Marketmodel');
        $this->load->model('Profilemodel');
        $this->load->model('channel/Channelmodel');
        $this->load->model('categories/Categoriesmodel');
        $this->load->model('user/Usermodel');
//        $this->load->helper('common');
        $this->load->library("user_agent");

//        if ($this->session->userdata('user_role') == '4') {
//            redirect(base_url() . 'channel');
//        }
    }

    public function index()
    {
        $data['ads'] = $this->Adsmodel->getAds();
        //echo "<pre>"; print_r($data['ads']);die;
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_ads_list');
        $this->load->view('include/footer');

    }

    public function addAds()
    {
        $this->LoadData();
        $this->mViewData['ads'] = $this->Adsmodel->getAds(1); //blank
//        print_r($this->mViewData);
        $this->load->view('add_ads', $this->mViewData);
        $this->load->view('include/footer');
    }

    public function insertAd()
    {
        $data = $this->input->post();

        $this->load->library('upload');

        $attachment = "";
        if ($_FILES['ad_logo']['name'] != "") {
            $fieldName = 'ad_logo';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'ad_logo' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['ad_logo'] = $attachment;

        $attachment = "";
        if ($_FILES['ad_background_image']['name'] != "") {
            $fieldName = 'ad_background_image';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'ad_background_image' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['ad_background_image'] = $attachment;

        $attachment1 = "";
        if ($_FILES['ad_image']['name'] != "") {
            $fieldName = 'ad_image';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment1 = 'ad_image' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment1));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());
            }
        }
        $data['ad_image'] = $attachment1;

        if ($result = $this->Adsmodel->updateAd($data)) {
            redirect(base_url() . 'ads/');
        }
    }

    public function LoadData()
    {
        $this->mViewData['UserLists'] = $this->Usermodel->getUserOnly();
        $this->mViewData['marketLists'] = $this->Marketmodel->getMarketList();
        $this->mViewData['channelLists'] = $this->Channelmodel->getChannel();
        $this->mViewData['profileLists'] = $this->Profilemodel->getProfileOnly();
        $this->mViewData['categoryLists'] = $this->Categoriesmodel->getCategories();

        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
    }

    public function editAd()
    {
        $id = $this->input->get('id');
        $this->mViewData['marketAddedLists'] = $this->Adsmodel->getAddedMarketsById($id);

        $this->LoadData();

        $this->mViewData['categoryAddedLists'] = $this->Adsmodel->getAddedCategoriesById($id);
        $this->mViewData['channelAddedLists'] = $this->Adsmodel->getAddedChannelById($this->input->get('id'));
        $this->mViewData['ads'] = $this->Adsmodel->getAds($this->input->get('id'));

//		echo "<pre>";print_r($this->mViewData);

        $this->load->view('edit_ads', $this->mViewData);
        $this->load->view('include/footer');
    }

    public function updateAd()
    {
//        print_r($_POST);
        $data = $this->input->post();
        $this->load->library('upload');
        $attachment = "";
        if ($_FILES['ad_logo']['name'] != "") {
            $fieldName = 'ad_logo';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'ad_logo' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['ad_logo'] = $attachment;

        $attachment = "";
        if ($_FILES['ad_background_image']['name'] != "") {
            $fieldName = 'ad_background_image';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'ad_background_image' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['ad_background_image'] = $attachment;

        $attachment1 = "";
        if ($_FILES['ad_image']['name'] != "") {
            $fieldName = 'ad_image';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment1 = 'ad_image' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment1));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());
            }
        }
        $data['ad_image'] = $attachment1;

        //echo "<pre>"; print_r($data);die;
        if ($result = $this->Adsmodel->updateAd($data)) {
            redirect(base_url() . 'ads/');
        }
    }

    public function deleteAd()
    {
        $id = $this->input->get('id');
        $result = $this->Adsmodel->deleteAd($id);
        redirect(base_url() . 'ads/');
    }

    private function set_upload_options($imageName)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'upload/adsdata';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4';
        $config['max_size'] = '50000KB';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $imageName;

        return $config;
    }

}

?>