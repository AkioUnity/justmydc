<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller
{
    protected $mViewData = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('market/Marketmodel');
        $this->load->model('channel/Channelmodel');
        $this->load->model('Profilemodel');
        $this->load->model('user/Usermodel');
        $this->load->model('section/Sectionmodel');
//        $this->load->helper('common');
        $this->load->library("user_agent");

//        if ($this->session->userdata('user_role') == '4') {
//            redirect(base_url() . 'channel');
//        }

    }

    public function index()
    {
        if (isset($_GET['channel'])) {
            $ps_status = $this->input->get('channel');
            $data['posts'] = $this->Postmodel->getPosts($ps_status);
        } else {
            $data['posts'] = $this->Postmodel->getPostsonly();
//            $data['posts'] = $this->Postmodel->getPosts();
        }
//        print_r($data);
        $data['channelLists'] = $this->Channelmodel->getChannel();
        $data['title'] = "Post";
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_posts_list');
        $this->load->view('include/footer');

    }

    public function type()
    {
        $data['posts'] = $this->Postmodel->getPostTypeList();
        $data['title'] = "Post Type";

        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_posts_list');
        $this->load->view('include/footer');
    }

    public function addPost($title)
    {
        $this->LoadData();
        $this->mViewData['title'] = urldecode($title);
        $this->load->view('add_posts', $this->mViewData);
        $this->load->view('include/footer');
    }

    public function LoadData()
    {
        $this->mViewData['UserLists'] = $this->Usermodel->getUserOnly();
        $this->mViewData['marketLists'] = $this->Marketmodel->getMarketList();
        $this->mViewData['channelLists'] = $this->Channelmodel->getChannel();
        $this->mViewData['profileLists'] = $this->Profilemodel->getProfileOnly();
        $this->mViewData['sectionList'] = $this->Sectionmodel->getSection();
        $this->mViewData['typeList'] = $this->Postmodel->getPostTypeList();

        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
    }

    public function editPost($id)
    {
        $this->mViewData['marketAddedLists'] = $this->Postmodel->getAddedMarketsById($id);
        $this->mViewData['profileAddedLists'] = $this->Postmodel->getAddedProfileById($id);
        $this->mViewData['channelAddedLists'] = $this->Postmodel->getAddedChannelById($id);
        $this->mViewData['post_section'] = $this->Postmodel->getSectionListById($id);
        $this->mViewData['statusLists'] = $this->Postmodel->getPostStatusById($id);
        $spotlight=$this->Postmodel->getPostSpotLightById($id);
        if ($spotlight)
            $this->mViewData['spotlight'] = $spotlight[0];
        $this->mViewData['posts'] = $this->Postmodel->getPostsonly($id)[0];
        //        print_r($this->mViewData);
//        print_r($this->mViewData);
        $this->LoadData();
        $i = 0;
        foreach ($this->mViewData['post_section'] as $section) {
            $this->mViewData['post_section'][$i]['section'] = $this->Postmodel->getSectionParameters($section['section_id'], $section['id']);
            $i++;
        }
//        print_r($this->mViewData['post_section']);
        $this->load->view('edit_posts', $this->mViewData);
        $this->load->view('include/footer');
    }


    public function ajaxrequestPost()
    {
        //$postId = $this->input->get('Id');
        $data = $this->input->post();
        $cpurl = $data['title'];
        //print_r($data);
        $data['posts'] = $this->Postmodel->getajaxrequestPost($cpurl);
        if ($data['posts'] == 0) {
            echo $cpurl;
        } else {
            $n = $data['posts'] + 1;
            echo $cpurl . '_' . $n;
        }

    }

    public function insertPost()
    {

        $data = $this->input->post();
        $this->load->library('upload');
//        print_r($data);
        $attachment = "";
        if ($data) {
            if ($_FILES['post_image']['name'] != "") {
                $fieldName = 'post_image';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'post_image' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['post_image'] = $attachment;

            $attachment1 = "";
            if (isset($_FILES['post_html']) && $_FILES['post_html']['name'] != "") {
                $fieldName = 'post_html';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'post_html' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload supost_imageccess"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['post_html'] = $attachment1;
            $this->Postmodel->insertPost($data);
            redirect(base_url() . 'post/' . (($data['title'] == 'Post') ? '' : 'type'));
        }
    }

    public function viewpost()
    {

        $uri='http://2019fun.justmy.com/'.$this->uri->uri_string().'/';
//        echo ($uri);
        //meta
        $this->mViewData['meta_file'] = 'meta_article';

        $this->mViewData['view'] = $this->Postmodel->getviewData($uri);  //post data
        $post=$this->mViewData['view'];
        $post_id = $this->mViewData['view']['post_id'];
        $this->mViewData['viewDataChannel'] = $this->Postmodel->getviewDataChannel($post_id);
        $this->mViewData['viewDataMarket'] = $this->Postmodel->getviewDataMarket($post_id);
        $this->mViewData['viewDataProfile'] = $this->Postmodel->getviewDataProfile($post_id);

        $this->mViewData['post_section'] = $this->Postmodel->getSectionListById($post_id);

        //meta  cp_title
        $this->mPageTitle = $post['cp_title'];//.' '.$post['cp_title2'];

        $this->render('view_single_post', 'article_layout');
    }

    public function updatePost()
    {
        $this->load->library('upload');
        $data = $this->input->post();
        if (count($data['markets']) > 0) {
            $this->Postmodel->updatePostMarket($data['post_id'], $data['markets']);
        } else {
            $this->Postmodel->deleteAllPostMarket($data['post_id']);
        }

        if (count($data['channel']) > 0) {
            $this->Postmodel->updatePostChannel($data['post_id'], $data['channel']);
        } else {
            $this->Postmodel->deleteAllPostChannel($data['post_id']);
        }

        if (count($data['profile']) > 0) {
            $this->Postmodel->updatePostProfile($data['post_id'], $data['profile']);
        } else {
            $this->Postmodel->deleteAllPostProfile($data['post_id']);
        }

        //if(count(($data['post_status']) > 0) || count(($data['post_notes']) > 0)){
        //$this->Postmodel->updatePostStatus($data['post_id'], $data);
        //}else{
        //$this->Postmodel->deletePostStatus($data['post_id']);
        //}

        $attachment = "";
        if ($data) {
            if ($_FILES['post_image']['name'] != "") {
                $fieldName = 'post_image';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'post_image' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
        }
        $data['post_image'] = $attachment;  //logo_image

        $attachment3 = "";
        if ($data) {
            if ($_FILES['cp_post_facebook_image']['name'] != "") {
                $fieldName = 'cp_post_facebook_image';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment3 = 'cp_post_facebook_image' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment3));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
        }
        $data['cp_post_facebook_image'] = $attachment3;

        $attachment1 = "";
        if ($data) {
            if ($_FILES['post_html']['name'] != "") {
                $fieldName = 'post_html';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'post_html' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['post_html'] = $attachment1;

            if ($result = $this->Postmodel->updatePost($data)) {

                redirect(base_url() . 'post/editPost/' . $data['post_id']);
            }
        }
    }

    public function postStatus()
    {

        $data['statusLists'] = $this->Postmodel->getPostStatusById($this->input->get('id'));
        //echo "<pre>"; print_r($data); die;
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('status_post', $data);
        $this->load->view('include/footer');
    }

    public function addPostStatus()
    {
        $postId = $this->input->get('Id');
        $data = $this->input->post();
        $this->load->library('upload');
        if ($result = $this->Postmodel->addPostStatus($postId, $data)) {
            redirect(base_url() . 'post/postStatus?id=' . $postId);
        }
    }

    public function deletePost()
    {
        $id = $this->input->get('id');
        $result = $this->Postmodel->deletePost($id);
        redirect(base_url() . 'post/?statusall=All');
    }

    public function deleteStatus()
    {
        $postId = $this->input->get('postId');
        //echo "<pre>"; print_r($postId); die;
        $id = $this->input->get('id');
        $result = $this->Postmodel->deleteStatus($id);
        redirect(base_url() . 'post/postStatus?id=' . $postId);
    }

    private function set_upload_options($imageName)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'upload/images';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '50000KB';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $imageName;

        return $config;
    }
}

?>