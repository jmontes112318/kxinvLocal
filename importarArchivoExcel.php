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
    $valorC = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
    $valorD = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
    $valorE = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
    $valorF = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
    $valorG = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
    $valorH = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
    $valorI = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
    $valorJ = $hojaActual->getCellByColumnAndRow(10, $indiceFila);

    $query = "INSERT INTO inventariogeneral(codigo,lote,Fecha_Vencimiento,descripcion,stock,costo_und,ubicacion,pasillo,estante,alterno)
                  VALUES ('$valorA','$valorB','$valorC','$valorD',$valorE,$valorF,'$valorG','$valorH','$valorI','$valorJ') ";
    $result = mysqli_query($connection, $query);
}
