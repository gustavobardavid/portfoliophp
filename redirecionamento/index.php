<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apresente-se</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4 text-center">
        <div class="card col-md-6 offset-md-3">
            <?php 
                if(isset($_GET["erro"])){
                    $mensagem_erro = $_GET["erro"];
                    echo "<p class='container mt-4 alert alert-danger' role='alert'>$mensagem_erro</p>";
                }
            ?>
            <h1 class="card-title text-center">Mostre-nos quem você é:</h1>
            <form class="" action="apresentacao.php" method="post">
                <div class="form-group">
                    <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>