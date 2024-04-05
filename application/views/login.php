<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <?php echo $this->session->flashdata('pesan') ?>
                                <form class="user" action="<?php echo base_url('auth/login') ?>" method="post">
                                    <div class="form-group">
                                        <input type="username" id="username" class="form-control form-control-user" name="username" placeholder="Masukkan username">
                                        <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('auth/register') ?>">Belum Punya Akun? Daftar!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>