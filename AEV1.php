<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    
    <?php
        $resultado = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ancho = floatval($_POST['ancho']);
            $largo = floatval($_POST['largo']);
            $alto = floatval($_POST['alto']);
            $peso = floatval($_POST['peso']);
            $paquetes = intval($_POST['paquetes']);
            $zona = $_POST['zona'];

            $volumen = $ancho * $largo * $alto;

            if ($volumen <= 0.5) {
                $precioBase = 50 * $volumen;
            } elseif ($volumen <= 1) {
                $precioBase = 75 * $volumen;
            } else {
                $precioBase = 100 * $volumen;
            }

            if ($peso > 15) {
                $resultado = "El envío es desestimado por sobrepasar los 15 kg.";
            } else {
                if ($peso > 10) {
                    $precioBase *= 1.5;
                } elseif ($peso > 5) {
                    $precioBase *= 1.25;
                }

                if ($zona == 'Baleares_a') {
                    $precioBase *= ($zona == 'Baleares_a') ? 1.10 : 1.00;
                } elseif ($zona == 'Canarias') {
                    $precioBase *= 1.10;
                }

                $total = $precioBase * $paquetes;
                $resultado = "Total a pagar: " . number_format($total, 2) . " €";
            }
        }
    ?>
    
    <form method="POST" action="">
        <label for="paquetes">PAQUETES:</label>
        <input type="number" id="paquetes" name="paquetes" value="" required>
        <label for="ancho">ANCHO (m):</label>
        <input type="number" id="ancho" name="ancho" value="" step="0.01" required>
        <label for="largo">LARGO (m):</label>
        <input type="number" id="largo" name="largo" value="" step="0.01" required>
        <label for="alto">ALTO (m):</label>
        <input type="number" id="alto" name="alto" value="" step="0.01" required>
        <label for="peso">PESO (kg):</label>
        <input type="number" id="peso" name="peso" value="" step="0.01" required>
        <label for="zona">ZONA:</label>
        <select id="zona" name="zona">
            <option value="Peninsula">Península</option>
            <option value="Baleares_a">Baleares Áereo</option>
            <option value="Baleares_m">Baleares Marítimo</option>
            <option value="Canarias">Canarias</option>
        </select>
        
        <input type="submit" value="Calcular">
    </form>

    <?php if ($resultado): ?>
        <h2><?php echo $resultado; ?></h2>
    <?php endif; ?>
</body>
</html>