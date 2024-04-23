<?php
    try {
        $pdo = new PDO('sqlite:db/banco.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $tabelaExiste = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='despesas'");
    
        if (!$tabelaExiste->fetchColumn()) {
            $pdo->exec("CREATE TABLE despesas (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                despesa TEXT,
                data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
                paga BOOLEAN DEFAULT FALSE
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
    <title>Finance</title>
</head>
<style>
    body {
        text-align: center;
    }
</style>
<body>
    <div class="container mt-4">
        <h2>Minhas Despesas</h2>
            <form action="adicionar_despesa.php" method="post">
                <div class="form-group">
                    <input type="text" name="despesa" class="form-control" placeholder="Despesa">
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Despesa</th>
                        <th>Data de Criação</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       try {
                        $pdo = new PDO('sqlite:db/banco.sqlite');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                        $query = $pdo->query("SELECT * FROM despesas");
                    
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['despesa'] . "</td>";
                            echo "<td>" . $row['data_criacao'] . "</td>";
                            echo "<td>" . ($row['paga'] ? 'Paga' : 'Pendente') . "</td>";
                            echo "<td>";
                            echo "<form action='excluir_despesa.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<button type='submit' class='btn btn-danger'>Excluir</button>";
                            echo "</form>";
                            echo "</td>";
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