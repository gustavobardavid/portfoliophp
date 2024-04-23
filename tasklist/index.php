<?php
    try {
        $pdo = new PDO('sqlite:db/banco.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $tabelaExiste = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='tarefas'");
    
        if (!$tabelaExiste->fetchColumn()) {
            $pdo->exec("CREATE TABLE tarefas (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                task_name TEXT,
                data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
                concluida BOOLEAN DEFAULT FALSE
            )");
        }
    } catch (PDOException $e) {
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Task List</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Lista de Tarefas</h2>
    
        <form action="adicionar_tarefa.php" method="post">
          <div class="form-group">
            <input type="text" name="task_name" class="form-control" placeholder="Task Name">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   try {
                    $pdo = new PDO('sqlite:db/banco.sqlite');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $query = $pdo->query("SELECT * FROM tarefas");
                
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['task_name'] . "</td>";
                        echo "<td>" . $row['data_criacao'] . "</td>";
                        echo "<td>" . ($row['concluida'] ? 'Concluída' : 'Pendente') . "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
                    die();
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
