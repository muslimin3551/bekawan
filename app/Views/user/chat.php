<?= $this->extend('user/layouts/app') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="page-heading">
    <h3>Chat</h3>
</div>
<div class="page-content">
    <section class="row">
        <!-- Checkout Form -->
        <?php
        if ($membership) {
            $endDate = $membership['end_date'];
            $endDate = new DateTime($endDate);

            // Get the current date
            $today = new DateTime();

            // Calculate the interval
            $interval = $today->diff($endDate);

            // Get the remaining days
            $remainingDays = $interval->days;
        ?>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $validation->listErrors() ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <h5 class="card-title">start your counseling session</h5>
                        <hr>
                        <p>Counselor Detail</p>
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <!-- Left: Photo -->
                                    <img src="<?= base_url('uploads/' . $counselor['photos']) ?>" class="img-fluid" alt="<?= $counselor['name']; ?>">
                                </div>
                                <div class="col-md-8">
                                    <!-- Right: Details -->
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $counselor['name']; ?></h5>
                                        <p><?= $counselor['email'] ?></p>
                                        <?php if ($interval->days < 0) { ?>
                                            <a href="<?= base_url('membership') ?>" class="btn btn-primary">Choose Membership</a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('/discusion/' . $membership['id']) ?>" class="btn btn-primary"><i class="bi bi-chat-dots"></i> Start Counseling</a>
                                        <?php } ?>
                                        <hr>
                                        <br>
                                        <p>Note:</p>
                                        <p>When conversing with counselors, please use polite language and respect our counselors.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <!-- Display the selected membership tier and any other order details here -->
                        <p>Selected Membership Tier: <?= get_membership_name($membership['membership_id']) ?? 'Not Selected' ?></p>
                        <p>Selected Membership Cost: Rp <?= get_membership_cost($membership['membership_id']) ?? 'Not Selected' ?></p>
                        <hr>
                        <?php if ($interval->days < 0) { ?>
                            <p>Remaining days: <span class="badge bg-danger">Expired</span></p>
                        <?php } else { ?>
                            <p>Remaining days: <?= $remainingDays ?></p>
                        <?php } ?>
                        <!-- Add more order summary details as needed -->
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p>No Chat Data</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</div>
<?= $this->endSection() ?>