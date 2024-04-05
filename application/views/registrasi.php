<div class="container">
    <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
        <div class="card-body p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="<?php echo base_url('auth/register') ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username">
                                <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                    <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulang Password" name="password_2">
                                    <?php echo form_error('password_2', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-user btn-block">
                                Register
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah Punya Akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>