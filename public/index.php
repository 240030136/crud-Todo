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

    $stmt = $db->prepare("INSERT INTO todos (title, description, status) VALUES (?, ?, 'Pending')");
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

    <!-- FORM CREATE TODO -->
    <form method="post" class="todo-form">
        <label>Judul Todo</label>
        <input type="text" name="title" required>

        <label>Deskripsi (opsional)</label>
        <textarea name="description" placeholder="No description"></textarea>

        <button type="submit" name="submit">Tambah Todo</button>
    </form>

    <!-- LIST TODO -->
    <div class="todo-list">
        <?php if (count($todos) === 0): ?>
            <p class="empty">Belum ada todo</p>
        <?php else: ?>
            <?php foreach ($todos as $todo): ?>
                <div class="todo-item">

                    <!-- CONTENT -->
                    <div class="todo-content">
                        <h3 class="todo-title">
                            <?= htmlspecialchars($todo['title']) ?>
                        </h3>

                        <p class="todo-desc">
                            <?= htmlspecialchars($todo['description'] ?: 'No Description') ?>
                        </p>

                        <small class="todo-date">
                            Dibuat: <?= $todo['created_at'] ?>
                        </small>
                    </div>

                    <!-- ACTION -->
                    <div class="todo-action">
                        <span class="status <?= $todo['status'] ?>">
                            <?= $todo['status'] ?>
                        </span>

                        <a href="delete.php?id=<?= $todo['id'] ?>"
                           class="delete-btn"
                           onclick="return confirm('Yakin ingin menghapus todo ini?')">
                           Hapus
                        </a>
                        <a href="edit.php?id=<?= $todo['id']; ?>" class="edit-btn">
                          Edit
                        </a>

                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>

</body>
</html>