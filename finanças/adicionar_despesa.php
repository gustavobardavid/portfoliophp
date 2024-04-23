<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $despesa = $_POST["despesa"];
        
        try {
            $pdo = new PDO('sqlite:db/banco.sqlite');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data_criacao = date('Y-m-d H:i:s');
            
            $stmt = $pdo->prepare("INSERT INTO despesas (despesa, data_criacao, paga) 
                                    VALUES (:despesa, :data_criacao, 0)");
            $stmt->bindParam(':despesa', $despesa);
            $stmt->bindParam(':data_criacao', $data_criacao);
            $stmt->execute();
            header("Location: index.php");
            exit(); 
        } catch (PDOException $e) {
            echo "Erro ao adicionar tarefa: " . $e->getMessage();
        }
    }

   
?>