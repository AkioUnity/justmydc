<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adsmodel extends MY_Model
{
    protected $_table='ads';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAds($AdsId = NULL)
    {
        $this->db->select('*');
        $this->db->from('ads a');
        $this->db->join('profiles c', 'c.profile_id = a.profile_id');
        $this->db->order_by("id", "DESC");
        if ($AdsId) {
            $this->db->where("id", $AdsId);
            $query = $this->db->get();
            return $query->row_array();
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAddedCategoriesById($AdsId = NULL)
    {
        $this->db->select('*');
        $this->db->from('ad_cat');
        if ($AdsId) {
            $this->db->where("ad_id", $AdsId);
        }
        $query = $this->db->get();

//echo $this->db->last_query();
        return $query->result_array();

    }

    public function getAddedMarketsById($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('ad_markets');
        if ($id) {
            $this->db->where("ad_id", $id);
        }
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getAddedChannelById($AdsId = NULL)
    {
        $this->db->select('*');
        $this->db->from('ad_channels');
        if ($AdsId) {
            $this->db->where("ad_id", $AdsId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function updateTables($data)
    {
        if (isset($data['markets']) && count($data['markets']) > 0) {
            $this->updatePostMarket($data['id'], $data['markets']);
        } else {
            $this->deleteAllPostMarket($data['id']);
        }
        if (isset($data['categories']) && count($data['categories']) > 0) {
            $this->updateAdCategory($data['id'], $data['categories']);
        } else {
            $this->deleteAllAdCategories($data['id']);
        }
        if (isset($data['channel']) && count($data['channel']) > 0) {
            $this->updateAdChannel($data['id'], $data['channel']);
        } else {
            $this->deleteAllAdChannel($data['id']);
        }
    }

    public function updateAd($data)
    {
        $arr['ads'] = array(
            "profile_id" => $data['profile_name'],
            "ad_type" => $data['ad_type'],
            "ad_url" => $data['ad_url'],
            "ad_video" => $data['ad_video'],
            'html' => $data['html'],
            'is_html' => isset($data['is_html']) ? $data['is_html'] : '',
        );

        if (!empty($data['ad_image'])) {
            $arr['ads']['ad_image'] = $data['ad_image'];
        }
        if (!empty($data['ad_logo'])) {
            $arr['ads']['ad_logo'] = $data['ad_logo'];
        }
        if (!empty($data['ad_background_image'])) {
            $arr['ads']['ad_background_image'] = $data['ad_background_image'];
        }

        $arr['ads']['ad_layout'] = $data['ad_layout'];
        $arr['ads']['ad_campaign_title'] = $data['ad_campaign_title'];
        $arr['ads']['ad_link_type'] = $data['ad_link_type'];
        $arr['ads']['ad_text_title'] = $data['ad_text_title'];
        $arr['ads']['ad_sub_title'] = $data['ad_sub_title'];
        $arr['ads']['ad_link_statement'] = $data['ad_link_statement'];
        $arr['ads']['ad_code'] = $data['ad_code'];
        $arr['ads']['ad_background_color'] = $data['ad_background_color'];

//        echo "<pre>";  print_r($data); die;
        if (isset($data['id'])) {
            $this->db->update('ads', $arr['ads'], array('id' => $data['id']));
        } else {
            $this->db->insert('ads', $arr['ads']);
            $insertId = $this->db->insert_id();
            $data['id'] = $insertId;
        }

        $this->updateTables($data);

        //echo $this->db->last_query(); die;
        return true;
    }

    public function updateAdCategory($AdsId = null, $data = Null)
    {
        $this->deleteAllAdCategories($AdsId);
        //echo "<pre>";  print_r($data); die;
        foreach ($data as $categorie) {
            $array['ad_cat'] = array(
                "cat_id" => $categorie,
                "ad_id" => $AdsId
            );
            //echo "<pre>";  print_r($array['cat_channels']); die;
            $this->db->insert('ad_cat', $array['ad_cat']);
            //echo $this->db->last_query(); die;
        }
        return true;
    }

    public function updateAdChannel($AdsId = null, $data = Null)
    {
        $this->deleteAllAdChannel($AdsId);
        //echo "<pre>";  print_r($data); die;
        foreach ($data as $channel) {
            $array['ad_channels'] = array(
                "channel_id" => $channel,
                "ad_id" => $AdsId
            );
            //echo "<pre>";  print_r($array['cat_channels']); die;
            $this->db->insert('ad_channels', $array['ad_channels']);
            //echo $this->db->last_query(); die;
        }
        return true;
    }

    function deleteAd($id)
    {
        $this->deleteAllAdChannel($id);
        $this->deleteAllAdCategories($id);
        $this->db->where('id', $id);
        $this->db->delete('ads');
        //echo $this->db->last_query(); die;
    }

    public function deleteAllAdChannel($AdsId = NULL)
    {
        if ($AdsId) {
            $this->db->where('ad_id', $AdsId);
            $this->db->delete('ad_channels');
        }
    }

    public function deleteAllAdCategories($AdsId = NULL)
    {
        if ($AdsId) {
            $this->db->where('ad_id', $AdsId);
            $this->db->delete('ad_cat');
        }
    }

    public function updatePostMarket($id = null, $data = Null)
    {
        $this->deleteAllPostMarket($id);
        foreach ($data as $market) {
            $array['post_market'] = array(
                "market_id" => $market,
                "ad_id" => $id
            );
            $this->db->insert('ad_markets', $array['post_market']);
        }
        return true;
    }

    public function deleteAllPostMarket($id = NULL)
    {
        if ($id) {
            $this->db->where('ad_id', $id);
            $this->db->delete('ad_markets');
        }
    }
}

?>