<div class="container-fluid">
    <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i> Tambah Kendaraan</button>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Kendaraan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">JENIS</th>
                            <th style="text-align: center;">KONSUMSI BBM</th>
                            <th style="text-align: center;">JADWAL SERVICE</th>
                            <th style="text-align: center;">STATUS</th>
                            <th style="text-align: center;">PEMAKAIAN</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kendaraan as $k) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $no++; ?></td>
                                <td style="text-align: center;"><?php echo $k->nama_kendaraan; ?></td>
                                <td style="text-align: center;"><?php echo $k->jenis_kendaraan; ?></td>
                                <td style="text-align: center;"><?php echo $k->konsumsi_BBM; ?></td>
                                <td style="text-align: center;"><?php echo $k->jadwal_service; ?></td>
                                <td style="text-align: center;"><?php echo $k->status_kendaraan; ?></td>
                                <td style="text-align: center;">
                                    <?php echo anchor('admin/dashboard/detail/' . $k->kendaraan_id, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>'); ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal<?php echo $k->kendaraan_id; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo $k->kendaraan_id; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kendaraan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/data_kendaraan/tambah_aksi'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama Kendaraan</label>
                                    <input type="text" class="form-control" name="nama_kendaraan" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis Kendaraan</label>
                                    <select name="jenis_kendaraan" class="form-control">
                                        <option selected disabled>-Pilih Jenis Kendaraan-</option>
                                        <option>Angkutan orang</option>
                                        <option>Angkutan barang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Konsumsi BBM</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="konsumsi_BBM" required style="width: 150px;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Km/liter</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Jadwal Service</label>
                                    <input type="text" class="form-control" name="jadwal_service" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Edit Modal -->
            <?php foreach ($kendaraan as $k) : ?>
                <div class="modal fade" id="editModal<?php echo $k->kendaraan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Kendaraan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('admin/data_kendaraan/edit_aksi/' . $k->kendaraan_id); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Nama Kendaraan</label>
                                        <input type="hidden" class="form-control" name="kendaraan_id" value="<?php echo $k->kendaraan_id; ?>">
                                        <input type="text" class="form-control" name="nama_kendaraan" value="<?php echo $k->nama_kendaraan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis">Jenis Kendaraan</label>
                                        <select name="jenis_kendaraan" class="form-control">
                                            <option value="Angkutan orang" <?php echo ($k->jenis_kendaraan == 'Angkutan orang') ? 'selected' : ''; ?>>Angkutan orang</option>
                                            <option value="Angkutan barang" <?php echo ($k->jenis_kendaraan == 'Angkutan barang') ? 'selected' : ''; ?>>Angkutan barang</option>
                                        </select>
                                    </div>
                                    <?php
                                    $konsumsi_BBM_parts = explode(' ', $k->konsumsi_BBM);
                                    $konsumsi_BBM_value = $konsumsi_BBM_parts[0];
                                    ?>
                                    <div class="form-group">
                                        <label for="alamat">Konsumsi BBM</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="konsumsi_BBM" style="width: 150px;" value="<?php echo $konsumsi_BBM_value; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Km/liter</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Jadwal Service</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Setiap</span>
                                            </div>
                                            <input type="number" class="form-control" name="jadwal_service" value="<?php echo str_replace(['Setiap ', ' Km', '.'], '', $k->jadwal_service); ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Km</span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hapus Modal -->
                <div class="modal fade" id="hapusModal<?php echo $k->kendaraan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Kendaraan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin menghapus <?php echo $k->nama_kendaraan ?>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <a href="<?php echo base_url('admin/data_kendaraan/hapus_aksi/' . $k->kendaraan_id); ?>" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <script>
                var $j = jQuery.noConflict();
                $j(document).ready(function() {
                    $j('#dataTable').DataTable();
                });
            </script>