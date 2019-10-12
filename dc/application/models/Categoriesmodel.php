<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categoriesmodel extends MY_Model
{
    protected $_table = 'c_categories';
    protected $primary_key = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    function getSpotlight($CategoriesId=NULL){
        $this->db->select('spotlight_id');
        $this->db->from('c_categories');
        $this->db->where('id', $CategoriesId);
        $query = $this->db->get();
        $ret=$query->row();
        $spotlight_id=$ret->spotlight_id;

        $this->db->select('id,cc_title');
        $this->db->from('c_categories');
        if ($spotlight_id==0){
            $this->db->where('parent_id', $CategoriesId);
        }
        else{
            $this->db->where('id', $spotlight_id);
        }
        $query = $this->db->get();
        return $query->row();

    }

    function getCategories($CategoriesId=NULL){
		$this->db->select('*');
		$this->db->from('c_categories');
		if($CategoriesId){
			$this->db->where('parent_id', $CategoriesId);
//            $this->db->where('spotlight', 1);
		}else{
			$this->db->where("parent_id", 0);
		}
		 
		$query = $this->db->get();
		return $query->result_array();
	}

    function getDropDown($id=0){
        $this->db->select('id,cc_title');
        $this->db->from('c_categories');
        $this->db->where('parent_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getInfogroupList($sic_code,$cbsa_code){
        $this->db->select('infogroup_id,name,logo_url,street,city,state');
        $this->db->from('cai_places');
//        $this->db->where("logo_url !=","");
        $this->db->where("cbsa_code",$cbsa_code);
        $this->db->where("sic_code",$sic_code);
//        $this->db->limit(600);
        $this->db->order_by('name','asc');
//        $this->db->limit(12,$CategoriesId*5);
        $query = $this->db->get();
//        print_r($this->db->last_query());
//echo $this->db->last_query();
        return $query->result_array();
    }

    function searchProfileList($zip,$name){
        $this->db->select('infogroup_id,name,logo_url,street,city,state,zip');
        $this->db->from('`cai_places`');
        $this->db->like('zip', $zip);
        $this->db->like('name', $name);
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getInfogroup($id){
        $this->db->select("latitude,longitude,street,suite,city,state,name,phone,website,facebook_url,instagram_url,twitter_url,company_description,sic_code");
//        $this->db->select('*');
        $this->db->from('`cai_places`');
        $this->db->where("infogroup_id",$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getCategoriesedit($CategoriesId=NULL){
		$this->db->select('*');
		$this->db->from('c_categories');
		if($CategoriesId){
			$this->db->where('id', $CategoriesId);
		}
		 
		$query = $this->db->get();
//	echo $this->db->last_query();
		return $query->result_array();

	} 
	function getTerCategories($CategoriesId=NULL){
		
		//echo "<pre>";  print_r($data['categories']); die;
		$this->db->select('*');
		$this->db->from('c_categories');
		if($CategoriesId){
			$this->db->where('parent_id', $CategoriesId);
		}else{

			$this->db->where("parent_id", 0);
		}
		 
		$query = $this->db->get();
//	echo $this->db->last_query();
		return $query->result_array();

	} 

	public function updateCategories($data){
		$id = $this->input->get('Id');
		if(!empty($data['cc_featuredimage']) && !empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(empty($data['cc_featuredimage']) && !empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage']
					//"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(!empty($data['cc_featuredimage']) && empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					//"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(empty($data['cc_featuredimage']) && empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords']	
					//"cc_fbimage"=>$data['cc_fbimage'],
					//"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}

		$result1=$this->db->update('c_categories', $arr['c_categories'], array('id' => $data['id']));
		return true;
	}
	public function updateSecCategories($data){
		
		$id = $this->input->get('Id');
		if(!empty($data['cc_featuredimage']) && !empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(empty($data['cc_featuredimage']) && !empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage']
					//"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(!empty($data['cc_featuredimage']) && empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					//"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(empty($data['cc_featuredimage']) && empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords']	
					//"cc_fbimage"=>$data['cc_fbimage'],
					//"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}

		$result1=$this->db->update('c_categories', $arr['c_categories'], array('id' => $data['id']));
		return true;
	}
	public function updateTerCategories($data){
		//echo $this->input->get('parent_id'); die;
		$id = $this->input->get('Id');
		if(!empty($data['cc_featuredimage']) && !empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(empty($data['cc_featuredimage']) && !empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage']
					//"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(!empty($data['cc_featuredimage']) && empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					//"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}
		if(empty($data['cc_featuredimage']) && empty($data['cc_fbimage'])){
			$arr['c_categories'] = array(	
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords']	
					//"cc_fbimage"=>$data['cc_fbimage'],
					//"cc_featuredimage"=>$data['cc_featuredimage']
			);
		}

		$result1=$this->db->update('c_categories', $arr['c_categories'], array('id' => $data['id']));
		return true;
	}
	
	function insertCategories($data=NULL){
		$arr['c_categories'] = array(	
					
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
					
			);
			$this->db->insert('c_categories', $arr['c_categories']);
			return true;
	}
	function insertSubcategories($data=NULL){
		$arr['c_categories'] = array(	
					"parent_id"=>$this->input->get('parent_id'),
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
					
			);
			$this->db->insert('c_categories', $arr['c_categories']);
			return true;
	}	
	function insertTercategories($data=NULL){
		$arr['c_categories'] = array(	
					"parent_id"=>$this->input->get('parent_id'),
					"cc_title"=>$data['cc_title'],
					"cc_description"=>$data['cc_description'],
					"cc_keywords"=>$data['cc_keywords'],	
					"cc_fbimage"=>$data['cc_fbimage'],
					"cc_featuredimage"=>$data['cc_featuredimage']
					
			);
			$this->db->insert('c_categories', $arr['c_categories']);
			return true;
	}
	
	function deleteCategories($id)
	{
		$this->deleteChildrenCategories($id);
	   $this->db->where('id', $id);
	   $this->db->delete('c_categories'); 
	   //echo $this->db->last_query(); die;
	}
	function deleteChildrenCategories($id)
	{
		//$this->deleteAllChannelCategories($id);
	   $this->db->where('parent_id', $id);
	   $this->db->delete('c_categories'); 
	   //echo $this->db->last_query(); die;
	}
}
?>