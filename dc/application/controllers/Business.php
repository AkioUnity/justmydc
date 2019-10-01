<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of Admin_Controller,
// since no authentication is required
class Business extends MY_Controller
{
    public function index()
    {
        $spotlight = $this->Categoriesmodel->getSpotlight($this->input->get('id'));
        redirect("business/sub?id=".$this->input->get('id')."&&name=".$this->input->get('name')."&&sub_id=".$spotlight->id."&&sub_name=".$spotlight->cc_title);
    }

    public function sub()
    {
        $this->mViewData['sub_categories'] = $this->Categoriesmodel->getCategories($this->input->get('id'));
        $sub_category=$this->Categoriesmodel->getCategory($this->input->get('sub_id'));
        $this->mViewData['sub_category']=$sub_category;
        $sic_code=$sub_category->cc_siccode;
        $this->mViewData['profile_list'] = $this->Categoriesmodel->getProfileList($sic_code,$this->input->get('sub_id')-$this->input->get('id'),$this->market['cbsa_code']);

        $this->mViewData['ads'] = $this->Postmodel->getInteractiveAds(1);

        $this->mViewData['meta_file'] = 'meta_category';
        $this->render('categories', 'main_layout');
    }

    public function unclaimed($id){
        $profile=$this->Categoriesmodel->getProfile($id);
        $this->mViewData['row']=$profile[0];
        $sic_code=$profile[0]['sic_code'];
        //meta
        $this->mViewData['sub_category']=$this->Categoriesmodel->getCategoryFromSic($sic_code);
        $this->mViewData['meta_file'] = 'meta_unclaimed';

        $this->mViewData['ads'] = $this->Postmodel->getInteractiveAds(1);
        $this->render('unclaimed', 'main_layout');
    }

    public function claimed(){
        $zip=$this->input->post('zip');
        $name=$this->input->post('name');
        if (!$zip){  //at the first
            $this->render('profile/search_business_view');
        }
        else{
            $this->mViewData['profile_list'] = $this->Categoriesmodel->searchProfileList($zip,$name);
            if (sizeof($this->mViewData['profile_list'])>0)
                $this->render('profile/search_business_result_view');
            else{
                $this->mViewData['categories'] = $this->Categoriesmodel->getDropDown(0);
                $this->render('profile/add_business_view');
            }
        }
    }
}