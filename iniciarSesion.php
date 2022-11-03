<?php

if ($_POST['idUsuario']) {

    $id_usu = $_POST['idUsuario'];
    $nombre_usu = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $tipo_usu = $_POST['tipoUsusario'];
    $bod_usuario = $_POST['bodega'];

    session_start();
    $_SESSION['id_usuario'] = $id_usu;
    $_SESSION['nombre'] = $nombre_usu;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['perfil'] = $tipo_usu;
    $_SESSION['bodega'] = $bod_usuario;
}
