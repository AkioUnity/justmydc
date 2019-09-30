<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sectionmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getSection($SectionId = NULL)
    {
        $this->db->select('*');
        $this->db->from('section_master');
        if ($SectionId) {
            $this->db->where("section_id", $SectionId);
        }
        $this->db->order_by("section_id", "DESC");
        $query = $this->db->get();

        //echo $this->db->last_query(); die;
        return $query->result_array();

    }

    public function getSectionParametersById($postId = NULL)
    {
        $this->db->select('*');
        $this->db->from('section_parameters');
        if ($postId) {
            $this->db->where("section_id", $postId);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function insertSection($data = NULL)
    {
        $arr['section'] = array(
            "section_name" => $data['section_name'],
            "section_icon" => $data['section_icon'],
            "section_input" => $data['section_input'],
            "section_form" => $data['section_form'],
            "section_html_css" => $data['section_html_css']
        );
        //echo "<pre>";  print_r($arr['section']); die;
        $this->db->insert('section_master', $arr['section']);
        //echo $this->db->last_query(); die;
        return true;
    }

    public function updateSection($data)
    {
        $id = $this->input->get('Id');
        if (!empty($data['section_icon'])) {
            $arr['section'] = array(
                "section_name" => $data['section_name'],
                "section_icon" => $data['section_icon'],
                "section_input" => $data['section_input'],
                "section_form" => $data['section_form']
            );
        }
        if (empty($data['section_icon'])) {
            $arr['section'] = array(
                "section_name" => $data['section_name'],
                //"section_icon"=>$data['section_icon'],
                "section_input" => $data['section_input'],
                "section_form" => $data['section_form']
            );
        }
        //echo "<pre>";  print_r($arr['section']); die;
        $result1 = $this->db->update('section_master', $arr['section'], array('section_id' => $data['id']));
        $this->updateSectionParameter($data,$data['id']);
        //echo $this->db->last_query(); die;
        return true;
    }

    public function updateSectionParameter($data,$id){
//                print_r($data);
        for ($i=1;$i<count($data['section_parameter_id']);$i++){
            $post_order = array(
                "name" => $data['name'][$i],
                "type" => $data['type'][$i],
                "default_value" => $data['default_value'][$i],
                "section_id" => $id
            );
            if ($data['section_parameter_id'][$i]>0){
                $this->db->update('section_parameters', $post_order, array('id' => $data['section_parameter_id'][$i]));
            }
            else{
                $this->db->insert('section_parameters', $post_order);
            }
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
        $this->db->where('section_id', $id);
        $this->db->update('section_master', $arr);
        return true;
    }

    function deleteSection($id)
    {
        $this->db->where('section_id', $id);
        $this->db->delete('section_master');
        //echo $this->db->last_query(); die;
    }

}

?>