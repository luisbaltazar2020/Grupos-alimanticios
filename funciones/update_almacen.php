<?php
    require "conecta.php";
    $con=conecta();

    //Recive variables
    $id = $_REQUEST['id'];
    $ida = $_REQUEST['idea'];
    $cantidad = $_REQUEST['cantidad'];
    $costo = $_REQUEST['costo'];

    $sql = "UPDATE `ingredientes` SET `cantidad`=$cantidad,`costo`=$costo WHERE `almacen_id`=$id AND `id_ingrediente`=$ida";
    $res = $con->query($sql);

    header("Location:../menu.php");

?>