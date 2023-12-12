<?php
$op1 = $_GET['op1'];
$op2 = $_GET['op2'];
$op = $_GET['op'];

function sumar($op1, $op2) {
    return $op1 + $op2;
}

function restar($op1, $op2) {
    return $op1 - $op2;
}

function dividir($op1, $op2) {
    if ($op2 != 0) {
        return $op1 / $op2;
    } else {
        return "Error: División por cero";
    }
}

function multiplicar($op1, $op2) {
    return $op1 * $op2;
}

switch ($op) {
    case 'sumar':
        $resultado = sumar($op1, $op2);
        break;
    case 'restar':
        $resultado = restar($op1, $op2);
        break;
    case 'dividir':
        $resultado = dividir($op1, $op2);
        break;
    case 'multiplicar':
        $resultado = multiplicar($op1, $op2);
        break;
    default:
        $resultado = "Operación no válida";
}

echo "Resultado: " . $resultado;
?>
