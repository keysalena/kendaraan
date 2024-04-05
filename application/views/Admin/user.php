<div class="container-fluid">
    <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i>Tambah User</button>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">USERNAME</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $d) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $no++; ?></td>
                                <td style="text-align: center;"><?php echo $d->nama_user; ?></td>
                                <td style="text-align: center;"><?php echo $d->username; ?></td>
                                <td style="text-align: center;">
                                    <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#editModal<?php echo $d->user_id; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo $d->user_id; ?>"><i class="fa fa-trash"></i></a>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/data_user/tambah_aksi'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control form-control-user" name="nama_user" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-user" name="username" required>
                                    <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="password" required>
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
            <?php foreach ($user as $d) : ?>
                <div class="modal fade" id="editModal<?php echo $d->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('admin/data_user/edit_aksi/' . $d->user_id); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama User</label>
                                        <input type="text" class="form-control form-control-user" name="nama_user" value="<?php echo $d->nama_user ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="hidden" class="form-control form-control-user" name="user_id" value="<?php echo $d->user_id ?>">
                                        <input type="text" class="form-control form-control-user" name="username" value="<?php echo $d->username ?>">
                                    </div>
                                    <label>Password</label>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword_<?php echo $d->user_id; ?>" value="<?php echo $d->password ?>" name="password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword_<?php echo $d->user_id; ?>" value="<?php echo $d->password ?>" name="password_2">
                                        </div>
                                    </div>
                                    <div id="passwordMismatch_<?php echo $d->user_id; ?>" class="text-danger small ml-2" style="display: none;">Password harus sama!</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-dark" onclick="validatePasswords(<?php echo $d->user_id; ?>)">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function validatePasswords(userId) {
                        var password1 = document.getElementById("exampleInputPassword_" + userId).value;
                        var password2 = document.getElementById("exampleRepeatPassword_" + userId).value;
                        var mismatchDiv = document.getElementById("passwordMismatch_" + userId);

                        if (password1 !== password2) {
                            mismatchDiv.style.display = "block";
                            return false;
                        } else {
                            mismatchDiv.style.display = "none";
                            document.getElementById("editModal<?php echo $d->user_id; ?>").querySelector('form').submit();
                        }
                    }
                </script>

                <!-- Hapus Modal -->
                <div class="modal fade" id="hapusModal<?php echo $d->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin menghapus <?php echo $d->nama_user ?>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <a href="<?php echo base_url('admin/data_user/hapus_aksi/' . $d->user_id); ?>" class="btn btn-danger">Hapus</a>
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