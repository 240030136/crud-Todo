<?php
require_once "../config/database.php";

$db = (new Database())->getConnection();

// Ambil semua todo
$stmt = $db->prepare("SELECT * FROM todos ORDER BY id DESC");
$stmt->execute();
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Edit Todo
$editTodo = null;
if (isset($_GET['edit'])) {
    $stmt = $db->prepare("SELECT * FROM todos WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $editTodo = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Tambah / edit todo
if (isset($_POST['submit'])) {
    $id = $_POST['id'] ?? null;
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if ($description === "") {
        $description = "No description";
    }

    if ($id) {
        // ===== EDIT (UPDATE) =====
        $stmt = $db->prepare(
            "UPDATE todos SET title = ?, description = ? WHERE id = ?"
        );
        $stmt->execute([$title, $description, $id]);
    } else {
        // ===== CREATE (INSERT) =====
        $stmt = $db->prepare(
            "INSERT INTO todos (title, description, status) VALUES (?, ?, 'Pending')"
        );
        $stmt->execute([$title, $description]);
    }

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

<h1>Todo List</h1>

<input type="text" id="searchTodo" placeholder="Cari todo..." class="search-input">

<!-- FORM CREATE TODO -->
<form method="post" class="todo-form">

    <input type="hidden" name="id" value="<?= $editTodo['id'] ?? '' ?>">

    <label>Judul Todo</label>
    <input type="text" name="title" required
        value="<?= htmlspecialchars($editTodo['title'] ?? '') ?>">

    <label>Deskripsi (opsional)</label>
    <textarea name="description"><?= htmlspecialchars($editTodo['description'] ?? '') ?></textarea>

    <button type="submit" name="submit">
        <?= $editTodo ? 'Update Todo' : 'Tambah Todo' ?>
    </button>

</form>

<!-- LIST TODO -->
<div class="todo-list">
<?php if (count($todos) === 0): ?>
    <p class="empty">Belum ada todo</p>
<?php else: ?>
<?php foreach ($todos as $todo): ?>


<div class="todo-item todo-search-item"
     data-title="<?= strtolower($todo['title']) ?>"
     data-desc="<?= strtolower($todo['description']) ?>">

<!-- CONTENT -->
    <div class="todo-content">
        <h3><?= htmlspecialchars($todo['title']) ?></h3>
        <p><?= htmlspecialchars($todo['description']) ?></p>
        <small>Dibuat: <?= $todo['created_at'] ?></small>
    </div>

  <!-- ACTION -->
    <div class="todo-action">
        <span class="status <?= strtolower($todo['status']) ?>">
            <?= $todo['status'] ?>
        </span>

        <a href="?edit=<?= $todo['id'] ?>" class="edit-btn">Edit</a>

        <a href="delete.php?id=<?= $todo['id'] ?>"
           class="delete-btn"
           onclick="return confirm('Yakin ingin menghapus todo ini?')">
           Hapus
        </a>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

</div>

<script src="assets/js/app.js"></script>
</body>
</html>
