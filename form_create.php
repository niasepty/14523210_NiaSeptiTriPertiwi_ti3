<!DOCTYPE html>
<html>

<head>
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Tambah Berita</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Judul" required><br>
        <input type="file" name="thumbnail" accept="image/*" required><br>
        <textarea name="content" placeholder="Konten" required></textarea><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>