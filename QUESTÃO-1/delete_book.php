<?php
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        $db = connectDatabase();

        $stmt = $db->prepare('DELETE FROM livros WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();

    header('Location: index.php');
    }
?>