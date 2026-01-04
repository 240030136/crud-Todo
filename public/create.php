<?php
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST["title"]);

    if (!empty($title)) {

        $database = new Database();
        $db = $database->getConnection();

        $query = "INSERT INTO todos (title, description) VALUES (:title, :description)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menambahkan todo";
        }

    } else {
        echo "Judul tidak boleh kosong";
    }
}
?>