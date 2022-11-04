<?php
include 'database.php';

if (isset($_POST['usuario'])) {



    $usuario = $_POST['usuario'];
    $ubicacion = $_POST['ubicacion'];
    $conteo = $_POST['conteo'];
    $barra = $_POST['barra'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $lote = $_POST['lote'];
    $idlote = $_POST['idlote'];
    $cantidad = $_POST['cantidad'];
    $bodega = $_POST['bodega'];



    $query = "INSERT INTO inventario_registrado(codigo,descripcion,id_lote,lote,cantidad,ubicacion_tomada,cod_barra,usuario,conteo,bodegaReg)
              VALUES('$codigo','$descripcion',$idlote,'$lote',$cantidad,'$ubicacion','$barra','$usuario','$conteo',$bodega)";


    $result = mysqli_query($connection, $query);



    if (!$result) {
        die("Error inserting");
    }

    echo 'ok';
}
