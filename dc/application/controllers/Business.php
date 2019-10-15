<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Business extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profilemodel');
    }

    public function index()
    {
        $spotlight = $this->Categoriesmodel->getSpotlight($this->input->get('id'));
        redirect("business/sub?name=" . $this->input->get('name') . "&&sub_id=" . $spotlight->id);
    }

    public function load_sub_category($sic_code)
    {
        if (!isset($this->mViewData['post']) || ($this->mViewData['post']->profile_type_id == Claimed_free_profile_id))
            $this->mViewData['profile_list'] = $this->Categoriesmodel->getInfogroupList($sic_code, $this->market['cbsa_code']);

        if (isset($this->mViewData['post']) && ($this->mViewData['post']->profile_type_id == Deluxe_profile)) {
            $this->mViewData['ads'] = $this->Postmodel->getInteractiveAds(2); // result(); //array, object
        } else
            $this->mViewData['ads'] = $this->Postmodel->getInteractiveAds(1); // result(); //array, object
    }

    public function sub()
    {

        $sub_category = $this->Categoriesmodel->get($this->input->get('sub_id'));
        $this->mViewData['sub_categories'] = $this->Categoriesmodel->getCategories($sub_category->parent_id);

        $sub_category->html = str_replace('[Market Name]', $this->market['market_name'], $sub_category->html);

        $this->mViewData['sub_category'] = $sub_category;
        $this->mViewData['parent_title'] = $this->input->get('name');

        $sic_code = $sub_category->cc_siccode;
        $this->load_sub_category($sic_code);

        $this->mViewData['meta_file'] = 'meta_category';
//updated
        $this->mViewData['exclusiveResult'] = $this->Profilemodel->getExclusiveResult();
        $this->mViewData['posts'] = $this->Postmodel->get6Posts(16, false,2);  //results
        $this->render('categories', 'main_layout');
    }

    public function loadCaiPlacesAndCategoryTitle($id)
    {
        $profile = $this->Categoriesmodel->getInfogroup($id);
        $this->mViewData['row'] = $profile[0];
        $sic_code = $profile[0]['sic_code'];
        //meta
        $this->mViewData['sub_category'] = $this->Categoriesmodel->get_by('cc_siccode', $sic_code);  // for meta file
        $this->mViewData['parent_title'] = ($this->Categoriesmodel->get($this->mViewData['sub_category']->parent_id))->cc_title;  // for parent name for category
        $this->load_sub_category($sic_code);
        $this->mViewData['meta_file'] = 'meta_unclaimed';
    }

    public function unclaimed($id)
    {  //infogroup_id
        $this->loadCaiPlacesAndCategoryTitle($id);
        $this->render('unclaimed', 'main_layout');
    }

    public function standard($id)
    {

        $this->mViewData['keywords'] = $this->Profilemodel->getProfileFeatures($id);  //array
        $this->claimed($id);
    }

    public function profile($id)
    {
        $this->standard($id);
    }

    public function deluxe($id)
    {
        $this->standard($id);
    }

    public function pro($id)
    {
        $this->standard($id);
    }

    public function media($id)
    {

        $this->mViewData['mediaList'] = $this->Profilemodel->getProfileMedia($id);
        $this->render('sections/media_carousel', 'main_layout');
    }

    public function claimed($id)
    {
//        $mediaList = $this->Profilemodel->getProfileMedia($id);
//        $spotlights=array();
//        foreach ($mediaList as $media){
//            $carousel=new stdClass();
//            $carousel->spotlight_image=$media['pm_file_path']!=''?profile_image_url($media['pm_file_path']):$media['pm_url'];
//            array_push($spotlights,$carousel);
//        }
        $this->mViewData['mediaList'] = $this->Profilemodel->getProfileMedia($id);
//        $this->mViewData['spotlights'] = $spotlights;
        $this->mViewData['profileSocial'] = $this->Profilemodel->getProfileSocial($id);
        $this->mViewData['post'] = $this->Profilemodel->get($id);

        $this->mViewData['profile_title']= $this->mViewData['post']->profile_name;
        $infogroup_id = $this->mViewData['post']->infogroup_id;
        if (!$infogroup_id)
            $infogroup_id = 409071852;
        $this->loadCaiPlacesAndCategoryTitle($infogroup_id);
        $this->render('claimed_view', 'main_layout');
    }

    public function claimed0()
    {
        $zip = $this->input->post('zip');
        $name = $this->input->post('name');
        if (!$zip) {  //at the first
            $this->render('profile/search_business_view');
        } else {
            $this->mViewData['profile_list'] = $this->Categoriesmodel->searchProfileList($zip, $name);
            if (sizeof($this->mViewData['profile_list']) > 0)
                $this->render('profile/search_business_result_view');
            else {
                $this->mViewData['categories'] = $this->Categoriesmodel->getDropDown(0);
                $this->render('profile/add_business_view');
            }
        }
    }
}
