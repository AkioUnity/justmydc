<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_social_model extends MY_Model
{
    protected $_table='profile_social';

    public function updateProfileSocial($data = NULL, $profileId = NULL)
    {
        $this->delete_by('profile_id', $profileId);
        foreach ($data['ps_name'] as $key => $name) {
            $arr = array(
                "Profile_id" => $profileId,
                "ps_name" => $name,
                "ps_url" => $data['ps_url'][$key]
            );
            $this->insert($arr);
        }
        $arr['Profile_id']=$profileId;
        $arr['hotlink_name']=$data['label1'];
        $arr['ps_url']=$data['link1'];
        $this->insert($arr);
        $arr['hotlink_name']=$data['label2'];
        $arr['ps_url']=$data['link2'];
        $this->insert($arr);
    }
}

?>