<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4 alert alert-primary" role="alert">
        <?php 
        if ($_POST["nome"] != "") {
            $nome = $_POST["nome"];
            echo "Olá, $nome ! Seja Bem-Vindo ao Site!";
        } else {
            $mensagem_erro = "Por favor, digite seu nome.";
            header("Location: index.php?erro={$mensagem_erro}");
        }
        ?>
    </div>
</body>
</html>