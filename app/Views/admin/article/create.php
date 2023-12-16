<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Article Menu</h3>
                <p class="text-subtitle text-muted">Add Data Article </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/article') ?> ">Article</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create data</li>
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
                <p>Please Input the corect data of user!</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/article/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="konselor_id" value="<?= session()->get('id') ?>">
                            <div class="form-group">
                                <label for="image" class="form-label">Picture</label>
                                <input type="file" class="form-control" id="image" name="image" accept="photos/*">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Sort Description</label>
                                <textarea name="sort_description" class="form-control" id="sort_description" cols="30" rows="3" placeholder="sort description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <input type="text" name="tag" class="form-control" placeholder="Tag" required>
                            </div>
                            <div class="form-group">
                                <label for="is_published">Published</label>
                                <select name="is_published" id="is_published" class="form-control">
                                    <option value="">Choose Publish</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Data</button>
                        <a href="javascript:window.history.go(-1);" value="draft" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>