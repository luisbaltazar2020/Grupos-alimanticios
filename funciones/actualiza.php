<?php
    require "conecta.php";
    $con = conecta();

    session_start();
    //inicio de se variable de sesion para validar que usuario esta trabajando
    $id= $_SESSION["idU"];
    $correo=$_REQUEST['correo'];
    $tiempo=$_REQUEST['tiempo'];
    $hini=$_REQUEST['hini'];
    $baja=$_REQUEST['baja'];

    $sql = "UPDATE `usuario` SET`Correo`='$correo',`tiempo_venta`= $tiempo,`h_inicial`=$hini,`status`= $baja WHERE id=$id";
    $res = $con->query($sql);
    echo "1";
?>