<?php
    require "conecta.php";
    $con = conecta();

    session_start();
    //inicio de se variable de sesion para validar que usuario esta trabajando
    $id=$_REQUEST['id'];
    $nombre=$_REQUEST['nombre'];
    $cantidad=$_REQUEST['cantidad'];
    $ida=$_REQUEST['ida'];
    echo"$id $nombre $cantidad $ida";


    $sql = "INSERT INTO `platillo`(`almacen_id`, `nombre`, `ingrediente_id`, `cantidad`)VALUES ($id,'$nombre',$ida,$cantidad)";
    $res = $con->query($sql);
    echo "1";
?> 