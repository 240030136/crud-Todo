<?php
require_once "../config/database.php";

$db = (new Database ())->getConnection();
$stmt = $db->prepare("SELECT * FROM todos ORDER BY id DESC");
$stmt->execute();
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List App</title>
</head>
<body>
    
    <h2>Tambah Todo</h2>

<form action="create.php" method="POST">
    <input type="text" name="title" placeholder="Judul todo" required>
    <button type="submit">Tambah</button>
</form>

<?php
if (count($todos) === 0) {
    echo "<p>Belum ada todo</p>";
} else {
    echo "<ul>";
    foreach ($todos as $todo) {
        $statusText = $todo['status'] ? 'pending' : 'done';
        echo "<li>" . htmlspecialchars($todo['title']) . " ($statusText)</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>