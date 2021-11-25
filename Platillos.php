<html>
    <head>
        <link rel="stylesheet" href="./css/menu.css">
        <link rel="stylesheet" href="./css/platillos.css">
        <script>
             function cerrarsesion(){
                window.location.href="./funciones/cerrar.php";
            }
            function almacen(){
                window.location.href="./almacen.php";
            }
            function opciones(){
                window.location.href="./Opciones.php";
            }
            function vendedores(){
                window.location.href="./vendedores.php";
            }
            function alta_platillo(id){
                window.location.href="./alta_platillo.php?id="+id;
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
            </div><br>
            <?php
            $id=$_REQUEST['id'];
                echo"<input type='button' value='Registrar Platillo' onclick='alta_platillo($id);'><br><br>";
            ?>
                <div class="fila">
                <div class='id'>ID</div>
                <div class='id_platillo'>ID_almacen</div>
                <div class='id_platillo'>ID_ingrediente</div>
                <div class='nombre'>Nombre</div>
                <div class='cantidad'>Cantidad</div>
            </div>
            <?php
                require "funciones/conecta.php";
                $con = conecta();
                $sql = "SELECT * FROM platillo WHERE almacen_id=$id";
                $res = $con->query($sql);
                $cont =1;

                while($row=$res->fetch_array()){
                    $id_platillo=$row["Id_platillo"];
                    $id_almacen = $row["almacen_id"];
                    $id_ingrediente=$row["ingrediente_id"];
                    $nombre = $row["nombre"];
                    $cantidad=$row["cantidad"];

                    echo"<div class='fila' >";
                    echo"<div class='id'>$id_platillo</div>";
                    echo"<div class='id_platillo'>$id</div>";
                    echo"<div class='id_platillo'>$id_ingrediente</div>";
                    echo"<div class='nombre'>$nombre</div>";
                    echo"<div class='cantidad'>$cantidad</div>";
                    echo"</div>";
                    $cont++;
                }
            ?>
    </body>
</html>