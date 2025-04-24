<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Profil</h1>
    <p><strong>Nama:</strong> <?= $profil['nama'] ?></p>
    <p><strong>Alamat:</strong> <?= $profil['alamat'] ?></p>
    <p><strong>Hobi:</strong> <?= $profil['hobi'] ?></p>

    <h2>Daftar Mata Kuliah</h2>
    <ul>
        <?php foreach ($mata_kuliah as $mk): ?>
        <li>
        <a href="/mata_kuliah/details/<?= $mk['kode'] ?>">
           <?= $mk['kode'] ?> - <?= $mk['nama'] ?>
        </a>

        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
