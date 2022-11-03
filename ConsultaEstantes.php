<?php
include 'database.php';

if (empty($_POST['bodegaRegEst']) && empty($_POST['pasilloregEst'])) {

    $query = "SELECT DISTINCTROW pasillo,estante FROM productos";
    $result = mysqli_query($connection, $query);
} elseif (!empty($_POST['bodegaRegEst']) && empty($_POST['pasilloregEst'])) {

    $bodResEst = $_POST['bodegaRegEst'];

    $query = "SELECT DISTINCTROW pasillo,estante FROM `productos` WHERE bodega ='$bodResEs'";
    $result = mysqli_query($connection, $query);
} elseif (!empty($_POST['bodegaRegEst']) && !empty($_POST['pasilloregEst'])) {

    $bodResEst = $_POST['bodegaRegEst'];
    $pasResEst = $_POST['pasilloRegEst'];

    $query = "SELECT DISTINCTROW pasillo,estante FROM `productos` WHERE bodega ='$bodResEst' AND pasillo ='$pasResEst'";
    $result = mysqli_query($connection, $query);
}




// $query = "SELECT DISTINCTROW pasillo,estante FROM `productos` WHERE bodega ='501'";
// $result = mysqli_query($connection, $query);
// $filas = mysqli_num_rows($result);

if (!$result) {
    die("Error");
}

$json = array();
while ($row = mysqli_fetch_array($result)) {

    $json[] = array(
        'pasillo' => $row['pasillo'],
        'estante' => $row['estante'],
    );
}

$jsonString = json_encode($json);
echo $jsonString;
