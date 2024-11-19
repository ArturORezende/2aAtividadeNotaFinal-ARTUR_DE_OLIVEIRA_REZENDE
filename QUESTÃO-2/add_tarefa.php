<?php
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descricao = $_POST['descricao'];
        $pendente = $_POST['pendente'];

        $db = getDatabaseConnection();
        $stmt = $db->prepare("INSERT INTO tarefas (descricao, pendente) VALUES (:descricao, :pendente)");
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':pendente', $pendente);
        $stmt->execute();
    }

        header('Location: index.php');
    exit();
?>