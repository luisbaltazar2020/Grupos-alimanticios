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
        <script>
             function cerrarsesion(){
                window.location.href="./funciones/cerrar.php";
            }
        </script>
    </head>
    <body>
        <div class="menu">
        <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
        </div>
    </body>
</html>
