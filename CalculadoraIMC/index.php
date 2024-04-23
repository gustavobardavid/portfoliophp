<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
</head>
<body>
    <h2>Calcule seu IMC</h2>
    <form action="calcular_imc.php" method="post">
    <label for="peso">Peso (kg):</label>
    <input type="number" name="peso"required><br><br>
    
    <label for="altura">Altura (m):</label>
    <input type="number" name="altura" step="0.01" required><br><br>
    
    <button type="submit">Calcular</button>
    </form>
</body>
</html>