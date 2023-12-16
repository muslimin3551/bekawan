<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<body style="background-color: #018249;font-family: 'Poppins', sans-serif;">
    <div class="container login">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <img src="<?= base_url('img/logo.png') ?>" alt="global institute">
                        <br>
                        <br>
                        <h4 class="mb-5">Masukan Password Baru Anda!</h4>
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
                            <div class="form-outline mb-4 text-left">
                                <span class="badge badge-secondary">Password</span>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukan Password anda" />
                            </div>
                            <div class="form-outline mb-4 text-left">
                                <span class="badge badge-secondary">Konfirmasi Password</span>
                                <input type="password" name="confm_password" id="confm_password" class="form-control form-control-lg" placeholder="Konfirmasi password anda" />
                            </div>

                            <button class="btn btn-success btn-lg btn-block" style="background-color: #018249;" type="submit">Atur Ulang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery dan Bootsrap JS -->
    <!-- <script src="<?= base_url('js/jquery.min.js') ?>"></script> -->
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>

</html>