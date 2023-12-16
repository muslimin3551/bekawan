<?= $this->extend('admin/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="row h-100">
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right">
            <div style="margin: 0 auto;" class="text-center">
                <img src="<?= base_url('img/admin_logo_login.png') ?>" width="150px" height="150px" alt="Logo" />
                <p style="color: #ffffff;">SISTEM INFORMASI ADMINISTRASI TRANSAKSI</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div id="auth-left" class="text-center">
            <h5>ADMIN RESET PASSWORD</h5>
            <br>
            <br>
            <p>Silahkan masukan pasword baru anda.</p>
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
            <form action="reset" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="confm_password" placeholder="Konfirmasi Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Set Ulang</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>