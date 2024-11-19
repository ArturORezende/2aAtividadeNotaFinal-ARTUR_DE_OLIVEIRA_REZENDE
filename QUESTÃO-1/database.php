<?php
    function connectDatabase() {
        $dbFile = 'livraria.db'; 
        $db = new SQLite3($dbFile);
    
    $db->exec("CREATE TABLE IF NOT EXISTS livros (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                titulo TEXT NOT NULL,
                autor TEXT NOT NULL,
                ano_publicacao INTEGER NOT NULL
            )");

    return $db;
    }
?>