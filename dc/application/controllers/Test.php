<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Test extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ad($id)
    {
        $this->load->model('ads/Adsmodel');

        $this->mViewData['ad_id'] = -1;
        $this->mViewData['ads'] = $this->Adsmodel->get_many($id);

//        $this->mViewData['skyscraperAds'] = $this->Postmodel->getSkyscraperAds();
//        print_r($this->mViewData['posts']);
        //-------content
        if ($this->mViewData['ads'][0]->ad_layout=='interactive')
            $this->render('sections/interactive_ad.php', 'main_layout');
        else
            echo "soon ...";
    }
}
