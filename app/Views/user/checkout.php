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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $validation->listErrors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <h5 class="card-title">Order Summary</h5>
                    <form action="<?= base_url('process_checkout') ?>" method="post">
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                        <input type="hidden" name="membership_id" value="<?= $membership['id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required><?= $user['address'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="payment" class="form-label">Counselor</label>
                            <select name="konselor_id" id="konselor_id" class="form-control" required>
                                <option value="">Choose Counselor</option>
                                <?php foreach ($counselors as $counselor) { ?>
                                    <option value="<?= $counselor['id'] ?>"><?= $counselor['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php if ($has_membership) { ?>
                            <hr>
                            <p class="text-warning" style="font-size: 12px;">You Already have active package you have to wait until you package expired to make another counseling session</p>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary">Submit Order</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <!-- Display the selected membership tier and any other order details here -->
                    <p>Selected Membership Tier: <?= $membership['name'] ?? 'Not Selected' ?></p>
                    <p>Selected Membership Cost: Rp <?= $membership['cost'] ?? 'Not Selected' ?></p>
                    <hr>
                    <p style="font-weight: 700;">Total Cost: Rp <?= $membership['cost'] ?? 'Not Selected' ?></p>
                    <hr>
                    <p>Note:</p>
                    <p>
                        payment is only available by bank transfer method to <strong>BCA account number <span class="badge bg-primary">8840773265</span></strong> after payment is made go to the transaction menu and confirm payment by uploading proof of payment.
                    </p>
                    <!-- Add more order summary details as needed -->
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection() ?>