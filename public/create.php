<?php
require_once "../config/database.php";

$database = new Database();
$db = $database->getConnection();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $db->prepare(
        "INSERT INTO todos (title, description, status) VALUES (?, ?, 1)"
    );
    $stmt->execute([$title, $description]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Todo</title>
</head>
<body>

<div class="container">
    <h2>Tambah Todo</h2>

    <form method="post">
        <div class="form-group">
            <label>Judul Todo</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4" required></textarea>
        </div>

        <button type="submit" name="submit">Simpan</button>
    </form>

    <a href="index.php">← Kembali</a>
</div>

</body>
</html>
