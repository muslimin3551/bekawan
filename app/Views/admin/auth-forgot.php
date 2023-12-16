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
            <h5>ADMIN FORGOT PASSWORD</h5>
            <br>
            <br>
            <p>Please Enter Your Email Address.</p>
            <br>
            <br>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('msg_succes')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('msg_succes') ?></div>
            <?php endif; ?>
            <form action="/admin/forgot" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" name="email" placeholder="Email Address">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Forgot Password</button>
            </form>
            <div class="text-left mt-5 text-lg fs-4">
                <p><a href="<?= base_url('admin/login') ?>" style="color:#018249;font-size: 14px;">Back to login!</a></p>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>