<?php
    require "conecta.php";
    $con=conecta();

    //Recive variables
    $nombre = $_REQUEST['nombre'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    $hinicial = $_REQUEST['inicial'];
    $tiempoventa = $_REQUEST['tiempoventa'];

    $sql = "INSERT INTO usuario(nombre,Correo,password,tiempo_venta,h_inicial)
    VALUES('$nombre','$correo','$pass','$tiempoventa','$hinicial');";
    $res = $con->query($sql);

    header("Location:../menu.php");

?>