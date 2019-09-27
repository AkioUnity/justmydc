<?php 

class Post_model extends MY_Model {  //for business
    function get_post_by_id($id)
    {
        $query = $this->db->get_where('posts',array('id'=>$id));
        if($query->num_rows()<=0)
        {
            echo 'Invalid post id';
            die;
        }
        else
        {
            return $query->row();
        }
    }

    function insert_post($data)
    {
        $this->db->insert('posts',$data);
        return $this->db->insert_id();
    }

    function update_post($data,$id)
    {
        $this->db->update('posts',$data,array('id'=>$id));
    }
}