<?php
require 'vendor/autoload.php';
include 'database.php';
set_time_limit(2000000);

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nombreArchivo = $_FILES['excel']['tmp_name'];
$documento = IOFactory::load($nombreArchivo);
$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$numeroColumn = $hojaActual->getHighestDataColumn();
$numLetras = Coordinate::columnIndexFromString($numeroColumn);

for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {
    // for ($indiceColumna = 1; $indiceColumna <= $numLetras; $indiceColumna++) {
        $valorA = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
        $valorB = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
   

    $query = "INSERT INTO codigos_aleatorios(codigo,bodega)
                  VALUES ('$valorA','$valorB') ";
    $result = mysqli_query($connection, $query);

    var_dump($query);
}
