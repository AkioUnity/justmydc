<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Sectionmodel');
        $this->load->helper('common');
        $this->load->library("user_agent");
    }

    public function index()
    {
        redirect(base_url() . 'section/all');
    }

    public function all()
    {
        $data['section_list'] = $this->Sectionmodel->getSection();
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('view_sections_list', $data);
        $this->load->view('include/footer');
    }

    public function addSection()
    {
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_section');
        $this->load->view('include/footer');

    }

    public function editSection()
    {
        $data['section_list'] = $this->Sectionmodel->getSection($this->input->get('id'));
        $data['parameter_list'] = $this->Sectionmodel->getSectionParametersById($this->input->get('id'));
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('edit_section', $data);
        $this->load->view('include/footer');
    }

    public function insertSection()
    {
        $data = $this->input->post();
        $this->load->library('upload');
        $attachment = "";
        if ($_FILES['section_icon']['name'] != "") {
            $fieldName = 'section_icon';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'section_icon' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));

            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['section_icon'] = $attachment;
        //echo "<pre>"; print_r($data);die;
        if ($result = $this->Sectionmodel->insertSection($data)) {
            redirect(base_url() . 'section/all');
        }
    }

    public function updateSection()
    {
        $data = $this->input->post();
        $this->load->library('upload');
        $attachment = "";
        if ($_FILES['section_icon']['name'] != "") {
            $fieldName = 'section_icon';
            $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
            $attachment = 'section_icon' . time() . '.' . $ext;
            $this->upload->initialize($this->set_upload_options($attachment));


            if ($this->upload->do_upload($fieldName)) {
                $msg = "upload success"; //die;
            } else {
                $error = array('error' => $this->upload->display_errors());

            }
        }
        $data['section_icon'] = $attachment;
        //echo "<pre>"; print_r($data);die;
        if ($result = $this->Sectionmodel->updateSection($data)) {
            redirect(base_url() . 'section/all');
        }
    }

    public function ActiveStatus()
    {
        $result = $this->Sectionmodel->ActiveStatus();
        if ($result) {
            redirect(base_url() . 'section/all');
        }
    }

    public function deleteSection()
    {
        $id = $this->input->get('id');
        $result = $this->Sectionmodel->deleteSection($id);
        redirect(base_url() . 'section/');
    }

    private function set_upload_options($imageName)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'upload/sectiondata';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4';
        $config['max_size'] = '50000KB';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $imageName;

        return $config;
    }

}

?>