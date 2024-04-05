<?php
class data_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != "admin") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
Login Sebagai Admin!!              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ');

            redirect('auth/login');
        }
    }
    public function tambah_aksi()
    {
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama_user' => $nama_user,
            'username' => $username,
            'password' => $password,
            'role' => "pihak yang menyetujui"
        );

        $this->model_admin->tambah_user($data, 'user');
        redirect('admin/dashboard/user');
    }

    public function edit_aksi($user_id)
    {
        $user_id = $this->input->post('user_id');
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama_user' => $nama_user,
            'username' => $username,
            'password' => $password,
            'role' => "pihak yang menyetujui"
        );

        $where = array(
            'user_id' => $user_id
        );

        $this->model_admin->edit_user($where, $data, 'user');
        redirect('admin/dashboard/user');
    }
    public function hapus_aksi($user_id)
    {
        $where = array(
            'user_id' => $user_id
        );
        $this->model_admin->hapus_user($where, 'user');
        redirect('admin/dashboard/user');
    }
}
