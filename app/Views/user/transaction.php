<?= $this->extend('user/layouts/app') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="page-heading">
    <h3>Transaction</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <?php if ($transactions) { ?>
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Package</th>
                                    <th>Counselor</th>
                                    <th>Cost</th>
                                    <th>created at</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($transactions as $item) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= get_membership_name($item['membership_id']) ?></td>
                                        <td><?= get_counselor_name($item['konselor_id']) ?></td>
                                        <td><?= get_membership_cost($item['membership_id']) ?></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td>
                                            <?php if ($item['status'] == 1) { ?>
                                                <span class="badge bg-info">Waiting Payment Confirmation</span>
                                            <?php } elseif ($item['status'] == 2) { ?>
                                                <span class="badge bg-warning">Waiting Admin Confirmation</span>
                                            <?php } elseif ($item['status'] == 3) { ?>
                                                <span class="badge bg-danger">Payment Failed</span>
                                            <?php } elseif ($item['status'] == 5) { ?>
                                                <span class="badge bg-dark">Expired</span>
                                            <?php } else { ?>
                                                <span class="badge bg-success">Paid</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($item['status'] == 1) { ?>
                                                <a href="<?= base_url('payment/' . $item['id']) ?>" class="btn btn-sm btn-outline-success m-1">Payment Confirmation</a>
                                            <?php } elseif ($item['status'] == 2) { ?>
                                                No Action Need
                                            <?php } elseif ($item['status'] == 3) { ?>
                                                No Action Need
                                            <?php } elseif ($item['status'] == 5) { ?>
                                            <?php } else { ?>
                                                No Action Need
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <p>there is no transaction yet</p>
                <?php } ?>
            </div>
        </div>

    </section>
</div>

<?= $this->endSection() ?>