<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task_name = $_POST["task_name"];
        
        try {
            $pdo = new PDO('sqlite:db/banco.sqlite');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data_criacao = date('Y-m-d H:i:s');
            
            $stmt = $pdo->prepare("INSERT INTO tarefas (task_name, data_criacao, concluida) VALUES (:task_name, :data_criacao, 0)");
            $stmt->bindParam(':task_name', $task_name);
            $stmt->bindParam(':data_criacao', $data_criacao);
            $stmt->execute();
            header("Location: index.php");
            exit(); 
        } catch (PDOException $e) {
            echo "Erro ao adicionar tarefa: " . $e->getMessage();
        }
    }
?>