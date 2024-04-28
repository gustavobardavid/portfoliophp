<?php
    try {
        $pdo = new PDO('sqlite:db/banco.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $tabelaExiste = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='tasks'");
    
        if (!$tabelaExiste->fetchColumn()) {
            $pdo->exec("CREATE TABLE tasks (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                completed BOOLEAN DEFAULT FALSE
            )");
        }
    } catch (PDOException $e) {
        echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
        exit;
    }
?>