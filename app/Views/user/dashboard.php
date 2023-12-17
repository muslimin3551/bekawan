<?= $this->extend('user/layouts/app') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="page-heading">
    <h3>Dashboard User</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card bg-success" style="color: #ffffff;font-weight: 700;">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 text-center">
                                    <p>Paid</p>
                                    <hr>
                                    <p><?= $paid_count ?> Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card bg-info" style="color: #ffffff;font-weight: 700;">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 text-center">
                                    <p>Payment Confirmation</p>
                                    <hr>
                                    <p><?= $payment_confirmation_count ?> Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card bg-warning" style="color: #ffffff;font-weight: 700;">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 text-center">
                                    <p>Admin Confirmation</p>
                                    <hr>
                                    <p><?= $admin_confirmation_count ?> Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card bg-danger" style="color: #ffffff;font-weight: 700;">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 text-center">
                                    <p>Payment Failed</p>
                                    <hr>
                                    <p><?= $failed_count ?> Transaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Package</th>
                                            <th>Counselor</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($membership) { ?>
                                            <?php foreach ($membership as $member) { ?>
                                                <tr>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= get_membership_name($member['membership_id']) ?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= get_counselor_name($member['konselor_id']) ?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <?php if ($member['status'] == 1) { ?>
                                                            <span class="badge bg-info">Waiting Payment Confirmation</span>
                                                        <?php } elseif ($member['status'] == 2) { ?>
                                                            <span class="badge bg-warning">Waiting Admin Confirmation</span>
                                                        <?php } elseif ($member['status'] == 3) { ?>
                                                            <span class="badge bg-danger">Payment Failed</span>
                                                        <?php } elseif ($member['status'] == 5) { ?>
                                                            <span class="badge bg-dark">Expired</span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-success">Paid</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= $member['created_at'] ?></p>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <p>Data Not Found</p>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>