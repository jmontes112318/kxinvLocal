<?php
include 'database.php';

if (isset($_POST['eliBodega'])) {

    $bodegaEli = $_POST['eliBodega'];
    // echo $bodegaEli;

    $sql = "SELECT * FROM inventario_registrado WHERE bodegaReg ='$bodegaEli'";
    $resultado = mysqli_query($connection, $sql);
    $filas = mysqli_num_rows($resultado);
    // echo $filas;

    if ($filas !== 0) {

        $query = "DELETE FROM inventario_registrado WHERE bodegaReg ='$bodegaEli'";
        $result = mysqli_query($connection, $query);

        $result2 = "";

        if ($result) {

            $query2 = "DELETE FROM productos WHERE bodega ='$bodegaEli'";
            $result2 = mysqli_query($connection, $query2);
        }

        if (!$result2) {
            die("error");
        }

        echo 'ok';
    }
    if ($filas == 0) {

        $sql = "SELECT * FROM productos WHERE bodega ='$bodegaEli'";
        $resultado = mysqli_query($connection, $sql);
        $filasP = mysqli_num_rows($resultado);

        if ($filasP !== 0) {

            $queryP = "DELETE FROM productos WHERE bodega ='$bodegaEli'";
            $resultP = mysqli_query($connection, $queryP);

            if (!$resultP) {
                die("error");
            }

            echo 'ok';
        }

        if ($filasP == 0) {
            echo 'ok';
        }

    }

}
