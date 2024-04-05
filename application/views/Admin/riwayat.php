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
            <h6 class="m-0 font-weight-bold text-dark">Data Pemakaian Kendaraan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="riwayatTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PEGAWAI</th>
                            <th>TANGGAL MULAI</th>
                            <th>TANGGAL SELESAI</th>
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
                                <td><?php echo $d->tanggal_mulai; ?></td>
                                <td><?php echo $d->tanggal_selesai; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url('admin/dashboard/kendaraan') ?>" class="btn btn-dark">Kembali</a>
            </div>
            <script>
                var $j = jQuery.noConflict();
                $j(document).ready(function() {
                    $j('#dataTable').DataTable();
                });
            </script>