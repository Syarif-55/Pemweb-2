<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
        <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <h2><?= $title; ?></h2>

    <form action="/books/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>


        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" value="<?= old('judul'); ?>"
                class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback"><?= $validation->getError('judul'); ?></div>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" value="<?= old('penulis'); ?>"
                class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback"><?= $validation->getError('penulis'); ?></div>
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" value="<?= old('penerbit'); ?>"
                class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback"><?= $validation->getError('penerbit'); ?></div>
        </div>
        <label for="penerbit" class="form-label">Sampul</label>
        <div class="input-group mb-3">
            
            <br>    
    <input type="file" class="form-control @<?= $validation->hasError('sampul') ? 'is-invalid' : '' ?>" id="sampul" name="sampul" onchange="previewimg()">
    <div class="invalid-feedback">
        <?= $validation->getError('sampul'); ?>
    </div>
    <label class="input-group-text" for="sampul">Upload</label>
</div>


        <button type="submit" class="btn btn-primary">Tambah Buku</button>
    </form>
</div>

<?= $this->endSection(); ?>