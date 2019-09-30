<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categoriesmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getCategories($CategoriesId=NULL){
		$this->db->select('*');
		$this->db->from('c_categories');
		if($CategoriesId){
			$this->db->where('parent_id', $CategoriesId);
		}else{
			$this->db->where("parent_id", 0);
		}
		 
		$query = $this->db->get();
//echo $this->db->last_query();
		return $query->result_array();

	} 
	function getSecCategories($CategoriesId=NULL){
		
		//echo "<pre>";  print_r($data['categories']); die;
		$this->db->select('*');
		$this->db->from('c_categories');
		if($CategoriesId){
			$this->db->where('parent_id', $CategoriesId);
		}else{

			$this->db->where("parent_id", 0);
		}
		 
		$query = $this->db->get();
	//echo $this->db->last_query();
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

		if ($data['spotlight_id']>0){
            $this->db->select('id,cc_title');
            $this->db->from('c_categories');
            $this->db->where('id', $data['spotlight_id']);
            $query = $this->db->get();
            $res=$query->row();
            $arr['c_categories']["spotlight_id"]=$data['spotlight_id'];
            $arr['c_categories']["spotlight_name"]=$res->cc_title;
        }
        $arr['c_categories']['html']=$data['html'];

//        $arr['c_categories']["spotlight"]=$data['spotlight'];
//        print_r($data);
//        print_r($arr['c_categories']);
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
        $arr['c_categories']['html']=$data['html'];
		if (isset($data['spotlight']))
            $arr['c_categories']["spotlight"]=$data['spotlight'];
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
        $arr['c_categories']['html']=$data['html'];

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
        $arr['c_categories']['html']=$data['html'];
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
        $arr['c_categories']['html']=$data['html'];
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