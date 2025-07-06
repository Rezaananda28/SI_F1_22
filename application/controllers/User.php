<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['v'] = $this->db->get('tb_mahasiswa')->result_array(); // SELECT * FROM tb_mahasiswa
        $this->load->view('layouts/header_dashboard', $data);
        $this->load->view('layouts/sidebar_dashboard', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('layouts/footer_dashboard');
    }

    public function hapus($id_akun)
    {
        $this->db->where('id_akun', $id_akun);
        $this->db->delete('tb_mahasiswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success">
            <strong>Success!</strong> Data Berhasil Di Hapus
          </div>');
        redirect('user');
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_mahasiswa.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('layouts/header_dashboard', $data);
            $this->load->view('layouts/sidebar_dashboard', $data);
            $this->load->view('user/c_data', $data);
            $this->load->view('layouts/footer_dashboard');
        } else {
            $email = $this->input->post('email', true);
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = '10000';
                $config['upload_path'] = './assets/img/';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['tb_mahasiswa']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }
                    $upload1 = $this->upload->data('file_name');
                    $this->db->set('image', $upload1);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'image' => $upload1,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'npm' => $this->input->post('npm'),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date('Y-m-d H:i:s')

            ];

            $this->db->insert('tb_mahasiswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
            <strong>Success!</strong> Data Berhasil Di simpan
          </div>');
            redirect('user');
        }
    }


    public function editData($id_akun)
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['d'] = $this->db->get_where('tb_mahasiswa', ['id_akun' => $id_akun])->row_array(); // SELECT * FROM tb_mahasiswa
        $this->load->view('layouts/header_dashboard', $data);
        $this->load->view('layouts/sidebar_dashboard', $data);
        $this->load->view('user/u_data', $data);
        $this->load->view('layouts/footer_dashboard');
    }

    public function editDataGo()
    {
        $id_akun = $this->input->post('id_akun', true);
        $name = htmlspecialchars($this->input->post('name', true));
        $email = $this->input->post('email');
        $npm  = $this->input->post('npm');
        $no_hp  = $this->input->post('no_hp');

        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('no_hp', $no_hp);
        $this->db->set('npm', $npm);
        $this->db->where('id_akun', $id_akun);
        $this->db->update('tb_mahasiswa');

        $this->session->set_flashdata('message', '<div class="alert alert-success">
            <strong>Success!</strong> Data Berhasil Di Update
          </div>');
        redirect('user');
    }

    public function uploadFoto($id_akun)
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['d'] = $this->db->get_where('tb_mahasiswa', ['id_akun' => $id_akun])->row_array(); // SELECT * FROM tb_mahasiswa
        $this->load->view('layouts/header_dashboard', $data);
        $this->load->view('layouts/sidebar_dashboard', $data);
        $this->load->view('user/u_upload', $data);
        $this->load->view('layouts/footer_dashboard');
    }

    public function uploadGo()
    {
        $id_akun = $this->input->post('id_akun', true);
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = '10000';
            $config['upload_path'] = './assets/img/';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tb_mahasiswa']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/' . $old_image);
                }
                $upload1 = $this->upload->data('file_name');
                $this->db->set('image', $upload1);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('image', $upload1);
        $this->db->where('id_akun', $id_akun);
        $this->db->update('tb_mahasiswa');

        $this->session->set_flashdata('message', '<div class="alert alert-success">
            <strong>Success!</strong> Foto Berhasil Di Update
          </div>');
        redirect('user');
    }
}
