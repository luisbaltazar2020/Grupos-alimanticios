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
            function almacen(){
                window.location.href="./almacen.php";
            }
            function menu(){
                window.location.href="./Platillos.php";
            }
            function opciones(){
                window.location.href="./Opciones.php";
            }
            function vendedores(){
                window.location.href="./vendedores.php?id";
            }
        </script>
    </head>
    <body>
        <div class="menu">
            <div class="titulo">Grupos Alimenticios, S.A</div>
        <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
        <input type="button" class='boton' value="Opciones" onclick="opciones();">
        <input type="button" class='boton' value="Vendedores" onclick="vendedores();">
        <input type="button" class='boton' value="Almacen" onclick="almacen();">
        </div>
            
        <div class='menucompras'>
            <?php
                $id=$_SESSION['idU'];
                require "funciones/conecta.php";
                $con = conecta();
                $sql = "SELECT * FROM almacen WHERE usuario_id=$id";
                $res = $con->query($sql);
                while($row=$res->fetch_array()){
                    $id_almacen = $row["Id_almacen"];
                    $sqli ="SELECT * FROM ingredientes where almacen_id=$id_almacen";
                    $res2 = $con->query($sqli);
                    while($row2=$res2->fetch_array()){
                        $can=$row2['cantidad'];
                        $nombre=$row2['nombre'];
                        if($can<100){
                            echo"<div> Necesitas comprar mas: $nombre </div>";
                        }
                    }
                    
                }

            ?>
        </div>
    </body>
</html>
