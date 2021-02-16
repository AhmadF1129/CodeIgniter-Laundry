    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b><?= $tittle ?></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('AuthController/signin') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                </form>

                <!-- Create new Account -->
                <p class="mb-0">
                    <a href="<?= base_url('AuthController/register') ?>" class="text-center">Register a new membership</a>
                </p>
                <!-- #### -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->