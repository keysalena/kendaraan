<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != "pihak yang menyetujui") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
Login sebagai pihak yang menyetujui!!              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ');

            redirect('auth/login');
        }
    }
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('approval/dashboard');
        $this->load->view('templates/footer');
    }
    public function pemesanan()
    {
        $data['pemesanan'] = $this->model_approval->tampil_pemesanan();
        $data['driver'] = $this->model_approval->tampil_driver1();
        $data['kendaraan'] = $this->model_approval->tampil_kendaraan1();
        $data['user'] = $this->model_approval->tampil_user1();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('approval/pemesanan', $data);
        $this->load->view('templates/footer');
    }
}
