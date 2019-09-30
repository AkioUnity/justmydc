<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Channelmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getChannel($ChannelId = NULL)
    {
        $this->db->select('*');
        $this->db->from('channel');
        if ($ChannelId) {
            $this->db->where("channel_id", $ChannelId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();

    }

    public function getAddedCategoriesById($ChannelId = NULL)
    {
        $this->db->select('*');
        $this->db->from('cat_channels');
        if ($ChannelId) {
            $this->db->where("channel_id", $ChannelId);
        }
        $query = $this->db->get();

//		echo $this->db->last_query();
        return $query->result_array();
    }

    public function updateChannel($data)
    {
        $id = $this->input->get('Id');
        if (!empty($data['channel_facebook_image'])) {
            $arr['channel'] = array(
                //"category_id"=>$data['cc_title'],
                "channel_name" => $data['channel_name'],
                "channel_title" => $data['channel_title'],
                "channel_description" => $data['channel_description'],
                "channel_keywords" => $data['channel_keywords'],
                "channel_facebook_image" => $data['channel_facebook_image']

            );
        }
        if (empty($data['channel_facebook_image'])) {
            $arr['channel'] = array(
                //"categories_id"=>$data['cc_title'],
                "channel_name" => $data['channel_name'],
                "channel_title" => $data['channel_title'],
                "channel_description" => $data['channel_description'],
                "channel_keywords" => $data['channel_keywords']
                //"channel_facebook_image"=>$data['channel_facebook_image']

            );
        }
        $arr['channel']['featured_image'] = $data['featured_image'];
        $arr['channel']['html'] = $data['html'];
        //echo "<pre>";  print_r($arr['channel']); die;
        $result1 = $this->db->update('channel', $arr['channel'], array('channel_id' => $data['channel_id']));
        //echo $this->db->last_query(); die;
        return true;
    }

    public function updateChannelCategory($channelId = null, $data = Null)
    {
        $this->deleteAllChannelCategories($channelId);
        //echo "<pre>";  print_r($data); die;
        foreach ($data as $categorie) {
            $array['cat_channels'] = array(
                "category_id" => $categorie,
                "channel_id" => $channelId
            );
            //echo "<pre>";  print_r($array['cat_channels']); //die;
            $this->db->insert('cat_channels', $array['cat_channels']);
            //echo $this->db->last_query(); die;
        }
        return true;
    }

    function insertChannel($data = NULL)
    {
        $arr['channel'] = array(
            //"categories_id"=>$data['cc_title'],
            "channel_name" => $data['channel_name'],
            "channel_title" => $data['channel_title'],
            "channel_description" => $data['channel_description'],
            "channel_keywords" => $data['channel_keywords'],
            "channel_facebook_image" => $data['channel_facebook_image']

        );
        $arr['channel']['featured_image'] = $data['featured_image'];
        $arr['channel']['html'] = $data['html'];
        //echo "<pre>";  print_r($arr['channel']); die;
        $this->db->insert('channel', $arr['channel']);
        return true;
    }

    function deleteChannel($id)
    {
        $this->deleteAllChannelCategories($id);
        $this->db->where('channel_id', $id);
        $this->db->delete('channel');
        //echo $this->db->last_query(); die;
    }

    public function deleteAllChannelCategories($channelId = NULL)
    {
        if ($channelId) {
            $this->db->where('channel_id', $channelId);
            $this->db->delete('cat_channels');
            //echo $this->db->last_query(); die;
        }
    }

    function ActiveStatus()
    {
        $id = $this->input->get('inactiveStatusId');
        $value = $this->input->get('statusValue');
        $arr = array(
            'is_active' => $value
        );
        //echo "<pre>";  print_r($arr); die;
        $this->db->where('channel_id', $id);
        $this->db->update('channel', $arr);
        return true;
    }
}

?>