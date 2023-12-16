<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Article</h6>
                                    <h6 class="font-extrabold mb-0"><?= $article_count ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Counselor</h6>
                                    <h6 class="font-extrabold mb-0"><?= $counselor_count ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">User</h6>
                                    <h6 class="font-extrabold mb-0"><?= $user_count ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Transaction</h6>
                                    <h6 class="font-extrabold mb-0"><?= $membership_count ?></h6>
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
                            <h4>5 Latest Article</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Sort Description</th>
                                            <th>Views</th>
                                            <th>Likes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($articles as $item) { ?>
                                            <tr>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $item['title'] ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $item['sort_description'] ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $item['views'] ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $item['likes'] ?></p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= session()->get('name') ?></h5>
                            <h6 class="text-muted mb-0"><?php if (session()->get('role') == 1) {
                                                            echo 'Admin';
                                                        } else {
                                                            echo 'Counselor';
                                                        } ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent Transaction</h4>
                </div>
                <div class="card-content pb-4">
                    <?php foreach ($memberships as $member) { ?>
                        <hr>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= get_user_name($member['user_id']) ?></h5>
                                <h6 class="text-muted mb-0">Package: <?= get_membership_name($member['membership_id']) ?></h6>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div <?= $this->endSection() ?> <?= $this->section('javascript') ?> <script src="/assets/vendors/apexcharts/apexcharts.js">
</script>
<script src="/assets/js/pages/dashboard.js"></script>
<?= $this->endSection() ?>