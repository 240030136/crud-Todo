<?php
require_once "../config/database.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$database = new Database();
$db = $database->getConnection();

$sql = "DELETE FROM todos WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

header("Location: index.php");
exit;
