<?php 
    require 'connection.php';

    // Rota para buscar todas as tarefas
    if ($_SERVER["REQUEST_METHOD"] === 'GET' && empty($_GET)) {
        try {
            $stmt = $pdo->query('SELECT * FROM tasks');
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($tasks);
        } catch(PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    // Rota para adicionar uma nova tarefa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
    
        if (empty($data['title'])) {
            echo json_encode(['error' => 'O título da tarefa é obrigatório']);
            exit;
        }
    
        $title = $data['title'];
    
        try {
            $stmt = $pdo->prepare('INSERT INTO tasks (title) VALUES (:title)');
            $stmt->bindParam(':title', $title);
            $stmt->execute();
            $taskId = $pdo->lastInsertId();
            echo json_encode(['id' => $taskId, 'title' => $title, 'completed' => false]);
        } catch(PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    
?>