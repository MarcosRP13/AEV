<!DOCTYPE html>
<html>
<head>
    <title>Conjetura de Collatz</title>
</head>
<body>
    <h1>Conjetura de Collatz</h1>
    
    <?php
        
        $sucesion = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = intval($_POST['numero']);
            
            if ($numero <= 0) {
                $resultado = "Por favor, ingresa un número entero positivo.";
            } else {
                while ($numero != 1) {
                    $sucesion[] = $numero;
                    if ($numero % 2 == 0) {
                        $numero /= 2;
                    } else {
                        $numero = $numero * 3 + 1;
                    }
                }
                $sucesion[] = 1;
                echo "La sucesión de Collatz es: " . implode(", ", $sucesion);
            }
        }
    ?>
    
    <form method="POST" action="">
        <label for="numero">Número entero positivo:</label>
        <input type="number" id="numero" name="numero" required>
        <input type="submit" value="Comprobar">
    </form>


</body>
</html>