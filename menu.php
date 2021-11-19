<?php
    session_start();
    $varsesion =$_SESSION['nombre'];
    if($varsesion==null||$varsesion==''){
        header("Location:Index.php");
    }
    else{
        $name = $_SESSION['nombre'];
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/menu.css">
        <script>
             function cerrarsesion(){
                window.location.href="./funciones/cerrar.php";
            }
        </script>
    </head>
    <body>
        <div class="menu">
            <div class="titulo">Grupos Alimenticios, S.A</div>
        <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
        <input type="button" class='boton' value="Cuenta de Admin">
        <input type="button" class='boton' value="Opciones">
        <input type="button" class='boton' value="Platillos/Menu">
        <input type="button" class='boton' value="Vendedores">
        <input type="button" class='boton' value="Almacen">
        </div>
    </body>
</html>
