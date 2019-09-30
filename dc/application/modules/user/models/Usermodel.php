<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model

{

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

    }

    public function getUser()
    {
        $ProductStatus = $this->input->post('status');

        $this->db->select('*');
        $this->db->from('c_users  i');
        $this->db->join('markets b', 'b.market_id = i.market_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            return $row;
        }
        return false;
    }

    public function getUserOnly()
    {
        $this->db->select('*');
        $this->db->from('c_users');
        $this->db->where("id !=", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            return $row;
        }
        return false;
    }

    public function deleteUser()
    {
        $id = $this->input->get('UserId');
        $this->db->where('id', $id);
        $this->db->delete('c_users');
    }


    public function addUser($data)
    {

        $query = $this->db->get_where('c_users ', array('user_name' => $data['username']));

        if ($query->num_rows() > 0) {
            redirect(base_url() . "user/User/addUser?msg=emailexits");
        } else {
            //echo "<pre>"; print_r ($data); die;
            $arr['c_users'] = array(
                'market_id' => $data['market_name'],
                'user_type' => $data['usertype'],
                'first_name' => $data['firstname'],
                'last_name' => $data['lastname'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => md5($data['password'])
            );


            //echo "<pre>"; print_r ($arr); die;
            $this->db->insert('c_users', $arr['c_users']);
            //echo "<pre>"; print_r ($res); die;
            return true;

        }

    }

    public function updateUser($data)
    {
        $id = $this->input->get('userId');
        //echo $id;die;
        if ($data) {
            $arr['c_users'] = array(
                'market_id' => $data['market_name'],
                'user_type' => $data['usertype'],
                'first_name' => $data['firstname'],
                'last_name' => $data['lastname'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => md5($data['password'])
            );


            $this->db->update('c_users', $arr['c_users'], array('id' => $id));
            return true;
        } else {
            return false;
        }
    }

    public function userUpdateWi($data)
    {
        $id = $this->input->get('userId');
        if ($data) {
            /* $arr['user'] = array(
                         'user_name' => $data['emailAddress'],
                         'password' => md5($data['password'])

                         );*/
            $arr['user'] = array(
                'user_name' => $data['emailAddress']
            );
            $arr['user_details'] = array(
                'email' => $data['emailAddress'],
                'name' => $data['name'],
                'mobile_no' => $data['mobileno']

            );
            $this->db->update('user ', $arr['user'], array('id_user' => $id));

            $this->db->update('user_details', $arr['user_details'], array('id_user' => $id));
            return $arr;
        } else {
            return false;
        }
    }

    public function getUserId()
    {
        $id = $this->input->get('UserId');

        $this->db->select('*');
        $this->db->from('c_users  i');
        //$this->db->join('user_details id','id.id_user = i.id_user');
        $this->db->where('i.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        }
        return false;
    }

    function cancelUserStatus($data)
    {
        $id = $this->input->get('inactiveStatusId');
        $value = $this->input->get('statusValue');
        $arr = array(
            'status' => $value
        );
        $this->db->where('id', $id);
        $this->db->update('c_users', $arr);

        return true;

    }

}

?>