<?php
    function getDatabaseConnection() {
        $pdo = new PDO('sqlite:tarefas.db');

        $sql = "CREATE TABLE IF NOT EXISTS tarefas (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                descricao TEXT NOT NULL,
                pendente TEXT NOT NULL,
                concluido INTEGER NOT NULL DEFAULT 0
            )";
    
        $pdo->exec($sql);

    return $pdo;
    }
?>