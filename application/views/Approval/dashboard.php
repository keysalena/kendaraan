<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <?php $totalKendaraan = $this->db->count_all('kendaraan'); ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Kendaraan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $totalKendaraan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $totalDriver = $this->db->count_all('driver'); ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Driver</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalDriver ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->db->from('pemesanan');
        $this->db->where('status_persetujuan', 'Disetujui');
        $totalSetuju = $this->db->count_all_results();
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total pesanan yang disetujui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalSetuju ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $this->db->from('pemesanan');
        $this->db->where('status_persetujuan', 'Ditolak');
        $totalDitolak = $this->db->count_all_results();
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total pesanan yang ditolak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalDitolak ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->