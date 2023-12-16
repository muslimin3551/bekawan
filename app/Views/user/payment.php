<?= $this->extend('user/layouts/app') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<!-- Checkout Page -->
<div class="page-heading">
    <h3>Checkout Page</h3>
</div>
<div class="page-content">
    <section class="row">
        <!-- Checkout Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('msg_succes')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('msg_succes') ?></div>
                    <?php endif; ?>
                    <h5 class="card-title">Payment Confirmation</h5>
                    <hr>
                    <form action="<?= base_url('payment_confirmation') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $hasmembership['id'] ?>">
                        <div class="form-group">
                            <label for="image" class="form-label">photo proof of transfer</label>
                            <input type="file" class="form-control" id="image" name="image" accept="photos/*">
                        </div>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit Payment Confirmation</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection() ?>