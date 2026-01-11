<?php
require_once "../config/database.php";

$db = (new Database())->getConnection();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// ambil status sekarang
$stmt = $db->prepare("SELECT status FROM todos WHERE id = ?");
$stmt->execute([$id]);
$todo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$todo) {
    header("Location: index.php");
    exit;
}

// toggle status
$newStatus = ($todo['status'] === 'pending') ? 'done' : 'pending';

// update
$stmt = $db->prepare("UPDATE todos SET status = ? WHERE id = ?");
$stmt->execute([$newStatus, $id]);

header("Location: index.php");
exit;
