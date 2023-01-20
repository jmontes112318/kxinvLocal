<?php
include 'database.php';
// $lote = $_POST['lote'];
// $codigo = $_POST['codigo'];



$query = "DELETE FROM productos WHERE codigo NOT IN (SELECT codigo FROM codigos_aleatorios)";
$result = mysqli_query($connection, $query);
// $filas = mysqli_num_rows($result);

if ($result) {
    echo "ok";
} else {
    echo "0";
}
