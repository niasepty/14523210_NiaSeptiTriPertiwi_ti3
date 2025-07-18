<?php
include "config.php";

if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    if ($_FILES['thumbnail']['error'] == 0) {
        $namaFile = basename($_FILES['thumbnail']['name']);
        $lokasiTmp = $_FILES['thumbnail']['tmp_name'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . time() . "_" . $namaFile;

        if (move_uploaded_file($lokasiTmp, $targetFile)) {
            $stmt = $conn->prepare("INSERT INTO berita (title, thumbnail, content) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $targetFile, $content);

            if ($stmt->execute()) {
                header("Location: index.php?status=sukses");
            } else {
                header("Location: index.php?status=gagal");
            }
        } else {
            header("Location: index.php?status=gagal_upload");
        }
    } else {
        header("Location: index.php?status=error_file");
    }
}
