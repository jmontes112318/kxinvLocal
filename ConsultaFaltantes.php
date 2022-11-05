<?php
include 'database.php';

if (empty($_POST['bodProductFaltantes']) && empty($_POST['pasProductFaltantes'])) {

   
$query = "SELECT codigo,descripcion,sum(stock) AS stk ,SUM(cant_ingresada) as ingresado,
(SUM(cant_ingresada)-sum(stock)) AS inco,alterno,ubicacion,ubicacion2,((SUM(cant_ingresada)-sum(stock))*costo_und) as valor_inco
FROM productos
GROUP BY codigo
HAVING inco <0
ORDER BY valor_inco DESC";
    $result = mysqli_query($connection, $query);

} elseif (!empty($_POST['bodProductFaltantes']) && empty($_POST['pasProductFaltantes'])) {

    $bodResEst = $_POST['bodProductFaltantes'];

   
$query = "SELECT codigo,descripcion,sum(stock) AS stk ,SUM(cant_ingresada) as ingresado,
(SUM(cant_ingresada)-sum(stock)) AS inco,alterno,ubicacion,ubicacion2,((SUM(cant_ingresada)-sum(stock))*costo_und) as valor_inco
FROM productos
GROUP BY codigo
HAVING inco <0
ORDER BY ubicacion";
    $result = mysqli_query($connection, $query);

} elseif (!empty($_POST['bodProductFaltantes']) && !empty($_POST['pasProductFaltantes'])) {

    $bodResEst = $_POST['bodProductFaltantes'];
    $pasResEst = $_POST['pasProductFaltantes'];


    $query = "SELECT codigo,descripcion,sum(stock) AS stk ,SUM(cant_ingresada) as ingresado,
    (SUM(cant_ingresada)-sum(stock)) AS inco,alterno,ubicacion,ubicacion2,((SUM(cant_ingresada)-sum(stock))*costo_und) as valor_inco
    FROM productos
    GROUP BY codigo
    HAVING inco <0
    ORDER BY ubicacion";
        $result = mysqli_query($connection, $query);
}


if (!$result) {
    die("Error");
}

$json = array();
while ($row = mysqli_fetch_array($result)) {

    $json[] = array(
        'codigo' => $row['codigo'],
        'descripcion' => $row['descripcion'],
        'stock' => $row['stk'],
        'ingresado' => $row['ingresado'],
        'diferencia' => $row['inco'],
        'valorDif' => $row['valor_inco'],
        'ubicacion' => $row['ubicacion'],
    );
}

$jsonString = json_encode($json);
echo $jsonString;
