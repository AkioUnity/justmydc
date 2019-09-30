<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Categoriesmodel');
        $this->load->model('channel/Channelmodel');
//        $this->load->helper('common');
        $this->load->library("user_agent");
//
//        if ($this->session->userdata('user_role') == '4') {
//            redirect(base_url() . 'categories');
//        }
    }

    public function index()
    {
        $data['c_categories'] = $this->Categoriesmodel->getCategories();
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_categories_list');
        $this->load->view('include/footer');

    }

    public function secondaryCategoryList()
    {

        $data['c_categories'] = $this->Categoriesmodel->getSecCategories($this->input->get('id'));
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_seccategories_list');
        $this->load->view('include/footer');

    }

    public function tertiaryCategoryList()
    {

        $data['c_categories'] = $this->Categoriesmodel->getTerCategories($this->input->get('id'));

        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_tercategories_list');
        $this->load->view('include/footer');

    }

    public function addCategories()
    {
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_categories');
        $this->load->view('include/footer');
    }

    public function addPrimeryCategory()
    {

        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_categories');
        $this->load->view('include/footer');

    }

    public function addSubcategories()
    {

        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_Subcategories');
        $this->load->view('include/footer');
    }

    public function addTercategories()
    {
        $this->load->view('include/header');
        $this->load->view('include/breadcrum');
        $this->load->view('add_Tercategories');
        $this->load->view('include/footer');
    }

    public function insertCategories()
    {
        $data = $this->input->post();
        $this->load->library('upload');
        $attachment = "";
        if ($data) {
            if ($_FILES['cc_featuredimage']['name'] != "") {
                $fieldName = 'cc_featuredimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'cc_featuredimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_featuredimage'] = $attachment;
            $attachment1 = "";
            if ($_FILES['cc_fbimage']['name'] != "") {
                $fieldName = 'cc_fbimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'cc_fbimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_fbimage'] = $attachment1;
            if ($result = $this->Categoriesmodel->insertCategories($data)) {
                //echo $this->db->last_query();
                redirect(base_url() . 'categories/');
            }
        }
    }

    public function insertSubcategories()
    {
        //echo $_GET['name']; die;
        $data = $this->input->post();
        $this->load->library('upload');
        $attachment = "";
        if ($data) {
            if ($_FILES['cc_featuredimage']['name'] != "") {
                $fieldName = 'cc_featuredimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'cc_featuredimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_featuredimage'] = $attachment;
            $attachment1 = "";
            if ($_FILES['cc_fbimage']['name'] != "") {
                $fieldName = 'cc_fbimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'cc_fbimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_fbimage'] = $attachment1;
            if ($result = $this->Categoriesmodel->insertSubcategories($data)) {
                redirect(base_url() . 'categories/secondaryCategoryList?id=' . $this->input->get('parent_id') . '&&name=' . $this->input->get('name'));
            }
        }
    }

    public function insertTercategories()
    {
        $data = $this->input->post();
        $this->load->library('upload');
        $attachment = "";
        if ($data) {
            if ($_FILES['cc_featuredimage']['name'] != "") {
                $fieldName = 'cc_featuredimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'cc_featuredimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_featuredimage'] = $attachment;
            $attachment1 = "";
            if ($_FILES['cc_fbimage']['name'] != "") {
                $fieldName = 'cc_fbimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'cc_fbimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_fbimage'] = $attachment1;
            if ($result = $this->Categoriesmodel->insertTercategories($data)) {
                redirect(base_url() . 'categories/tertiaryCategoryList?id=' . $this->input->get('parent_id') . '&&name=' . $this->input->get('name'));
            }
        }
    }


    public function editCategories()
    {
        $data['categories'] = $this->Categoriesmodel->getCategoriesedit($this->input->get('id'));
        $data['sub_categories'] = $this->Categoriesmodel->getSecCategories($this->input->get('id'));
        //echo "<pre>";  print_r($data['categories']); die;
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('edit_categories');
        $this->load->view('include/footer');
    }

    public function editSecCategories()
    {
        $data['categories'] = $this->Categoriesmodel->getCategoriesedit($this->input->get('id'));
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('edit_seccategories');
        $this->load->view('include/footer');
    }

    public function editTerCategories()
    {
        $data['categories'] = $this->Categoriesmodel->getCategoriesedit($this->input->get('id'));
        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('edit_tercategories');
        $this->load->view('include/footer');
    }

    public function viewCategories()
    {

        $this->load->view('include/header', $data);
        $this->load->view('include/breadcrum');
        $this->load->view('view_categories');
        $this->load->view('include/footer');
    }

    public function updateCategories()
    {
        $this->load->library('upload');
        $data = $this->input->post();
//        print_r($data);
        if ($data) {
            $attachment = "";
            if ($_FILES['cc_featuredimage']['name'] != "") {
                $fieldName = 'cc_featuredimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'cc_featuredimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_featuredimage'] = $attachment;
            $attachment1 = "";
            if ($_FILES['cc_fbimage']['name'] != "") {
                $fieldName = 'cc_fbimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'cc_fbimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_fbimage'] = $attachment1;
            if ($result = $this->Categoriesmodel->updateCategories($data)) {
                redirect(base_url() . 'categories/');
            }
        }
    }

    public function updateSecCategories()
    {
        //echo $_GET['parent_id']; die;
        $this->load->library('upload');
        $data = $this->input->post();
        if ($data) {
            $attachment = "";
            if ($_FILES['cc_featuredimage']['name'] != "") {
                $fieldName = 'cc_featuredimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'cc_featuredimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_featuredimage'] = $attachment;
            $attachment1 = "";
            if ($_FILES['cc_fbimage']['name'] != "") {
                $fieldName = 'cc_fbimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'cc_fbimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_fbimage'] = $attachment1;
            if ($result = $this->Categoriesmodel->updateSecCategories($data)) {
                //print_r($data); die;
                redirect(base_url() . 'categories/secondaryCategoryList?id=' . $this->input->get('parent_id') . '&&name=' . $this->input->get('name'));
            }
        }
    }

    public function updateTerCategories()
    {
        $this->load->library('upload');
        $data = $this->input->post();
        if ($data) {
            $attachment = "";
            if ($_FILES['cc_featuredimage']['name'] != "") {
                $fieldName = 'cc_featuredimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment = 'cc_featuredimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_featuredimage'] = $attachment;
            $attachment1 = "";
            if ($_FILES['cc_fbimage']['name'] != "") {
                $fieldName = 'cc_fbimage';
                $ext = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                $attachment1 = 'cc_fbimage' . time() . '.' . $ext;
                $this->upload->initialize($this->set_upload_options($attachment1));

                if ($this->upload->do_upload($fieldName)) {
                    $msg = "upload success"; //die;
                } else {
                    $error = array('error' => $this->upload->display_errors());

                }
            }
            $data['cc_fbimage'] = $attachment1;

            if ($result = $this->Categoriesmodel->updateTerCategories($data)) {
                //echo $this->input->get('parent_id'); die;
                //print_r($data); die;
                redirect(base_url() . 'categories/tertiaryCategoryList?id=' . $this->input->get('parent_id') . '&&name=' . $this->input->get('name'));
            }
        }
    }

    public function deleteCategories()
    {
        $id = $this->input->get('id');

        $result = $this->Categoriesmodel->deleteCategories($id);
        //echo $this->db->last_query(); die;
        redirect(base_url() . 'categories/');
    }


    private function set_upload_options($imageName)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'upload/images';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '50000KB';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $imageName;

        return $config;
    }
}
?>