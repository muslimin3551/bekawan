<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Counselor Menu</h3>
                <p class="text-subtitle text-muted">Add Data Counselor </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/counselor') ?> ">Counselor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
                <p>Please Input the corect data of user!</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/counselor/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="image" name="image" accept="photos/*">
                            </div>
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Phone Number</label>
                                <input type="number" name="phone_number" min="0" class="form-control" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Choose Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Counselor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Gender</label>
                                <select class="form-select" name="gender" aria-label="Default select example">
                                    <option selected>Choose Gender</option>
                                    <option value="Laki-Laki">Male</option>
                                    <option value="Perempuan">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Birth Date</label>
                                <input type="date" name="birth_date" class="form-control" placeholder="Birth Date" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Password</label>
                                <input type="password" name="password" class="form-control" placeholder=" Password" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Confirm Password</label>
                                <input type="password" name="confpassword" class="form-control" placeholder="Confirm  Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Data</button>
                        <a href="javascript:window.history.go(-1);" value="draft" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>