<?php
    require "conecta.php";
    $con=conecta();

    $id= $_REQUEST['id'];   
    $nombre = $_REQUEST['nombre'];
    $cantidad=$_REQUEST['cantidad'];
    $costo=$_REQUEST['costo'];
    
    echo "$nombre $cantidad $costo $id";

    $sql = "INSERT INTO `ingredientes` (`almacen_id`, `nombre`, `cantidad`, `costo`) VALUES ('$id','$nombre', '$cantidad', '$costo')";
    $res = $con->query($sql);
    header("Location:../menu.php");
?>