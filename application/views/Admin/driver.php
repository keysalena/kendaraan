<div class="container-fluid">
    <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i>Tambah Driver</button>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Driver</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">STATUS</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($driver as $d) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $no++; ?></td>
                                <td style="text-align: center;"><?php echo $d->nama_driver; ?></td>
                                <td style="text-align: center;"><?php echo $d->status; ?></td>
                                <td style="text-align: center;">
                                    <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal<?php echo $d->driver_id; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo $d->driver_id; ?>"><i class="fa fa-trash"></i></a>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Driver</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/data_driver/tambah_aksi'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama Driver</label>
                                    <input type="text" class="form-control" name="nama_driver" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Edit Modal -->
            <?php foreach ($driver as $d) : ?>
                <div class="modal fade" id="editModal<?php echo $d->driver_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Driver</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('admin/data_driver/edit_aksi/' . $d->driver_id); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Nama Driver</label>
                                        <input type="hidden" class="form-control" name="driver_id" value="<?php echo $d->driver_id; ?>">
                                        <input type="text" class="form-control" name="nama_driver" value="<?php echo $d->nama_driver; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Jenis Driver</label>
                                        <select name="status" class="form-control">
                                            <option value="Bebas" <?php echo ($d->status == 'Bebas') ? 'selected' : ''; ?>>Bebas</option>
                                            <option value="Terisi" <?php echo ($d->status == 'Terisi') ? 'selected' : ''; ?>>Terisi</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hapus Modal -->
                <div class="modal fade" id="hapusModal<?php echo $d->driver_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Driver</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin menghapus <?php echo $d->nama_driver ?>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <a href="<?php echo base_url('admin/data_driver/hapus_aksi/' . $d->driver_id); ?>" class="btn btn-danger">Hapus</a>
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