<?php
require_once "../config/database.php";

$db = (new Database())->getConnection();

// Ambil semua todo
$stmt = $db->prepare("SELECT * FROM todos ORDER BY id DESC");
$stmt->execute();
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tambah todo
if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if ($description === "") {
        $description = "No description";
    }

    $stmt = $db->prepare("INSERT INTO todos (title, description, status) VALUES (?, ?, 'pending')");
    $stmt->execute([$title, $description]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h1>Todo List</h1>

    <!-- form create todo -->
    <form method="post" class="todo-form">
        <label>Judul Todo</label>
        <input type="text" name="title" required>

        <label>Deskripsi (opsional)</label>
        <textarea name="description" placeholder="Boleh dikosongkan"></textarea>

        <button type="submit" name="submit">Tambah Todo</button>
    </form>

    <!-- list data todo -->
    <div class="todo-list">
        <?php if (count($todos) === 0): ?>
            <p class="empty">Belum ada todo</p>
        <?php else: ?>
            <?php foreach ($todos as $todo): ?>
                <div class="todo-item">
                    <div class="todo-content">
                        <div class="todo-title"><?= htmlspecialchars($todo['title']) ?></div>
                        <div class="todo-desc">
                            <?= htmlspecialchars($todo['description'] ?: 'No description') ?>
                        </div>
                    </div>

                    <span class="status <?= $todo['status'] ?>">
                        <?= $todo['status'] ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
