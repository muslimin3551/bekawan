<?= $this->extend('admin/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="row h-100">
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right">
            <div style="margin: 0 auto;" class="text-center">
                <h2 style="color: #ffffff;">Bekawan.my.id</h2>
                <p style="color: #ffffff;">ADMINISTRATOR</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div id="auth-left" class="text-center">
            <h5>ADMIN LOGIN</h5>
            <br>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('msg_succes')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('msg_succes') ?></div>
            <?php endif; ?>
            <br>
            <p>Only Counselor with special access can login to administrator menu.</p>
            <br>
            <br>
            <form method="post" action="/admin/auth">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="form3Example3" class="form-control" placeholder="Email" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="form3Example4" class="form-control" placeholder="Password" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-success btn-block mb-4">
                    Login
                </button>
            </form>
            <div class="text-left mt-5 text-lg fs-4">
                <p><a href="<?= base_url('admin/forgot_password') ?>" style="color:#018249;font-size: 14px;"> Forgot password ?</a></p>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>