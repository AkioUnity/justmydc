<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Marketmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    function get_enums($table = 'markets', $field = 'type')
    {
        $query = "SHOW COLUMNS FROM " . $table . " LIKE '$field'";
        $row = $this->db->query($query)->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row, $enum_array);
        $enum_fields = $enum_array[1];
        foreach ($enum_fields as $key => $value) {
            $enums[$value] = $value;
        }
        return $enums;
    }

    function ActiveStatus()

    {
        $id = $this->input->get('inactiveStatusId');
        $value = $this->input->get('statusValue');
        $arr = array(
            'blog_status' => $value
        );
        $this->db->where('market_id', $id);
        $this->db->update('markets', $arr);
        // echo $this->db->last_query(); die;
        return true;

    }

    public function getMarketList($status = NULL, $id = NULL, $searchTerm = NULL, $title = null, $category = NULL)
    {

        $this->db->order_by("market_id", "desc");
        if ($id) {
            $this->db->where("market_id", $id);
        }
        if ($searchTerm) {
            $this->db->where("market_site", $searchTerm);
        }
        if ($title) {
            $this->db->where("market_site_title", strtolower(trim($title)));
        }
        $query = $this->db->get('markets');
        //	echo $this->db->last_query(); die;
        return $query->result_array();
    }

    public function getAddedChannelsById($MarketId = NULL)
    {
        $this->db->select('*');
        $this->db->from('market_channels');
        if ($MarketId) {
            $this->db->where("market_id", $MarketId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function addmarketinfo($data)
    {

        $query = $this->db->get_where('markets ', array('market_name' => $data['market_site']));

        if ($query->num_rows() > 0) {
            redirect(base_url() . "admin/Market/addmarketinfo?msg=market_siteexits");
        } else {
            //echo "<pre>"; print_r ($data); die;
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'market_logo' => $data['market_logo'],
                'cbsa_code' => $data['cbsa_code'],
                'market_header_image' => $data['market_header_image'],
                'market_facebook_image' => $data['market_facebook_image']
            );
            $arr['markets']['type'] =$data['type'];
            //echo "<pre>"; print_r ($arr); die;
            $this->db->insert('markets ', $arr['markets']);
            //echo "<pre>"; print_r ($res); die;
            return true;

        }

    }

    public function updateMarketinfo($data)
    {
        $id = $this->input->get('Id');
        //echo $id;die;
        if (!empty($data['market_logo']) && !empty($data['market_header_image']) && !empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code'],
                'market_logo' => $data['market_logo'],
                'market_header_image' => $data['market_header_image'],
                'market_facebook_image' => $data['market_facebook_image']
            );
            //echo "<pre>"; print_r ($data); die;

        }
        if (empty($data['market_logo']) && !empty($data['market_header_image']) && !empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code'],
                //'market_logo' => $data['market_logo'],
                'market_header_image' => $data['market_header_image'],
                'market_facebook_image' => $data['market_facebook_image']
            );
            //echo "<pre>"; print_r ($data); die;

        }
        if (!empty($data['market_logo']) && empty($data['market_header_image']) && !empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code'],
                'market_logo' => $data['market_logo'],
                //'market_header_image' => $data['market_header_image']
                'market_facebook_image' => $data['market_facebook_image']
            );
            //echo "<pre>"; print_r ($data); die;

        }
        if (!empty($data['market_logo']) && !empty($data['market_header_image']) && empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code'],
                'market_logo' => $data['market_logo'],
                'market_header_image' => $data['market_header_image']
                //'market_facebook_image' => $data['market_facebook_image']
            );
            //echo "<pre>"; print_r ($data); die;

        }
        if (empty($data['market_logo']) && empty($data['market_header_image']) && !empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code'],
                //'market_logo' => $data['market_logo'],
                //'market_header_image' => $data['market_header_image'],
                'market_facebook_image' => $data['market_facebook_image']
            );
            //echo "<pre>"; print_r ($data); die;

        }
        if (empty($data['market_logo']) && !empty($data['market_header_image']) && empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code'],
                //'market_logo' => $data['market_logo'],
                'market_header_image' => $data['market_header_image'],
                //'market_facebook_image' => $data['market_facebook_image']
            );
            //echo "<pre>"; print_r ($data); die;

        }
        if (!empty($data['market_logo']) && empty($data['market_header_image']) && empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code'],
                'market_logo' => $data['market_logo'],
                //'market_header_image' => $data['market_header_image']
                //'market_facebook_image' => $data['market_facebook_image']
            );
            //echo "<pre>"; print_r ($data); die;

        }
        if (empty($data['market_logo']) && empty($data['market_header_image']) && empty($data['market_facebook_image'])) {
            $arr['markets'] = array(
                'market_name' => $data['market_name'],
                'market_site_title' => $data['market_site_title'],
                'market_site' => $data['market_site'],
                'market_description' => $data['market_description'],
                'market_facebook' => $data['market_facebook'],
                'market_instagram' => $data['market_instagram'],
                'market_youtube' => $data['market_youtube'],
                'market_twitter' => $data['market_twitter'],
                'market_snapchat' => $data['market_snapchat'],
                'cbsa_code' => $data['cbsa_code']
                //'market_logo' => $data['market_logo'],
                //'market_header_image' => $data['market_header_image'],
                //'market_facebook_image' => $data['market_facebook_image']
            );

        }
        $arr['markets']['type'] =$data['type'];
        //echo "<pre>"; print_r ($data); die;
        $this->db->update('markets ', $arr['markets'], array('market_id' => $id));
        return true;


    }

    public function updateMarketChannel($MarketId = null, $data = Null)
    {

        $this->deleteAllMarketChannel($MarketId);
//echo "<pre>";  print_r($data); die;

        foreach ($data as $channel) {
            $array['market_channels'] = array(
                "channel_id" => $channel,
                "market_id" => $MarketId
            );
            //echo "<pre>";  print_r($array['market_channels']); die;
            $this->db->insert('market_channels', $array['market_channels']);
            //echo $this->db->last_query(); die;
        }
        return true;
    }

    public function deleteAllMarketChannel($MarketId = NULL)
    {
        if ($MarketId) {
            $this->db->where('market_id', $MarketId);
            $this->db->delete('market_channels');
            //echo $this->db->last_query(); die;
        }

    }
}

?>