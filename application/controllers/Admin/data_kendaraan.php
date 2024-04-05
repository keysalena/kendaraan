<?php
class data_kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != "admin") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
Login Sebagai Admin!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ');

            redirect('auth/login');
        }
    }
    public function tambah_aksi()
    {
        $nama_kendaraan = $this->input->post('nama_kendaraan');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');
        $konsumsi_BBM = $this->input->post('konsumsi_BBM');
        $jadwal_service = $this->input->post('jadwal_service');

        $data = array(
            'nama_kendaraan' => $nama_kendaraan,
            'jenis_kendaraan' => $jenis_kendaraan,
            'konsumsi_BBM' => $konsumsi_BBM . " Km/liter",
            'jadwal_service' => "Setiap " . number_format($jadwal_service, 0, ',', '.') . " Km"
        );

        $this->model_admin->tambah_kendaraan($data, 'kendaraan');
        redirect('admin/dashboard/kendaraan');
    }

    public function edit_aksi($kendaraan_id)
    {
        $kendaraan_id = $this->input->post('kendaraan_id');
        $nama_kendaraan = $this->input->post('nama_kendaraan');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');
        $konsumsi_BBM = $this->input->post('konsumsi_BBM');
        $jadwal_service = $this->input->post('jadwal_service');
        $data = array(
            'nama_kendaraan' => $nama_kendaraan,
            'jenis_kendaraan' => $jenis_kendaraan,
            'konsumsi_BBM' => $konsumsi_BBM . " Km/liter",
            'jadwal_service' => "Setiap " . number_format($jadwal_service, 0, ',', '.') . " Km"
        );

        $where = array(
            'kendaraan_id' => $kendaraan_id
        );

        $this->model_admin->edit_kendaraan($where, $data, 'kendaraan');
        redirect('admin/dashboard/kendaraan');
    }
    public function hapus_aksi($kendaraan_id)
    {
        $where = array(
            'kendaraan_id' => $kendaraan_id
        );
        $this->model_admin->hapus_kendaraan($where, 'kendaraan');
        redirect('admin/dashboard/kendaraan');
    }
}
