<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];

        $imc = $peso / ($altura * $altura);

        echo "<h2>Seu IMC é: " . substr($imc, 4) . "</h2>";
        echo "<p>Interpretação do IMC:<br>";
        echo "Abaixo do peso: Menos de 18.5<br>";
        echo "Peso normal: 18.5–24.9<br>";
        echo "Sobrepeso: 25–29.9<br>";
        echo "Obesidade: 30 ou mais</p>";
    }
?>