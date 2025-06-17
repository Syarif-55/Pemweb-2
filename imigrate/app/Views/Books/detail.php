<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col">

            <h2 class="mb-3">Detail Buku</h2>
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('pesan'); ?></div>
            <?php endif; ?>

            <?php if (!$buku): ?>
                <div class="alert alert-danger">Data buku tidak ditemukan.</div>
                <a href="/books" class="btn btn-primary">Kembali ke Daftar Buku</a>
                <?= $this->endSection(); ?>
                <?php return; ?>
            <?php endif; ?>

            <div class="card mb-3 shadow" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= esc($buku['sampul']); ?>" class="img-fluid rounded-start"
                            alt="<?= esc($buku['judul']); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($buku['judul']); ?></h5>
                            <p class="card-text"><b>Penulis:</b> <?= esc($buku['penulis']); ?></p>
                            <p class="card-text"><b>Penerbit:</b> <?= esc($buku['penerbit']); ?></p>

                            <a href="/books/edit/<?= esc($buku['slug']); ?>" class="btn btn-warning btn-sm">Ubah</a>

                            <form action="/books/<?= $buku['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?');"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                            <div class="mt-3">
                                <a href="/books" class="btn btn-secondary btn-sm">← Kembali ke Daftar Buku</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>