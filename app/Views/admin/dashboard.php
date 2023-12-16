<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Siswa</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_student ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Tagihan</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_invoice ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pembayaran</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_payment ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>top 5 Tagihan Hari ini</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <?php if ($invoice_today) { ?>
                                    <?php
                                    $no = 1;
                                    foreach ($invoice_today as $row) { ?>
                                        <tr>
                                            <td scope="row"><?= $no++ ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/invoice/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= $row['invoice_number'] ?></a>
                                            </td>
                                            <td><?= $row['description'] ?></td>
                                            <td>Rp <?= number_format($row['total'], 2, ',', '.'); ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <p>Tagihan tidak di temukan</p>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>top 5 Tagihan Bulan ini</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <?php if ($invoice_monthly) { ?>
                                    <?php
                                    $no = 1;
                                    foreach ($invoice_monthly as $row) { ?>
                                        <tr>
                                            <td scope="row"><?= $no++ ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/invoice/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= $row['invoice_number'] ?></a>
                                            </td>
                                            <td><?= $row['description'] ?></td>
                                            <td>Rp <?= number_format($row['total'], 2, ',', '.'); ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <p>Tagihan tidak di temukan</p>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>top 5 Tagihan tahun ini</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <?php if ($invoice_yearly) { ?>
                                    <?php
                                    $no = 1;
                                    foreach ($invoice_yearly as $row) { ?>
                                        <tr>
                                            <td scope="row"><?= $no++ ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/invoice/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= $row['invoice_number'] ?></a>
                                            </td>
                                            <td><?= $row['description'] ?></td>
                                            <td>Rp <?= number_format($row['total'], 2, ',', '.'); ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <p>Tagihan tidak di temukan</p>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
