<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Model
{
    public function signup()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role_id' => 2,
        ];
        $this->db->insert('user', $data);
    }

    public function signin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $account = $this->db->get_where('user', ['email' => $email])->row_array();

        // cek user
        if ($account)
        {
            if (password_verify($password, $account['password']))
            {
                if ($account['role_id'] == 1)
                {
                    $data = [
                        'id' => $account['id'],
                        'email' => $account['email'],
                        'role_id' => $account['role_id']
                    ];
                    $this->session->set_userdata($data);

                    redirect('AdminController');
                }
                else
                {
                    $data = [
                        'id' => $account['id'],
                        'email' => $account['email'],
                        'role_id' => $account['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('UserController');
                }
            }
            else
            {
                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Wrong Password!!</div>');
                redirect('AuthController');
            }
        }
        else
        {
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Email is not registered!!</div>');
        redirect('AuthController');
        }
    }
}
