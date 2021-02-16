<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth');
    }

    public function index()
    {
        $data['tittle'] = "Laundry | Sign In";

        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
    }

    public function register()
    {
        $data['tittle'] = "Laundry | Sign Up";

        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/register', $data);
        $this->load->view('template/auth_footer');
    }

    public function create()
    {
        $this->Auth->signup();
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Success to create account!!</div>');
        redirect('AuthController');
    }

    public function signin()
    {
        $this->Auth->signin();
    }
}
