<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller
{

    public function viewpost()
    {
        $this->load->model('Postmodel');

        $uri='https://2019fun.justmy.com/'.$this->uri->uri_string().'/';
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
}

?>