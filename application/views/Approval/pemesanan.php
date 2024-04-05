<head>
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
</head>
<div class="container-fluid">
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
                            <th>TANGGAL PESAN</th>
                            <th>TANGGAL MULAI</th>
                            <th>TANGGAL SELESAI</th>
                            <th>STATUS PERSETUJUAN</th>
                            <th>STATUS</th>
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
                                <td><?php echo $d->tanggal_pemesanan; ?></td>
                                <td><?php echo $d->tanggal_mulai; ?></td>
                                <td><?php echo $d->tanggal_selesai; ?></td>
                                <td><?php echo $d->status_persetujuan; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url('approval/data_pemesanan/setuju/' . $d->pemesanan_id); ?>"><i class="fa fa-check"></i></a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('approval/data_pemesanan/tolak/' . $d->pemesanan_id); ?>"><i class="fa fa-times"></i></a>
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