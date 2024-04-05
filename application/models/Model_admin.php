<?php
class Model_admin extends CI_Model
{
    public function tampil_kendaraan()
    {
        $this->db->order_by('kendaraan_id', 'DESC');
        return $this->db->get('kendaraan');
    }
    public function tambah_kendaraan($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_kendaraan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_kendaraan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function riwayat_kendaraan($kendaraan_id)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('kendaraan', 'kendaraan.kendaraan_id = pemesanan.kendaraan_id', 'inner');
        $this->db->order_by('pemesanan.pemesanan_id', 'DESC');
        $this->db->where('pemesanan.kendaraan_id', $kendaraan_id);
        return $this->db->get();
    }
    public function tampil_driver()
    {
        $this->db->order_by('driver_id', 'DESC');
        return $this->db->get('driver');
    }
    public function tambah_driver($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_driver($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_driver($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function tampil_user()
    {
        $this->db->order_by('user_id', 'DESC');
        return $this->db->get('user');
    }
    public function tambah_user($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function tampil_pemesanan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('kendaraan', 'kendaraan.kendaraan_id = pemesanan.kendaraan_id', 'inner');
        $this->db->join('driver', 'driver.driver_id = pemesanan.driver_id', 'inner');
        $this->db->join('user', 'user.user_id = pemesanan.user_id', 'inner');
        $this->db->order_by('pemesanan.pemesanan_id', 'DESC');
        return $this->db->get()->result();
    }
    public function tambah_pemesanan($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_pemesanan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_pemesanan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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

    public function update_kendaraan($whereKendaraan, $dataKendaraan, $table)
    {
        $this->db->where($whereKendaraan);
        $this->db->update($table, $dataKendaraan);
    }
    public function update_driver($whereDriver, $dataDriver, $table)
    {
        $this->db->where($whereDriver);
        $this->db->update($table, $dataDriver);
    }
}
