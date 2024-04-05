<?php
class Model_approval extends CI_Model
{
    public function tampil_pemesanan()
    {
        $user_id = $this->session->userdata('user_id'); 

        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('kendaraan', 'kendaraan.kendaraan_id = pemesanan.kendaraan_id', 'inner');
        $this->db->join('driver', 'driver.driver_id = pemesanan.driver_id', 'inner');
        $this->db->join('user', 'user.user_id = pemesanan.user_id', 'inner');
        $this->db->where('pemesanan.user_id', $user_id);
        $this->db->order_by('pemesanan.pemesanan_id', 'DESC');
        return $this->db->get()->result();
    }
    public function edit_pemesanan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function tampil_kendaraan1()
    {
        $this->db->where('status_kendaraan', 'Tersedia');
        return $this->db->get('kendaraan')->result();
    }
    public function tampil_driver1()
    {
        $this->db->where('status', 'Bebas');
        return $this->db->get('driver')->result();
    }
    public function tampil_user1()
    {
        $this->db->where('role', 'pihak yang menyetujui');
        return $this->db->get('user')->result();
    }
}
