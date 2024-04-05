<?php
class data_driver extends CI_Controller
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
        $nama_driver = $this->input->post('nama_driver');       

        $data = array(
            'nama_driver' => $nama_driver,
            'status' => "Bebas"
        );

        $this->model_admin->tambah_driver($data, 'driver');
        redirect('admin/dashboard/driver');
    }

    public function edit_aksi($driver_id)
    {
        $driver_id = $this->input->post('driver_id');
        $nama_driver = $this->input->post('nama_driver');       
        $status = $this->input->post('status');       
        $data = array(
            'nama_driver' => $nama_driver,
            'status' => $status
        );

        $where = array(
            'driver_id' => $driver_id
        );

        $this->model_admin->edit_driver($where, $data, 'driver');
        redirect('admin/dashboard/driver');
    }
    public function hapus_aksi($driver_id)
    {
        $where = array(
            'driver_id' => $driver_id
        );
        $this->model_admin->hapus_driver($where, 'driver');
        redirect('admin/dashboard/driver');
    }
}
