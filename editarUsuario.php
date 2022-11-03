<?php

include 'database.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$perfil = $_POST['perfil'];
$password = $_POST['password'];
$bodega = $_POST['bodega'];

$query = "UPDATE usuarios SET bodega = '$bodega' ,nombre = '$nombre' , usuario = '$usuario',perfil ='$perfil',password='$password' WHERE id = $id";

$result = mysqli_query($connection, $query);


if (!$result) {
    die('Error updating tareas');
}

echo 'ok';
