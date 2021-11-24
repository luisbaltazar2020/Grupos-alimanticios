<html>
    <head>
        <link rel="stylesheet" href="./css/menu.css">
        <link rel="stylesheet" href="./css/almacen.css">
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
            function agregar(id){
                window.location.href="./agregaringrediente.php?id="+id;
            }
            function actualizar(id){
                window.location.href="lista_ingredientes.php";
            }
            function alta_almacen(){
                window.location.href="alta_almacen.php";
            }
        </script>
    </head>
    <body>
        <div class="menu">
            <div class="titulo">Grupos Alimenticios, S.A</div>
                <input type="button" class='boton' value="Cerrar sesion" onclick="cerrarsesion();">
                <input type="button" class='boton' value="Opciones" onclick="opciones();">
                <input type="button" class='boton' value="Platillos/Menu" onclick="menu();">
                <input type="button" class='boton' value="Vendedores" onclick="vendedores();">
                <input type="button" class='boton' value="Almacen" onclick="almacen();">
            </div><br>
            <input type="button" value="Registrar almacen" onclick="alta_almacen();"><br>
            <br><div class="fila">
                <div class='id'>ID</div>
                <div class='nombre'>Nombre</div>
                <div class='botones'>Boton</div>
            </div>
            <?php
                require "funciones/conecta.php";
                $con = conecta();
                session_start();
                $ide= $_SESSION["idU"];

                $sql = "SELECT * FROM almacen WHERE usuario_id=$ide";
                $res = $con->query($sql);
                $cont =1;
                
                while($row=$res->fetch_array()){
                    $id = $row["Id_almacen"];
                    $nombre = $row["nombre"];
                    echo"<div class='fila' id=$cont>";
                    echo"<div class='id'>$id</div>";
                    echo"<div class='nombre'>$nombre </div>";
                    echo"<div class='botones'>";
                    echo"<input onclick='agregar($id);' type='submit' value='Agregar' />";
                    echo"<input onclick='actualizar($id);' type='submit' value='Actualizar'/>";
                    echo"</div>";
                    echo "</div>";
                    $cont++;
                }

            ?>
    </body>
</html>