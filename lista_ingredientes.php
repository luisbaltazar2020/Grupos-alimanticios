<html>.
    <head>
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/ingredientes.css">
    <script src="JS/jquery-3.3.1.min.js"></script>
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
                window.location.href="./vendedores.php";
            }
            </script>
            <script>
            function actualizar(id,idea){
                window.location.href="./editar_almacen.php?id="+id+'&ida='+idea;
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
            <br><div class="fila">
                <div class='id'>ID</div>
                <div class='nombre'>Nombre</div>
                <div class="cantidad">Cantidad:</div>
                <div class="costo">Costo:</div>
                <div class='botones'>Boton</div>
            </div>
            <?php
                require "funciones/conecta.php";
                $id=$_REQUEST["id"];
                $con = conecta();
                session_start();
                $ide= $_SESSION["idU"];

                $sql = "SELECT * FROM ingredientes WHERE almacen_id=$id";
                $res = $con->query($sql);
                $cont =1;
                
                while($row=$res->fetch_array()){
                    $ida = $row["id_ingrediente"];
                    $nombre = $row["nombre"];
                    $cantidad=$row["cantidad"];
                    $costo=$row["costo"];
                    echo"<div class='fila' id=$cont>";
                    echo"<div class='id'>$id</div>";
                    echo"<div class='nombre'>$nombre</div>";
                    echo"<div class='cantidad'>$cantidad</div>";
                    echo"<div class='costo'>$costo</div>";
                    echo"<div class='botones'>";
                    echo"<input onclick='actualizar($id,$ida);' type='submit' value='Editar' />";
                    echo"</div>";
                    echo "</div>";
                    $cont++;
                }
            ?>
    </body>
</html>