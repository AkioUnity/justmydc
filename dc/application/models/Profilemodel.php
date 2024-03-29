<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profilemodel extends MY_Model
{
    protected $primary_key = 'profile_id';
    protected $_table='profiles';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getExclusiveResult()
    {
        $this->db->select('profile_id,profile_name,profile_add,profile_city,profile_st,featured_image,profile_web');
        $this->db->from('profiles');
        $this->db->where("profile_type_id>", 2);  //2=standard
        $query = $this->db->get();
        $res=$query->result();
        foreach ($res as $re){
            $this->db->select('ps_url,ps_name');
            $this->db->from('profile_social');
//        $this->db->order_by("id", "DESC");
            $this->db->where("profile_id", $re->profile_id);
            $this->db->limit(3);
            $query = $this->db->get();
            $re->social_links=$query->result();
        }
//        print_r($res);
        return $res;
    }

    function getProfile0($ProfileId)
    {
        $this->db->select('a.*,d.name as profile_type');
        $this->db->from('profiles a');
        $this->db->join('profile_type d', 'd.id = a.profile_type_id');
        $this->db->where("profile_id", $ProfileId);
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        return $query->row();

    }

    function getProfile($ProfileId = -1)
    {
        $this->db->select('a.*,d.nick');
        $this->db->from('profiles a');
        $this->db->join('profile_type d', 'd.id = a.profile_type_id');
        if ($ProfileId!=-1) {
            $this->db->where("profile_id", $ProfileId);
        }
        $query = $this->db->get();
//        echo $this->db->last_query(); die;
        return $query->result_array();

    }

    function searchProfileList($name){
        $this->db->select('infogroup_id,ANY_VALUE(name) as name,ANY_VALUE(logo_url) as logo_url,ANY_VALUE(street) as street,ANY_VALUE(city) as city,ANY_VALUE(state) as state,ANY_VALUE(zip) as zip');
        $this->db->from('cai_places');
        $this->db->like('name', $name);
        $this->db->limit(100);
        $this->db->group_by('infogroup_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getClaimedProfile($id){
        $this->db->select("latitude,longitude,street,suite,city,state,name,phone,website,facebook_url,instagram_url,twitter_url,company_description,sic_code,zip");
//        $this->db->select('*');
        $this->db->from('cai_places');
        $this->db->where("infogroup_id",$id);
        $query = $this->db->get();
//        echo $this->db->last_query(); die;
        return $query->result_array();
    }


    function getProfileOnly($profile_status=null)
    {
        $this->db->select('*');
        $this->db->from('profiles');
        $this->db->order_by("profile_id", "DESC");
        if (!$profile_status) {
            $this->db->where("profile_status", $profile_status);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function getProfileList($profile_status=null)
    {
        $this->db->select('a.*,d.name as profile_type,d.nick');
        $this->db->from('profiles a');
        $this->db->join('profile_type d', 'd.id = a.profile_type_id');
        $this->db->order_by("profile_id", "DESC");
        if ($profile_status!=null) {
            $this->db->where("profile_status", $profile_status);
        }
        $query = $this->db->get();
//                echo $this->db->last_query(); die;
        $res = $query->result_array();
        for ($i=0;$i<count($res);$i++){
            $id=$res[$i]['profile_id'];
            $this->db->select('market_name');
            $this->db->from('markets a');
            $this->db->join('profile_market b', 'b.market_id = a.market_id');
            $this->db->where("profile_id", $id);
            $query = $this->db->get();
            $market = $query->row();
            $res[$i]['market_name']=isset($market->market_name)?$market->market_name:'';
        }
        return $res;
    }

    function getTypeList()
    {
        $this->db->select('*');
        $this->db->from('profile_type');
        $query = $this->db->get();
        return $query->result();
    }


    function getProfileSocial($ProfileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_social');
//        $this->db->order_by("id", "DESC");
        if ($ProfileId) {
            $this->db->where("profile_id", $ProfileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    function getProfileFeatures($ProfileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_features');
        $this->db->order_by("id", "DESC");
        if ($ProfileId) {
            $this->db->where("profile_id", $ProfileId);
        }
        $query = $this->db->get();

        //echo $this->db->last_query();
        return $query->result_array();

    }

    function getProfileFeaturesDetails($Id = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_features');
        $this->db->order_by("id", "DESC");
        if ($Id) {
            $this->db->where("id", $Id);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    function getProfileMedia($ProfileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_media');
        $this->db->order_by("id", "DESC");
        if ($ProfileId) {
            $this->db->where("profile_id", $ProfileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    function getProfileMediaOnly($Id = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_media');
        if ($Id) {
            $this->db->where("id", $Id);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    function getProfileMap($ProfileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_map');
        $this->db->order_by("id", "DESC");
        if ($ProfileId) {
            $this->db->where("profile_id", $ProfileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    function getProfileReviews($ProfileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_reviews');
        $this->db->order_by("id", "DESC");
        if ($ProfileId) {
            $this->db->where("profile_id", $ProfileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function getAddedMarketsById($profileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_market');
        if ($profileId) {
            $this->db->where("profile_id", $profileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function getAddedProfileById($profileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_type');
        if ($profileId) {
            $this->db->where("profile_id", $profileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function getAddedCategoriesById($profileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_cat');
        if ($profileId) {
            $this->db->where("profile_id", $profileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function getAddedChannelById($profileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_channel');
        if ($profileId) {
            $this->db->where("profile_id", $profileId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function getProfileAdminsById($profileId = NULL)
    {
        $this->db->select('*');
        $this->db->from('profile_admins a');
        $this->db->join('c_users b', 'b.id = a.c_user_id');
        if ($profileId) {
            $this->db->where("profile_id", $profileId);
        }
        $query = $this->db->get();

//        echo $this->db->last_query();
        return $query->result_array();

    }

    public function updateProfileField($field, $value)
    {
        $id = $this->input->get('profileId');
        $arr = array(
            $field => $value
        );
        $this->db->update('profiles', $arr, array('profile_id' => $id));
    }

    public function updateProfileMap($data, $profileId)
    {
        $this->db->update('profiles', $data, array('profile_id' => $profileId));
        //echo $this->db->last_query(); die;
        redirect(base_url() . 'profile/editProfile?id=' . $profileId);
    }

    public function updateProfileReviews($data, $profileId)
    {
        $data['profileReview'] = $this->getProfileReviews($profileId);
        $arr['profile_reviews'] = array(
            "profile_id" => $profileId,
            "profile_id_reviewer" => $data['reviewer'],
            "profile_id_replier" => $data['replier'],
            "pr_stars" => $data['stars'],
            "pr_reviewdate" => $data['review_date'],
            "pr_text" => $data['text'],
            "pr_reply" => $data['reply']
        );
        if (count($data['profileReview']) > 0) {
            $result1 = $this->db->update('profile_reviews', $arr['profile_reviews'], array('profile_id' => $profileId));
        } else {
            $result1 = $this->db->insert('profile_reviews', $arr['profile_reviews']);
        }
        //echo $this->db->last_query(); die;
        redirect(base_url() . 'profile/editProfile?id=' . $profileId);

    }


    public function insertProfileFeatures($data = NULL, $profileId = NULL)
    {
        foreach ($data['FeatureTitle'] as $key => $FeatureTitle) {
            $arr['profile_features'] = array(
                "profile_id" => $profileId,
                "feature_title" => $FeatureTitle,
                "feature_detail" => $data['FeatureDetails'][$key],
                "learn_url" => $data['url'][$key],
                "name_url" => $data['UrlName'][$key]

            );
            //echo "<pre>";  print_r($arr); die;
            $result1 = $this->db->insert('profile_features', $arr['profile_features']);
            //echo $this->db->last_query(); die;
        }
        return true;
    }

    public function updateProfileFeatures($data = NULL, $Id = NULL)
    {
        //echo "<pre>";  print_r($data); die;
        $arr = array(
            "feature_title" => $data['FeatureTitle'],
            "feature_detail" => $data['FeatureDetails'],
            "learn_url" => $data['url'],
            "name_url" => $data['UrlName']
        );
        //echo "<pre>";  print_r($arr); die;
        $result1 = $this->db->update('profile_features', $arr, array('id' => $Id));
        //echo $this->db->last_query(); die;
        return true;
    }


    public function insertProfileMedia($data = NULL, $profileId = NULL)
    {
        //echo "<pre>";  print_r($data); die;
        foreach ($data['media_file_name'] as $key => $value) {
            $arr = array(
                "Profile_id" => $profileId,
                "pm_type" => $data['media_type'][$key],
                "pm_url" => $data['media_url'][$key],
                "title" => $data['media_title'][$key],
                "content" => $data['content'][$key],
                "pm_file_path" => $value

            );
            //echo "<pre>";  print_r($arr); die;
             $this->db->insert('profile_media', $arr);
        }
    }

    public function updateProfileMedia($data = NULL, $profileId = NULL, $Id = NULL)
    {
        //echo "<pre>";  print_r($data); die;
        if (!empty($data['media_file'])) {
            $arr['profile_media'] = array(
                "Profile_id" => $profileId,
                "pm_type" => $data['media_type'],
                "pm_url" => $data['media_url'],
                "title" => $data['media_title'],
                "content" => $data['content'],
                "pm_file_path" => $data['media_file']

            );
        }
        if (empty($data['media_file'])) {
            $arr['profile_media'] = array(
                "Profile_id" => $profileId,
                "pm_type" => $data['media_type'],
                "pm_url" => $data['media_url'],
                "title" => $data['media_title'],
                "content" => $data['content']

            );
        }
        //echo "<pre>";  print_r($arr); die;
        $result1 = $this->db->update('profile_media', $arr['profile_media'], array('id' => $Id));

        return true;
    }

    public function updateProfileAdmin($data = NULL, $profileId = NULL)
    {
        //echo "<pre>";  print_r($data); die;
        foreach ($data['admin'] as $key => $value) {
            $arr['profile_admin'] = array(
                "Profile_id" => $profileId,
                "admin_type" => $data['profile_type'][$key],
                "c_user_id" => $value

            );
            //echo "<pre>";  print_r($arr); die;
            $result1 = $this->db->insert('profile_admins', $arr['profile_admin']);
        }
        return true;
    }

    public function updateProfileImage($data = NULL, $profileId = NULL)
    {
        //echo "<pre>";  print_r($data); die;

        if (!empty($data['pi_image'])) {
            $arr['profile_icon'] = array(
                "pi_image" => $data['pi_image'],
                "pi_type" => $data['image_type'],
                "profile_id" => $profileId
            );
        }
        if (empty($data['pi_image'])) {
            $arr['profile_icon'] = array(
                "pi_type" => $data['image_type'],
                "profile_id" => $profileId
            );
        }
        if (count($data['profileLogo']) > 0) {
            $result1 = $this->db->update('profile_icon', $arr['profile_icon'], array('profile_id' => $profileId));
        } else {
            $result1 = $this->db->insert('profile_icon', $arr['profile_icon']);
        }
        //echo $this->db->last_query(); die;
        redirect(base_url() . 'profile/editProfile?id=' . $profileId);

    }

    public function insertProfile($data = NULL)
    {

        //echo "<pre>";  print_r($arr['profile']); die;
        $this->db->insert('profiles', $data);
        //echo $this->db->last_query(); die;
        $arr = array(
            "market_id" => 28,
            "profile_id" => $this->db->insert_id()
        );
        $this->db->insert('profile_market', $arr);
        return true;
    }

    public function updateProfileMarket($profileId = null, $data = Null)
    {
        $this->deleteAllProfileMarkets($profileId);
        foreach ($data as $market) {
            $arr = array(
                "market_id" => $market,
                "profile_id" => $profileId
            );
            $this->db->insert('profile_market', $arr);
        }
        return true;
    }

    public function updateProfileCategory($profileId = null, $data = Null)
    {
        $this->deleteAllProfileCategory($profileId);
        //echo "<pre>";  print_r($data); die;
        foreach ($data as $categorie) {
            $array['profile_cat'] = array(
                "category_id" => $categorie,
                "profile_id" => $profileId
            );
            $this->db->insert('profile_cat', $array['profile_cat']);
            //echo $this->db->last_query(); die;
        }
        return true;
    }

    public function updateProfileType($profileId = null, $data = Null)
    {
        $this->deleteAllProfileType($profileId);
        foreach ($data as $profile) {
            $array['profile_type'] = array(
                "profile_id_type" => $profile,
                "profile_id" => $profileId
            );

            $this->db->insert('profile_type', $array['profile_type']);
        }
        return true;
    }

    public function updateProfileChannel($profileId = null, $data = Null)
    {
        $this->deleteAllProfileChannel($profileId);
        foreach ($data as $channel) {
            $array['profile_channel'] = array(
                "channel_id" => $channel,
                "profile_id" => $profileId
            );

            $this->db->insert('profile_channel', $array['profile_channel']);
        }
        return true;
    }

    function deleteProfile($id)
    {
        //$this->deleteProfileSocial($id);
        //$this->deleteProfileFeatures($id);
        //$this->deleteProfileMedia($id);
        //$this->deleteProfileAdminTable($id);
        //$this->deleteProfileSlogan($id);
        //$this->deleteProfileAbout($id);
        //$this->deleteProfileMap($id);
        //$this->deleteProfileLogo($id);
        $this->db->set('profile_status', "Delete Pending");
        $this->db->where('profile_id', $id);
        $this->db->update('profiles');
        //echo $this->db->last_query(); die;
        return true;
    }

    public function deleteAllProfileMarkets($profileId = NULL)
    {
        if ($profileId) {
            $this->db->where('profile_id', $profileId);
            $this->db->delete('profile_market');
        }
    }

    public function deleteAllProfileCategory($profileId = NULL)
    {
        if ($profileId) {
            $this->db->where('profile_id', $profileId);
            $this->db->delete('profile_cat');
        }
    }

    public function deleteAllProfileType($profileId = NULL)
    {
        if ($profileId) {
            $this->db->where('profile_id', $profileId);
            $this->db->delete('profile_type');
        }
    }

    public function deleteAllProfileChannel($profileId = NULL)
    {
        if ($profileId) {
            $this->db->where('profile_id', $profileId);
            $this->db->delete('profile_channel');
        }
    }

    public function deleteProfileSocialMedia($Id = NULL)
    {
        if ($Id) {
            $this->db->where('id', $Id);
            $this->db->delete('profile_social');
        }
    }

    public function deleteProfileSocial($Id = NULL)
    {
        if ($Id) {
            $this->db->where('profile_id', $Id);
            $this->db->delete('profile_social');
        }
    }

    public function deleteProfileFeatures($Id = NULL)
    {
        if ($Id) {
            $this->db->where('id', $Id);
            $this->db->delete('profile_features');
        }
    }

    public function deleteProfileMedia($Id = NULL)
    {
        if ($Id) {
            $this->db->where('id', $Id);
            $this->db->delete('profile_media');
        }
    }

    public function deleteProfileAdminTable($Id = NULL)
    {
        if ($Id) {
            $this->db->where('profile_id', $Id);
            $this->db->delete('profile_admins');
        }
    }

    public function deleteProfileAdmin($Id = NULL)
    {
        if ($Id) {
            $this->db->where('id', $Id);
            $this->db->delete('profile_admins');
        }
    }

    public function deleteProfileSlogan($Id = NULL)
    {
        if ($Id) {
            $this->db->where('profile_id', $Id);
            $this->db->delete('profile_slogan');
        }
    }

    public function deleteProfileAbout($Id = NULL)
    {
        if ($Id) {
            $this->db->where('profile_id', $Id);
            $this->db->delete('profile_about');
        }
    }

    public function deleteProfileMap($Id = NULL)
    {
        if ($Id) {
            $this->db->where('profile_id', $Id);
            $this->db->delete('profile_map');
        }
    }

    public function deleteProfileReviews($Id = NULL)
    {
        if ($Id) {
            $this->db->where('profile_id', $Id);
            $this->db->delete('profile_reviews');
        }
    }

    public function deleteProfileLogo($Id = NULL)
    {
        if ($Id) {
            $this->db->where('profile_id', $Id);
            $this->db->delete('profile_icon');
        }
    }
}

?>