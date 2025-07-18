<?php
include "config.php";
$id = $_GET['id'];
$q = $conn->prepare("SELECT * FROM berita WHERE id = ?");
$q->bind_param("i", $id);
$q->execute();
$data = $q->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Berita</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Edit Berita</h2>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="text" name="title" value="<?= $data['title'] ?>" required><br>
        <img src="<?= $data['thumbnail'] ?>" width="100"><br>
        <input type="file" name="thumbnail"><br>
        <textarea name="content" required><?= $data['content'] ?></textarea><br>
        <button type="submit" name="submit">Update</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>