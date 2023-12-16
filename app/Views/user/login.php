<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #316064;
            color: #fff;
        }

        .login-container {
            margin-top: 100px;
        }

        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-container p-4 rounded">
                    <div class="card">
                        <div class="card-body justify-content-center center-content">
                            <img src="<?= base_url('/img/logo.png') ?>" alt="" height="150px" width="150px">
                            <h2 class="text-center mb-4">Login</h2>
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('msg_succes')) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('msg_succes') ?></div>
                            <?php endif; ?>
                            <form method="POST" action="login/auth" style="width: 100%;" class="p-5">
                                <div class="mb-3 text-start">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100" style="background-color: #316064;">Login</button>
                                <hr>
                                <p style="font-size: 12px;color: #316064;font-weight: 500;">If you don't have an account <span><a href="<?= base_url('/register') ?>" style="text-decoration: none;">click here</a></span> to register</p>
                                <p><a href="<?= base_url('/forgot_password') ?>" style="font-size: 12px;color: #316064;font-weight: 500;text-decoration: none;"> Forgot your password ?</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, only if you need JS functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>