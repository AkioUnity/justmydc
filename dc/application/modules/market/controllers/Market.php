<?php
class Market extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('market/Marketmodel');
		$this->load->model('channel/Channelmodel');
		$this->load->model('blogcategories/Categoriesmodel');
		$this->load->library('upload');
		if(!isLoggedIn() && !isSuperAdmin())
         redirect('login');
	}
	
	public function index(){	
		$data['markets'] = $this->Marketmodel->getMarketList();
		
		//echo "<pre>"; print_r($data); die;
		$this->load->view('include/header',$data);
		$this->load->view('include/breadcrum');
		$this->load->view('view_market_list');
		$this->load->view('include/footer');
	}
	
	public function addMarket(){
		//$data['categoryLists'] = $this->Categoriesmodel->addCategory();
		//$this->Marketmodel->getBlogCategories(); 
		//print_r($data['categoryLists']); die;
        $data['enum_type']=$this->Marketmodel->get_enums();

		$this->load->view('include/header'); 
		$this->load->view('include/breadcrum');
		$this->load->view('add_market',$data);
		$this->load->view('include/footer');
	}

	public function editMarket(){
        $data['enum_type']=$this->Marketmodel->get_enums();
		$data['channelLists']=$this->Channelmodel->getChannel();
		$data['channelAddedLists']=$this->Marketmodel->getAddedChannelsById($this->input->get('id'));
		
		$data['markets'] = $this->Marketmodel->getMarketList('',$this->input->get('Id'));
//		echo "<pre>"; print_r($data); die;
		$this->load->view('include/header',$data);
		$this->load->view('include/breadcrum');
		$this->load->view('edit_market');
		$this->load->view('include/footer');
	}
	
	private function set_upload_options($imageName)
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = 'upload/images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '50000KB';
		$config['overwrite']     = FALSE;
		$config['file_name']	 = $imageName;

		return $config;
	}
	
	
	public function addMarketinfo(){
		$data=$this->input->post();
		$attachment ="";
		if($data){
				
		    if($_FILES['market_header_image']['name'] !="")
		    {
				$fieldName = 'market_header_image';
				$ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
				$attachment = 'market_header_image'.time().'.'.$ext;
				$this->upload->initialize($this->set_upload_options($attachment));
				
				if($this->upload->do_upload($fieldName))
				{
					$msg = "upload success"; //die;
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					
				}
			}
		$data['market_header_image'] = $attachment;
		$attachment1 ="";
		    if($_FILES['market_facebook_image']['name'] !="")
		    {
				$fieldName = 'market_facebook_image';
				$ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
				$attachment1 = 'market_facebook_image'.time().'.'.$ext;
				$this->upload->initialize($this->set_upload_options($attachment1));
				
				if($this->upload->do_upload($fieldName))
				{
					$msg = "upload success"; //die;
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					
				}
			}
		$data['market_facebook_image'] = $attachment1;
		$attachment2 ="";
		    if($_FILES['market_logo']['name'] !="")
		    {
				$fieldName = 'market_logo';
				$ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
				$attachment2 = 'market_logo'.time().'.'.$ext;
				$this->upload->initialize($this->set_upload_options($attachment2));
				
				if($this->upload->do_upload($fieldName))
				{
					$msg = "upload success"; //die;
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					
				}
			}
		$data['market_logo'] = $attachment2;
		
		if($result=$this->Marketmodel->addmarketinfo($data)){				
			redirect(base_url().'Market/');
			}
		}
	}
		
	public function updateMarketinfo(){
		$data = $this->input->post($this->input->get('id'));
		//echo "<pre>"; print_r($data['market_id']); die;
		if(count($data['channels']) > 0){
			$this->Marketmodel->updateMarketChannel($data['market_id'], $data['channels']);
		}else{
			$this->Marketmodel->deleteAllMarketChannel($data['market_id']);
		}
		$attachment ="";
		if($data){
				
		    if($_FILES['market_header_image']['name'] !="")
		    {
				$fieldName = 'market_header_image';
				$ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
				$attachment = 'market_header_image'.time().'.'.$ext;
				$this->upload->initialize($this->set_upload_options($attachment));
				
				if($this->upload->do_upload($fieldName))
				{
					$msg = "upload success"; //die;
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					
				}
			}
		$data['market_header_image'] = $attachment;
		$attachment1 ="";
		    if($_FILES['market_facebook_image']['name'] !="")
		    {
				$fieldName = 'market_facebook_image';
				$ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
				$attachment1 = 'market_facebook_image'.time().'.'.$ext;
				$this->upload->initialize($this->set_upload_options($attachment1));
				
				if($this->upload->do_upload($fieldName))
				{
					$msg = "upload success"; //die;
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					
				}
			}
		$data['market_facebook_image'] = $attachment1;
		$attachment2 ="";
		    if($_FILES['market_logo']['name'] !="")
		    {
				$fieldName = 'market_logo';
				$ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
				$attachment2 = 'market_logo'.time().'.'.$ext;
				$this->upload->initialize($this->set_upload_options($attachment2));
				
				if($this->upload->do_upload($fieldName))
				{
					$msg = "upload success"; //die;
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					
				}
			}
		$data['market_logo'] = $attachment2;
		
			if($result = $this->Marketmodel->updateMarketinfo($data))
			{
			  redirect(base_url().'Market');
			}	
		}
	}
}
?>