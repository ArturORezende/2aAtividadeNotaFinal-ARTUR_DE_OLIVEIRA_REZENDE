<?php
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano_publicacao = $_POST['ano_publicacao'];

    $db = connectDatabase();

    $stmt = $db->prepare('INSERT INTO livros (titulo, autor, ano_publicacao) VALUES (:titulo, :autor, :ano_publicacao)');
    $stmt->bindValue(':titulo', $titulo, SQLITE3_TEXT);
    $stmt->bindValue(':autor', $autor, SQLITE3_TEXT);
    $stmt->bindValue(':ano_publicacao', $ano_publicacao, SQLITE3_INTEGER);
    $stmt->execute();

    header('Location: index.php'); 
    }
?>