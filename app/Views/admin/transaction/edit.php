<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Transaction Menu</h3>
                <p class="text-subtitle text-muted">Edit Data Transaction </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/transaction') ?> ">Transaction</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update data</li>
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
                <p>Edit the data according to the user identity!, for the password leave it blank if you don't want to change it.</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="<?= $transaction['id']; ?>">
                            <div class="form-group">
                                <label for="title">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2" <?php if ($transaction['status'] == 2) {
                                                            echo 'selected';
                                                        } ?>>Waiting Admin Confirmation</option>
                                    <option value="3" <?php if ($transaction['status'] == 3) {
                                                            echo 'selected';
                                                        } ?>>Paiment failed</option>
                                    <option value="4" <?php if ($transaction['status'] == 4) {
                                                            echo 'selected';
                                                        } ?>>Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="<?= base_url('uploads/payment/') . $transaction['payment_photo'] ?>" alt="" width="300px" height="400px">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="javascript:window.history.go(-1);" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>