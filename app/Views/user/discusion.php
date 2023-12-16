<?= $this->extend('user/layouts/app') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="page-heading text-center">
    <h3>Counseling Session</h3>
</div>
<div class="page-content">
    <section class="row justify-content-center">
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
                    <h5 class="card-title">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="avatar bg-dark me-4">
                                    <img src="<?= base_url('uploads/' . $counselor['photos']) ?>" alt="" srcset="">
                                    <span class="avatar-status bg-success"></span>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <p style="margin-bottom: 0px;"><?= $counselor['name']; ?></p>
                                <p style="margin-bottom: 0px;font-size: 12px;">Counselor</p>
                            </div>
                        </div>
                    </h5>

                    <hr>
                    <div class="card">
                        <div class="card-body" style="max-height: 800px; overflow-y: auto;">
                            <?php foreach ($chats as $ch) { ?>
                                <div class="<?php if ($ch['user_id'] != 0) {
                                                echo 'text-end';
                                            } else {
                                                echo 'text-start';
                                            } ?>">
                                    <p style="margin-bottom: 1px;"><span class="badge <?php if ($ch['user_id'] != 0) {
                                                                                            echo 'bg-success';
                                                                                        } else {
                                                                                            echo 'bg-primary';
                                                                                        } ?>"><?= $ch['description'] ?></span></p>
                                    <p style="font-size: 8px;"><?= $ch['created_at'] ?></p>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- User Input Area -->
                        <div class="card-footer">
                            <form action="<?= base_url('/chat/add') ?>" method="post" enctype="multipart/form-data" class="w-100">
                                <input type="hidden" name="user_id" value="<?= session()->get('id') ?>">
                                <input type="hidden" name="has_membership_id" value="<?= $membership['id'] ?>">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="desc" placeholder="Type your message">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>