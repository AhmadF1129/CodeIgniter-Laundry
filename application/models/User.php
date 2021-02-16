<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    public function getUserById()
    {
        $this->db->get_where('user', ['id' => $this->session->userdata('id')]);
    }
}