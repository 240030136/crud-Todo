<?php
require_once "../config/database.php";

$db = (new Database())->getConnection();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Ambil data todo
$stmt = $db->prepare("SELECT * FROM todos WHERE id = ?");
$stmt->execute([$_GET['id']]);
$todo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$todo) {
    header("Location: index.php");
    exit;
}

// ===== UPDATE =====
if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if ($description === "") {
        $description = "No description";
    }

    $stmt = $db->prepare(
        "UPDATE todos SET title = ?, description = ? WHERE id = ?"
    );
    $stmt->execute([$title, $description, $todo['id']]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Todo</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

<h1>Edit Todo</h1>

<form method="post" class="todo-form">
    <label>Judul Todo</label>
    <input type="text" name="title" required
        value="<?= htmlspecialchars($todo['title']) ?>">

    <label>Deskripsi</label>
    <textarea name="description"><?= htmlspecialchars($todo['description']) ?></textarea>

    <button type="submit" name="submit">Update Todo</button>
    <a href="index.php" class="cancel-btn">Batal</a>
</form>

</div>

</body>
</html>
