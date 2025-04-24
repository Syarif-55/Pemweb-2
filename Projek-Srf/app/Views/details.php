<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Detail Mata Kuliah</h1>
    <?php if ($mata_kuliah): ?>
        <table>
            <tr>
                <th>Nama</th>
                <td><?= $mata_kuliah['nama'] ?></td>
            </tr>
            <tr>
                <th>Kode</th>
                <td><?= $mata_kuliah['kode'] ?></td>
            </tr>
            <tr>
                <th>SKS</th>
                <td><?= $mata_kuliah['sks'] ?></td>
            </tr>
            <tr>
                <th>Dosen</th>
                <td><?= $mata_kuliah['dosen'] ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Mata kuliah tidak ditemukan!</p>
    <?php endif; ?>
    <a href="/"><button>Kembali</button></a>
</body>
</html>
