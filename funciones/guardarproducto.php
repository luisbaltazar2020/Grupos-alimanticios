<?php
    require "conecta.php";
    $con=conecta();
    session_start();
    $id= $_SESSION["idU"];
    //Recive variables   
    $nombre = $_REQUEST['nombre'];
    $cantidad=$_REQUEST['cantidad'];
    $costo=$_REQUEST['costo'];

    $sql = "INSERT INTO `ingredientes` (`almacen_id`, `nombre`, `cantidad`, `costo`) VALUES ('$id','$nombre', '$cantidad', '$costo')";
    $res = $con->query($sql);

    header("Location:../menu.php");


?>