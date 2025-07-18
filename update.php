<?php
include "config.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    if ($_FILES['thumbnail']['error'] == 0) {
        $namaFile = basename($_FILES['thumbnail']['name']);
        $lokasiTmp = $_FILES['thumbnail']['tmp_name'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . time() . "_" . $namaFile;

        if (move_uploaded_file($lokasiTmp, $targetFile)) {
            $stmt = $conn->prepare("UPDATE berita SET title=?, thumbnail=?, content=? WHERE id=?");
            $stmt->bind_param("sssi", $title, $targetFile, $content, $id);
        }
    } else {
        $stmt = $conn->prepare("UPDATE berita SET title=?, content=? WHERE id=?");
        $stmt->bind_param("ssi", $title, $content, $id);
    }

    if ($stmt->execute()) {
        header("Location: index.php?status=sukses");
    } else {
        header("Location: index.php?status=gagal");
    }
}
