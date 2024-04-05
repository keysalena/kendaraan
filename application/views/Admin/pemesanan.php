    <style>
        td {
            text-align: center;
            font-size: 14px;
        }

        th {
            text-align: center;
            font-size: 11px;
        }
    </style>
    <div class="container-fluid">
        <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i>Tambah Pemesanan</button>
        <script>
            var $j = jQuery.noConflict();
            $j(document).ready(function() {
                $j('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            }
                        }
                    ]
                });
            });
        </script>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Data Pemesanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA PEGAWAI</th>
                                <th>NAMA KENDARAAN</th>
                                <th>NAMA DRIVER</th>
                                <th>PIHAK YANG MENYETUJUI</th>
                                <th>TANGGAL PESAN</th>
                                <th>TANGGAL MULAI</th>
                                <th>TANGGAL SELESAI</th>
                                <th>STATUS PERSETUJUAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pemesanan as $d) :
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->nama_pegawai; ?></td>
                                    <td><?php echo $d->nama_kendaraan . " ($d->jenis_kendaraan)"; ?></td>
                                    <td><?php echo $d->nama_driver; ?></td>
                                    <td><?php echo $d->nama_user; ?></td>
                                    <td><?php echo $d->tanggal_pemesanan; ?></td>
                                    <td><?php echo $d->tanggal_mulai; ?></td>
                                    <td><?php echo $d->tanggal_selesai; ?></td>
                                    <td><?php echo $d->status_persetujuan; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal<?php echo $d->pemesanan_id; ?>"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo $d->pemesanan_id; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <script>
                    var $j = jQuery.noConflict();
                    $j(document).ready(function() {
                        $j('#dataTable').DataTable();
                    });
                </script>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('admin/data_pemesanan/tambah_aksi'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Nama Pegawai</label>
                                        <input type="text" class="form-control" name="nama_pegawai" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Kendaraan</label>
                                        <input type="text" class="form-control pencarian_kendaraan" name="nama_kendaraan" id="nama_kendaraan" required readonly>
                                        <input type="hidden" class="form-control" name="kendaraan_id" id="kendaraan_id" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Driver</label>
                                        <input type="text" class="form-control pencarian_driver" name="nama_driver" id="nama_driver" required readonly>
                                        <input type="hidden" class="form-control" name="driver_id" id="driver_id" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Pihak yang Menyetujui</label>
                                        <input type="text" class="form-control pencarian_user" name="nama_user" id="nama_user" required readonly>
                                        <input type="hidden" class="form-control" name="user_id" id="user_id" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Tanggal Mulai</label>
                                        <input type="date" class="form-control" name="tanggal_mulai" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="tanggal_selesai" required>
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
                <?php foreach ($pemesanan as $d) : ?>
                    <div class="modal fade" id="editModal<?php echo $d->pemesanan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pemesanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url('admin/data_pemesanan/edit_aksi/' . $d->pemesanan_id); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama">Nama Pegawai</label>
                                            <input type="hidden" class="form-control" name="pemesanan_id" value="<?php echo $d->pemesanan_id; ?>">
                                            <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $d->nama_pegawai; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Tanggal Mulai</label>
                                            <input type="date" class="form-control" name="tanggal_mulai" value="<?php echo $d->tanggal_mulai; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Tanggal Selesai</label>
                                            <input type="date" class="form-control" name="tanggal_selesai" value="<?php echo $d->tanggal_selesai; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status Persetujuan</label>
                                            <select name="status_persetujuan" class="form-control">
                                                <option value="Pending" <?php echo ($d->status_persetujuan == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                                <option value="Ditolak" <?php echo ($d->status_persetujuan == 'Ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                                                <option value="Disetujui" <?php echo ($d->status_persetujuan == 'Disetujui') ? 'selected' : ''; ?>>Disetujui</option>
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
                    <div class="modal fade" id="hapusModal<?php echo $d->pemesanan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pemesanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url('admin/data_pemesanan/hapus_aksi/' . $d->pemesanan_id); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="kendaraan_id" id="kendaraan_id" value="<?php echo $d->kendaraan_id; ?>">
                                        <input type="hidden" class="form-control" name="driver_id" id="driver_id" value="<?php echo $d->driver_id; ?>">
                                        <p>Anda yakin ingin menghapus pemesanan pegawai <?php echo $d->nama_pegawai ?>?</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Kendaraan -->
                <div class="modal fade" id="pencarianKendaraan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pilih Kendaraan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered" id="kendaraanS" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NAMA KENDARAAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kendaraan as $d) : ?>
                                            <tr class="pilih2" data-nama_kendaraan="<?php echo $d->nama_kendaraan . " ($d->jenis_kendaraan)"; ?>" data-id_kendaraan="<?php echo $d->kendaraan_id; ?>">
                                                <td><?php echo $d->nama_kendaraan . " ($d->jenis_kendaraan)"; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Driver -->
                <div class="modal fade" id="pencarianDriver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pilih Driver</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered" id="driverS" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NAMA DRIVER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($driver as $a) : ?>
                                            <tr class="pilih1" data-nama="<?php echo $a->nama_driver; ?>" data-id="<?php echo $a->driver_id; ?>">
                                                <td><?php echo $a->nama_driver; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pihak yang Menyetujui -->
                <div class="modal fade" id="pencarianUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pilih Pihak yang Menyetujui</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered" id="userS" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NAMA PIHAK YANG MENYETUJUI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user as $a) : ?>
                                            <tr class="pilih3" data-nama_user="<?php echo $a->nama_user; ?>" data-id_user="<?php echo $a->user_id; ?>">
                                                <td><?php echo $a->nama_user; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var $j = jQuery.noConflict();
                    $j(document).ready(function() {
                        $j('#kendaraanS').DataTable({
                            "paging": false,
                            "lengthChange": false,
                            "searching": true,
                            "ordering": false,
                            "info": false,
                            "autoWidth": true,
                            "responsive": true,
                            "language": {
                                "search": "_INPUT_",
                                "searchPlaceholder": "Search",
                            }
                        });
                    });
                </script>
                <script>
                    var $j = jQuery.noConflict();
                    $j(document).ready(function() {
                        $j('#driverS').DataTable({
                            "paging": false,
                            "lengthChange": false,
                            "searching": true,
                            "ordering": false,
                            "info": false,
                            "autoWidth": true,
                            "responsive": true,
                            "language": {
                                "search": "_INPUT_",
                                "searchPlaceholder": "Search",
                            }
                        });
                    });
                </script>
                <script>
                    var $j = jQuery.noConflict();
                    $j(document).ready(function() {
                        $j('#userS').DataTable({
                            "paging": false,
                            "lengthChange": false,
                            "searching": true,
                            "ordering": false,
                            "info": false,
                            "autoWidth": true,
                            "responsive": true,
                            "language": {
                                "search": "_INPUT_",
                                "searchPlaceholder": "Search",
                            }
                        });
                    });
                </script>
                <script src=" https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $(".pencarian_kendaraan").focusin(function() {
                            $("#pencarianKendaraan").modal('show');
                        });
                    });

                    $(document).on('click', '.pilih2', function(e) {
                        document.getElementById("kendaraan_id").value = $(this).attr('data-id_kendaraan');
                        document.getElementById("nama_kendaraan").value = $(this).attr('data-nama_kendaraan');
                        $('#pencarianKendaraan').modal('hide');
                    });
                </script>
                <script>
                    $(document).ready(function() {
                        $(".pencarian_driver").focusin(function() {
                            $("#pencarianDriver").modal('show');
                        });
                    });

                    $(document).on('click', '.pilih1', function(e) {
                        document.getElementById("driver_id").value = $(this).attr('data-id');
                        document.getElementById("nama_driver").value = $(this).attr('data-nama');
                        $('#pencarianDriver').modal('hide');
                    });
                </script>
                <script>
                    $(document).ready(function() {
                        $(".pencarian_user").focusin(function() {
                            $("#pencarianUser").modal('show');
                        });
                    });

                    $(document).on('click', '.pilih3', function(e) {
                        document.getElementById("user_id").value = $(this).attr('data-id_user');
                        document.getElementById("nama_user").value = $(this).attr('data-nama_user');
                        $('#pencarianUser').modal('hide');
                    });
                </script>