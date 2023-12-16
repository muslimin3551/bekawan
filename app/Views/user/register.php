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
                            <h2 class="text-center mb-4">Register</h2>
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $validation->listErrors() ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <form method="POST" action="login/regis" style="width: 100%;" class="p-5" enctype="multipart/form-data">
                                <div class="mb-3 text-start">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="image" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="photos/*">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="number" min="0" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="birth_date" class="form-label">Birth Date</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Enter your Birth Date">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="title">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"></textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Laki-Laki">Male</option>
                                        <option value="Perempuan">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="confpassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Reapet your password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100" style="background-color: #316064;">Register</button>
                                <hr>
                                <p style="font-size: 12px;color: #316064;font-weight: 500;">If you already have an account <span><a href="<?= base_url('/login') ?>" style="text-decoration: none;">click here</a></span> to login</p>
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