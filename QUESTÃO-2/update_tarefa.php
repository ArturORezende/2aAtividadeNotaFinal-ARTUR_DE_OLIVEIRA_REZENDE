<?php
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        $db = getDatabaseConnection();
        $stmt = $db->prepare("UPDATE tarefas SET concluido = 1 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

        header('Location: index.php');
    exit();
?>