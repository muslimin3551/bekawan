<?= $this->extend('user/layouts/app') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="page-heading">
    <h3>Membership</h3>
</div>
<div class="page-content">
    <section class="row">

        <!-- Membership Card 1 -->
        <?php foreach ($memberships as $member) { ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <img src="img/portfolio-1.jpg" class="card-img-top h-50" alt="Membership Image 1">
                    <div class="card-header">
                        <h1 class="card-title text-center"><?= $member['name'] ?></h1>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title text-center">Mulai Dari Rp <?= $member['cost'] ?></h2>
                        <p class="card-text"><?= $member['description'] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('checkout/') . $member['id'] ?>" class="btn btn-primary w-100">Pilih Paket</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</div>

<?= $this->endSection() ?>