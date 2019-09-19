<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Postmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getviewData($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_c_posts');
        if ($postId) {
            $this->db->where("cp_url", $postId);
        }
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function getviewDataChannel($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_post_channels');
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getviewDataMarket($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_post_market');
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getviewDataProfile($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_post_connect');
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getSectionListById($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_post_sections');
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $this->db->order_by("order");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPostSpotLights($market_id)
    {
        $this->db->select('wp_9z7072s58w_post_spotlight.*,wp_9z7072s58w_c_posts.cp_url');
        $this->db->from('wp_9z7072s58w_post_spotlight');
        $this->db->join('wp_9z7072s58w_c_posts','wp_9z7072s58w_c_posts.post_id=wp_9z7072s58w_post_spotlight.post_id');
        $this->db->join('wp_9z7072s58w_post_market','wp_9z7072s58w_post_market.post_id=wp_9z7072s58w_post_spotlight.post_id');
        $this->db->limit(5);
        $this->db->where("spotlight_image IS NOT NULL", null,false);
        $this->db->where("spotlight_image!=", '');
        $this->db->where("market_id", National_market_id);
        $this->db->or_where("market_id", $market_id);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    //----------------- ads

    function getInteractiveAds($cn=3,$ad_type=NULL)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_ads');
        $this->db->where("ad_layout", 'interactive');
        if ($ad_type)
            $this->db->where("ad_type", $ad_type);
        $this->db->limit($cn);
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query->result();
    }

    function getAd($ad_type,$ad_layout='interactive')
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_ads');
        $this->db->where("ad_layout", $ad_layout);
        $this->db->where("ad_type", $ad_type);
        $this->db->limit(1);
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query->row();
    }

    //-----------------------  not interactive ads

    function getSkyscraperAds($market_id)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_ads');
        $this->db->join('wp_9z7072s58w_ad_markets','wp_9z7072s58w_ad_markets.ad_id=wp_9z7072s58w_ads.id');
        $this->db->where("ad_layout", 'skyscraper');
        $this->db->where("market_id", National_market_id);
        $this->db->or_where("market_id", $market_id);
        $this->db->limit(2);
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query->result();
    }


    public function get6Posts($channel_id=16,$is_spotlight=true)  //Headlines
    {
        $this->db->select('wp_9z7072s58w_c_posts.*');
        $this->db->from('wp_9z7072s58w_c_posts');
        $this->db->join('wp_9z7072s58w_post_channels','wp_9z7072s58w_c_posts.post_id=wp_9z7072s58w_post_channels.post_id');
        if ($is_spotlight){
            $this->db->where("spotlight_link_text", '');
            $this->db->where("cp_post_image !=", '');
        }

        $this->db->where("wp_9z7072s58w_post_channels.channel_id", $channel_id);  //Headlines


//        $this->db->where("cp_image !=", '');
//        $this->db->where("cp_url IS NOT NULL", null,false);
//        $this->db->where("cp_title IS NOT NULL", null,false);
//        $this->db->where("cp_title2 IS NOT NULL", null,false);
        $this->db->limit(6);
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query->result();
    }

    //----------------  get channel

    function getChannel($ChannelId = NULL)
    {
        $this->db->select('*');
        $this->db->from('wp_9z7072s58w_channel');
        if ($ChannelId) {
            $this->db->where("channel_id", $ChannelId);
            $query = $this->db->get();
            return $query->row();
        }
        else{
            $this->db->select('channel_id,channel_name,channel_title');
            $this->db->where("is_active", 1);
            $query = $this->db->get();
            return $query->result();
        }
    }

//----------------  end---------------

    function getPosts($PostId = NULL, $ps_status)
    {
        $this->db->select('*');
        $this->db->from('c_posts i');
        $this->db->join('c_users b', 'b.id = i.c_user_id');
        $this->db->join('post_status c', 'c.post_id = i.post_id');
        $this->db->order_by("i.post_id", "DESC");

        if (!empty($ps_status)) {
            $this->db->where("ps_status", $ps_status);
        } else {
            $this->db->where("ps_status", "pending");
        }
        $this->db->where("c_user_id !=", 0);
        $query = $this->db->get();
//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function addSection($postId = null, $section_id, $section_name)
    {
        $data = array(
            "post_id" => $postId,
            "section_id" => $section_id,
            "section_name" => $section_name
        );
        $this->db->insert('wp_9z7072s58w_post_sections', $data);
        return true;
    }


    function getPostsonly($PostId = NULL)
    {
        $this->db->select('*');
        $this->db->from('c_posts i');
        $this->db->join('c_users b', 'b.id = i.c_user_id');
        $this->db->order_by("i.post_id", "DESC");
        if ($PostId) {
            $this->db->where("post_id", $PostId);
        }
        else {
            $this->db->where("c_user_id !=", 0);
        }

        $query = $this->db->get();
//echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function getPostTypeList($PostId = NULL)
    {
        $this->db->select('*');
        $this->db->from('c_posts');
        $this->db->order_by("post_id", "DESC");
        if ($PostId) {
            $this->db->where("post_id", $PostId);
        }
        $this->db->where("c_user_id", 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSectionParameters($section_id=null,$post_section_id=null)
    {
        $this->db->select('section_parameters.*,section_parameters_posts.value,section_parameters_posts.id as parameter_id');
        $this->db->from('section_parameters');
        if ($section_id) {
            $this->db->join('section_parameters_posts', 'section_parameters.id = section_parameters_posts.section_parameter_id');
            $this->db->where("section_id", $section_id)
                ->where("post_section_id", $post_section_id);
        }
//        $this->db->order_by("post_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    function getSectionParametersPosts($post_id)
    {
        $this->db->select('section_parameters_posts.*');
        $this->db->from('section_parameters_posts');
        $this->db->join('post_sections', 'post_sections.id = section_parameters_posts.post_section_id');
        $this->db->where("post_sections.post_id", $post_id);
        $query = $this->db->get();
        return $query->result();
    }

    function getSectionParametersPostsByPost_Section_Id($post_section_id)
    {
        $this->db->select('*');
        $this->db->from('section_parameters_posts');
        $this->db->where("post_section_id", $post_section_id);
        $query = $this->db->get();
        return $query->result();
    }

    function insertPost($data = NULL)
    {
//        print_r($data);
        $arr['post'] = array(

            "cp_title" => $data['post_title'],
            "cp_title2" => $data['post_title2'],
            "cp_post_excerpt" => $data['post_excerpt'],
            "cp_url" => "http://2019fun.justmy.com/post/viewpost/" . $data['post_url'] . "/",
            "url_handal" => $data['post_url'] . "/",
            "cp_type" => $data['post_type'],
            "cp_author_name" => $data['post_author'],
            "Post_date" => $data['Post_date'],
            "c_user_id" => $data['post_user'],
            "cp_image" => $data['post_image'],
            "cp_post_image" => $data['post_featured_image'],
            //"cp_html"=>$data['post_html']

        );
//        print_r($arr['post']);
        //echo "<pre>";  print_r($arr['post']); die;
        $this->db->insert('c_posts', $arr['post']);
        $insertId = $this->db->insert_id();
//        print_r($insertId);
        foreach ($data['markets'] as $market) {
            $array['post_market'] = array(
                "market_id" => $market,
                "post_id" => $insertId
            );
            $this->db->insert('post_market', $array['post_market']);
        }

        foreach ($data['channel'] as $channel) {
            $array['post_channel'] = array(
                "channel_id" => $channel,
                "post_id" => $insertId
            );
            $this->db->insert('post_channels', $array['post_channel']);
        }

        foreach ($data['profile'] as $profile) {
            $array['post_profile'] = array(
                "profile_id" => $profile,
                "post_id" => $insertId
            );
            $this->db->insert('post_connect', $array['post_profile']);
        }
//        print_r($data);
        $this->updatePostSection($data, $insertId);
        $this->updatePost_Spotlight($data, $insertId);
        return true;
    }

    public function updatePost_Spotlight($data, $id)
    {
        $this->db->where('post_id', $id);
        $this->db->delete('post_spotlight');
        $add_data = array(
            "post_id" => $id,
            "spotlight_image" => $data['spotlight_image'],
            "link_text" => $data['link_text'],
        );
        $this->db->insert('post_spotlight', $add_data);
    }

    public function updatePostSection($data, $id)
    {
//        print_r($data);
        $parameters=$this->getSectionParametersPosts($id);  //original parameters

        if ($data['isChangedPostType']=="true"){  //remove original sections and add post_type sections
            foreach ($parameters as $parameter){
                $this->db->where('id', $parameter->id);
                $this->db->delete('section_parameters_posts');
            }

            $this->db->where('post_id', $id);
            $this->db->delete('post_sections');

            $sections=$this->getSectionListById($data['post_type']);
//            print_r($sections);
            foreach ($sections as $section) {
                $post_order = array(
                    "order" => $section['order'],
                    "section_id" => $section['section_id'],
                    "section_name" => $section['section_name'],
                    "post_id" => $id,
                    'content'=>$section['content']
                );
                $this->db->insert('post_sections', $post_order);
                $insert_id = $this->db->insert_id();
                $section_parameters=$this->getSectionParametersPostsByPost_Section_Id($section['id']);
                foreach ($section_parameters as $parameter){
                    $insert_data = array(
                        "post_section_id" => $insert_id,
                        "section_parameter_id" => $parameter->section_parameter_id,
                        "value" => $parameter->value
                    );
                    $this->db->insert('section_parameters_posts', $insert_data);
                }
            }
            return;
        }
//        print_r($parameters);
        foreach ($parameters as $parameter){
            if ($data['parameter'.$parameter->id]){
                $param_data=array('value'=>$data['parameter'.$parameter->id]);
                $this->db->update('section_parameters_posts', $param_data, array('id' => $parameter->id));
            }
        }
        for ($i = 1; $i < count($data['post_section_id']); $i++) {
            $content = $this->db->select('section_form')
                ->from('section_master')
                ->where('section_id',$data['section_id'][$i])
                ->get()->row()->section_form;
//            echo ($content);

//            print_r($section_parameters);
            if ($data['post_section_id'][$i]>0){
                if ($data['section_id'][$i]==0){
                    $this->db->where('id', $data['post_section_id'][$i]);
                    $this->db->delete('post_sections');
                    $this->db->where('past_section_id', $data['post_section_id'][$i]);
                    $this->db->delete('section_parameters_posts');
                    continue;
                }
                $section_parameters= $this->getSectionParameters($data['section_id'][$i],$data['post_section_id'][$i]);
                foreach ($section_parameters as $parameter){
                    $content=str_replace($parameter->name,$parameter->value,$content);
                }
                $post_order = array(
                    "order" => $data['order'][$i],
                    'content'=>$content
                );
                $this->db->update('post_sections', $post_order, array('id' => $data['post_section_id'][$i]));
            }
            else {
//                print($content);
                $section_parameters= $this->db->select('*')
                    ->from('section_parameters')
                    ->where('section_id',$data['section_id'][$i])
                    ->get()->result();

                foreach ($section_parameters as $parameter){
                    $content=str_replace($parameter->name,$parameter->default_value,$content);
                }
                $post_order = array(
                    "order" => $data['order'][$i],
                    "section_id" => $data['section_id'][$i],
                    "section_name" => $data['section_name'][$i],
                    "post_id" => $id,
                    'content'=>$content
                );

                $this->db->insert('post_sections', $post_order);
                $insert_id = $this->db->insert_id();
                foreach ($section_parameters as $parameter){
                    $insert_data = array(
                        "post_section_id" => $insert_id,
                        "section_parameter_id" => $parameter->id,
                        "value" => $parameter->default_value
                    );
//                    print_r($insert_data);
                    $this->db->insert('section_parameters_posts', $insert_data);
//                    print_r($this->db->error());
                }
            }
        }
    }

    public function updatePost($data)
    {
        $id = $data['post_id'];
        if ($data['post_user'] == null)
            $data['post_user'] = 0;

        if (empty($data['post_image']) && !empty($data['post_html'])) {
            $url = str_replace("/", "", $data['post_url']);
            $arr['post'] = array(
                "cp_title" => $data['post_title'],
                "cp_title2" => $data['post_title2'],
                "cp_post_excerpt" => $data['post_excerpt'],
                "cp_url" => "http://2019fun.juspost_htmltmy.com/" . $url . "/",
                "url_handal" => $url . "/",
                "cp_author_name" => $data['post_author'],
                "c_user_id" => $data['post_user'],
                //"cp_image"=>$data['post_image'],
                "cp_html" => $data['post_html']
            );
        }
        if (!empty($data['post_image']) && empty($data['post_html'])) {
            $url = str_replace("/", "", $data['post_url']);
            $arr['post'] = array(

                "cp_title" => $data['post_title'],
                "cp_title2" => $data['post_title2'],
                "cp_post_excerpt" => $data['post_excerpt'],
                "cp_url" => "http://2019fun.juspost_htmltmy.com/" . $url . "/",
                "url_handal" => $url . "/",

                "cp_author_name" => $data['post_author'],
                "c_user_id" => $data['post_user'],
                "cp_image" => $data['post_image'],
                //"cp_html"=>$data['post_html']

            );
        }
        if (!empty($data['post_image']) && !empty($data['post_html'])) {
            $url = str_replace("/", "", $data['post_url']);
            $arr['post'] = array(

                "cp_title" => $data['post_title'],
                "cp_title2" => $data['post_title2'],
                "cp_post_excerpt" => $data['post_excerpt'],
                "cp_url" => "http://2019fun.juspost_htmltmy.com/" . $url . "/",
                "url_handal" => $url . "/",

                "cp_author_name" => $data['post_author'],
                "c_user_id" => $data['post_user'],
                "cp_image" => $data['post_image'],
                "cp_html" => $data['post_html']

            );
        }

        if (empty($data['post_image']) && empty($data['post_html'])) {
            $url = str_replace("/", "", $data['post_url']);
            $arr['post'] = array(

                "cp_title" => $data['post_title'],
                "cp_title2" => $data['post_title2'],
                "cp_post_excerpt" => $data['post_excerpt'],
                "cp_url" => "http://2019fun.justmy.com/post/viewpost/" . $url . "/",
                "url_handal" => $url . "/",

                "cp_author_name" => $data['post_author'],
                "c_user_id" => $data['post_user'],
                //"cp_image"=>$data['post_image'],
                //"cp_html"=>$data['post_html']

            );
        }
        $this->updatePost_Spotlight($data, $id);
        $this->updatePostSection($data, $id);
        if (!empty($data['cp_post_facebook_image'])){
            $arr['post']['cp_post_facebook_image'] = $data['cp_post_facebook_image'];
        }
        $arr['post']['cp_post_image'] = $data['post_featured_image'];
        $arr['post']['cp_type'] = $data['post_type'];
//        print_r($data);
//        print_r($arr['post']);
        $result1 = $this->db->update('c_posts', $arr['post'], array('post_id' => $id));
        return true;
    }

    public function addPostStatus($postId = null, $data = Null)
    {
        $array['post_status'] = array(
            "ps_status" => $data['post_status'],
            "ps_notes" => $data['post_notes'],
            "post_id" => $postId
        );
        //echo "<pre>";  print_r($array); die;
        $this->db->insert('post_status', $array['post_status']);
        return true;
    }

    public function updatePostStatus($postId = null, $data = Null)
    {
        $this->deletePostStatus($postId);
        $array['post_status'] = array(
            "ps_status" => $data['post_status'],
            "ps_notes" => $data['post_notes'],
            "post_id" => $postId
        );
        $this->db->insert('post_status', $array['post_status']);
        return true;
    }

    public function deletePostStatus($postId = NULL)
    {
        if ($postId) {
            $this->db->where('post_id', $postId);
            $this->db->delete('post_status');
        }
    }

    public function getPostStatusById($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('post_status');
        $this->db->order_by("id", "DESC");
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $query = $this->db->get();

        //echo $this->db->last_query();
        return $query->result_array();
    }


    public function getajaxrequestPost($cpurl)
    {
        $this->db->select('*');
        $this->db->from('c_posts');
        $this->db->order_by("post_id", "DESC");
        if ($cpurl) {
            $this->db->like("cp_url", $cpurl);
        }
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function updatePostMarket($postId = null, $data = Null)
    {
        $this->deleteAllPostMarket($postId);
        foreach ($data as $market) {
            $array['post_market'] = array(
                "market_id" => $market,
                "post_id" => $postId
            );
            $this->db->insert('post_market', $array['post_market']);
        }
        return true;
    }

    public function deleteAllPostMarket($postId = NULL)
    {
        if ($postId) {
            $this->db->where('post_id', $postId);
            $this->db->delete('post_market');
        }
    }

    public function getAddedMarketsById($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('post_market');
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function updatePostChannel($postId = null, $data = Null)
    {
        $this->deleteAllPostChannel($postId);
        foreach ($data as $channel) {
            $array['post_channels'] = array(
                "channel_id" => $channel,
                "post_id" => $postId
            );

            $this->db->insert('post_channels', $array['post_channels']);
        }
        return true;
    }

    public function deleteAllPostChannel($postId = NULL)
    {
        if ($postId) {
            $this->db->where('post_id', $postId);
            $this->db->delete('post_channels');
        }
    }

    public function getAddedChannelById($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('post_channels');
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function updatePostProfile($postId = null, $data = Null)
    {
        $this->deleteAllPostProfile($postId);
        foreach ($data as $profile) {
            $array['post_profile'] = array(
                "profile_id" => $profile,
                "post_id" => $postId
            );

            $this->db->insert('post_connect', $array['post_profile']);
        }
        return true;
    }

    public function deleteAllPostProfile($postId = NULL)
    {
        if ($postId) {
            $this->db->where('post_id', $postId);
            $this->db->delete('post_connect');
        }
    }

    public function getAddedProfileById($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('post_connect');
        if ($postId) {
            $this->db->where("post_id", $postId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    function deletePost($id)
    {
        //$this->deletePostStatus($id);
        //$this->deleteAllPostMarket($id);
        //$this->deleteAllPostChannel($id);
        //$this->deleteAllPostProfile($id);
        //$this->db->set('ps_status', "Trash");
        //$this->db->where('post_id', $id);
        //$this->db->update('post_status');
        //echo $this->db->last_query();
        $this->db->where('post_id', $id);
        $this->db->delete('c_posts');
    }

    function deleteStatus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('post_status');
    }

}

?>