<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('login/formLogin');
    }

    public function register()
    {
        $this->load->view('login/formRegister');
    }

    public function forgot()
    {
        $this->load->view('login/formForgotPassword');
    }
}
