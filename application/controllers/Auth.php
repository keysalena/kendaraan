<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username atau Password Anda Salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('user_id', $auth->user_id);
                $this->session->set_userdata('role', $auth->role);

                switch ($auth->role) {
                    case "admin":
                        redirect('admin/dashboard/index');
                        break;
                    case "pihak yang menyetujui":
                        redirect('approval/dashboard/index');
                        break;
                    default:
                        redirect('auth/login');
                        break;
                }
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_2]');
        $this->form_validation->set_rules('password_2', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('registrasi');
            $this->load->view('template/footer');
        } else {
            $data = array(
                'user_id' => '',
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                // 'role' => "admin",
                'role' => "pihak yang menyetujui",
            );
            $this->db->insert('user', $data);
            redirect('auth/login');
        }
    }
}
