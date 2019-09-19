<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_login_model extends CI_Model
{
    public function socail_login($data, $username, $email)
    {
        $table='wp_9z7072s58w_c_users';
        $this->db->where('email', $email);
        $this->db->limit(1);
        $users = $this->db->count_all_results($table);

        if (!isset($users) || $users < 1) {  //register
            $this->load->helper('string');

            $password = random_string('alnum', 10); // we create a random password for the user...

            $register_id = $this->ion_auth->register($username, $password, $email, $data);

            // pr($register_id);die();

            if ($register_id) {
                $this->ion_auth->activate($register_id);
                $this->ion_auth->login($email, $password, TRUE);
            }
        } else {
            $user = $this->db->where(array('email' => $email))->limit(1)->get($table)->row();

            $sess_data = array('identity' => $user->username,
                'username' => $user->username,
                'email' => $user->email,
                'user_id' => $user->id,
                'old_last_login' => $user->last_login);

            $this->session->set_userdata($sess_data);
        }
        return TRUE;
    }
}

/* End of file Social_login_model.php */
/* Location: ./application/models/Social_login_model.php */