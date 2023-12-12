<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambio de moneda</title>
</head>

<body>
    <?php
    $arxiu = "euro.xml";
    $me_interesan = ["USD", "JPY", "SEK", "GBP", "CAD"];
    $mi_cambio = array("USD" => 0, "JPY" => 0, "SEK" => 0, "GBP" => 0, "CAD" => 0);

    if (!$xml = simplexml_load_file($arxiu)) {
        echo "No s'ha pogut carregar l'arxiu";
        die();
    }
    $mis_datos = $xml->Cube->Cube;

    foreach ($mis_datos->Cube as $cambio) {
        $rate = (string) $cambio['rate'];
        $currency = (string) $cambio['currency'];

        if (in_array($currency, $me_interesan)) {
            $mi_cambio[$currency] = $rate;
        }
    }

    $moneda = isset($_GET["moneda"]) ? $_GET["moneda"] : "";
    $importe = isset($_GET["importe"]) ? $_GET["importe"] : 0;

    if ($moneda == "") {
        $tengo_datos = false;
    } else {
        $tengo_datos = true;
    }
    ?>
    <form action="cambio.php" method="get">
        <label for="moneda">¿Qué cambio quieres conocer?:</label>
        <select name="moneda" id="moneda">
            <option value="USD" <?php echo ($moneda == "USD" ? "selected" : ""); ?>>Dólar Americano</option>
            <option value="SEK" <?php echo ($moneda == "SEK" ? "selected" : ""); ?>>Corona Sueca</option>
            <option value="GBP" <?php echo ($moneda == "GBP" ? "selected" : ""); ?>>Libra esterlina</option>
            <option value="JPY" <?php echo ($moneda == "JPY" ? "selected" : ""); ?>>Yen</option>
        </select>
        <label for="importe">Importe:</label>
        <input type="text" name="importe" id="importe" value="<?php echo $importe; ?>">
        <p><input type="submit" value="Enviar"></p>
    </form>
    <hr>
    <?php
    if ($tengo_datos == true) {
        echo "Has elegido: $moneda<br>";
        echo "Tiene un cambio respecto al euro de :" . $mi_cambio[$moneda] . "<br>";
        echo "El importe en $moneda es: " . ($mi_cambio[$moneda] * $importe) . "<br>";
    }
    ?>
    <hr>
</body>

</html>
