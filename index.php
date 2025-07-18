<?php
include "config.php";
$data = $conn->query("SELECT * FROM berita ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Berita</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Daftar Berita</h2>
    <?php if (isset($_GET['status'])): ?>
        <p class="notif <?= $_GET['status'] ?>">
            <?php
            if ($_GET['status'] == 'sukses') echo "Berhasil!";
            else echo "Gagal melakukan aksi!";
            ?>
        </p>
    <?php endif; ?>

    <a href="form_create.php">+ Tambah Berita</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Thumbnail</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><img src="<?= $row['thumbnail'] ?>" width="100"></td>
                <td><?= $row['title'] ?></td>
                <td><?= substr($row['content'], 0, 100) ?>...</td>
                <td>
                    <a href="form_edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>