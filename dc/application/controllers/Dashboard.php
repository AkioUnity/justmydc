<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->mViewData['skyscraperAds'] = $this->Postmodel->getSkyscraperAds($this->default_market_id);
    }

    public function index()
    {
        $this->mViewData['ads'] =array($this->Postmodel->getAd('member'),
            $this->Postmodel->getAd('sponsorship'),
            $this->Postmodel->getAd('channel'));

        $this->mViewData['posts'] = $this->Postmodel->get6Posts();
        $this->mViewData['spotlights'] = $this->Postmodel->getPostSpotLights($this->default_market_id);

        $this->render('dashboard', 'full_width');
    }

    public function channel($id=16)
    {
        $this->mViewData['posts'] = $this->Postmodel->get6Posts($id,false);
//        print_r($this->mViewData['posts']);
        //-------content
        $this->mViewData['ads'] = $this->Postmodel->getInteractiveAds(1,"Channel");
        $this->mViewData['channel'] = $this->Postmodel->getChannel($id);
        $this->mViewData['channel']->html=str_replace('[Market Name]', $this->market['market_name'],$this->mViewData['channel']->html);

        $this->mViewData['meta_file'] = 'meta_channel';
        $this->render('channel_view', 'main_layout');
    }
}
