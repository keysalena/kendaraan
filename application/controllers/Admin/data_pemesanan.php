<?php
class data_pemesanan extends CI_Controller
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
        $nama_pegawai = $this->input->post('nama_pegawai');
        $kendaraan_id = $this->input->post('kendaraan_id');
        $driver_id = $this->input->post('driver_id');
        $user_id = $this->input->post('user_id');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');

        $dataKendaraan = array(
            'status_kendaraan' => 'Dipesan'
        );
        $whereKendaraan = array(
            'kendaraan_id' => $kendaraan_id
        );
        $this->model_admin->update_kendaraan($whereKendaraan, $dataKendaraan, 'kendaraan');

        $dataDriver = array(
            'status' => 'Terisi'
        );
        $whereDriver = array(
            'driver_id' => $driver_id
        );
        $this->model_admin->update_driver($whereDriver, $dataDriver, 'driver');

        $data = array(
            'nama_pegawai' => $nama_pegawai,
            'kendaraan_id' => $kendaraan_id,
            'driver_id' => $driver_id,
            'user_id' => $user_id,
            'tanggal_pemesanan' => date('Y-m-d H:i:s'),
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status_persetujuan' => "Pending",
        );

        $this->model_admin->tambah_pemesanan($data, 'pemesanan');
        redirect('admin/dashboard/pemesanan');
    }

    public function edit_aksi($pemesanan_id)
    {
        $pemesanan_id = $this->input->post('pemesanan_id');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');
        $status_persetujuan = $this->input->post('status_persetujuan');

        $data = array(
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status_persetujuan' => $status_persetujuan,
        );

        $where = array(
            'pemesanan_id' => $pemesanan_id
        );

        $this->model_admin->edit_pemesanan($where, $data, 'pemesanan');
        redirect('admin/dashboard/pemesanan');
    }
    public function hapus_aksi($pemesanan_id)
    {
        $kendaraan_id = $this->input->post('kendaraan_id');
        $driver_id = $this->input->post('driver_id');

        $dataKendaraan = array(
            'status_kendaraan' => 'Tersedia'
        );
        $whereKendaraan = array(
            'kendaraan_id' => $kendaraan_id
        );
        $this->model_admin->update_kendaraan($whereKendaraan, $dataKendaraan, 'kendaraan');

        $dataDriver = array(
            'status' => 'Bebas'
        );
        $whereDriver = array(
            'driver_id' => $driver_id
        );
        $this->model_admin->update_driver($whereDriver, $dataDriver, 'driver');

        $where = array(
            'pemesanan_id' => $pemesanan_id
        );
        $this->model_admin->hapus_pemesanan($where, 'pemesanan');

        redirect('admin/dashboard/pemesanan');
    }
}
