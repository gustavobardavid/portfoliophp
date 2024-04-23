<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id= $_POST["id"];
            try {
                $pdo = new PDO('sqlite:db/banco.sqlite');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt = $pdo->prepare("DELETE FROM despesas WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                header("Location: index.php");
                exit(); 
            } catch (PDOException $e) {
                echo "Erro ao excluir tarefa: " . $e->getMessage();
            }
    }
?>