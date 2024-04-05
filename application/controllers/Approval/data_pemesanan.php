<?php
class data_pemesanan extends CI_Controller
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
    public function setuju($pemesanan_id)
    {
        $data = array(
            'status_persetujuan' => 'Disetujui'
        );
        $where = array(
            'pemesanan_id' => $pemesanan_id
        );
        $this->model_approval->edit_pemesanan($where, $data, 'pemesanan');

        redirect('approval/dashboard/pemesanan');
    }
    public function tolak($pemesanan_id)
    {
        $data = array(
            'status_persetujuan' => 'Ditolak'
        );
        $where = array(
            'pemesanan_id' => $pemesanan_id
        );
        $this->model_approval->edit_pemesanan($where, $data, 'pemesanan');

        redirect('approval/dashboard/pemesanan');
    }
}
