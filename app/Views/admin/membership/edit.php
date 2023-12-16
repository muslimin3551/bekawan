<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Membership Menu</h3>
                <p class="text-subtitle text-muted">Edit Data Membership </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/membership') ?> ">Membership</a></li>
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
                <form action="" method="post" id="text-editor">
                    <div class="row">
                        <div class="col-md-6">
                        <input type="hidden" name="id" value="<?= $membership['id'] ?>">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $membership['name'] ?>" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea class="form-control" id="dsc" name="dsc" rows="3" placeholder="Description"><?= $membership['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Cost</label>
                                <input type="number" name="cost" class="form-control" value="<?= $membership['cost'] ?>" placeholder="Cost" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Benefit</label>
                                <textarea class="form-control" id="benefit" name="benefit" rows="3" placeholder="benefit"><?= $membership['benefit'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="javascript:window.history.go(-1);"  value="draft" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>