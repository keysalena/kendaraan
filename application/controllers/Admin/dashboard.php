<?php
class Dashboard extends CI_Controller
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
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
    }
    public function kendaraan()
    {
        $data['kendaraan'] = $this->model_admin->tampil_kendaraan()->result();
        $data['pemesanan'] = $this->model_admin->tampil_pemesanan();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/kendaraan', $data);
        $this->load->view('template/footer');
    }
    public function driver()
    {
        $data['driver'] = $this->model_admin->tampil_driver()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/driver', $data);
        $this->load->view('template/footer');
    }
    public function user()
    {
        $data['user'] = $this->model_admin->tampil_user()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/user', $data);
        $this->load->view('template/footer');
    }
    public function pemesanan()
    {
        $data['pemesanan'] = $this->model_admin->tampil_pemesanan();
        $data['driver'] = $this->model_admin->tampil_driver1();
        $data['kendaraan'] = $this->model_admin->tampil_kendaraan1();
        $data['user'] = $this->model_admin->tampil_user1();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/pemesanan', $data);
        $this->load->view('template/footer');
    }
    public function detail($kendaraan_id)
    {
        $data['pemesanan'] = $this->model_admin->riwayat_kendaraan($kendaraan_id)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/riwayat', $data);
        $this->load->view('template/footer');
    }
}
