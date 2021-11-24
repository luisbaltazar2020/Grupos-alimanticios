<?php
    require "conecta.php";
    $con=conecta();
    session_start(); 
    //Recive variables 
    $id= $_SESSION["idU"];
    $nombre = $_REQUEST['nombre'];

    $sql = "INSERT INTO `almacen` (`Id_almacen`, `usuario_id`, `nombre`) VALUES (NULL, '$id', '$nombre');";
    $res = $con->query($sql);

    header("Location:../menu.php");

?>