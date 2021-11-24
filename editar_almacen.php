<html>
    <head>
        <link rel="stylesheet" href="./css/menu.css">
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
            function validacion(id,ida){
                var cantidad=document.forma01.cantidad.value;
                var costo=document.forma01.costo.value;
                window.location.href="./funciones/update_almacen.php?id="+id+'&idea='+ida+'&cantidad='+cantidad+'&costo='+costo;
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
        <form name="forma01">
            <?php
            $id=$_REQUEST['id'];
            $idea=$_REQUEST['ida'];
            require "funciones/conecta.php";
            $con = conecta();
            $sql = "SELECT * FROM ingredientes WHERE almacen_id=$id and id_ingrediente=$idea";
            $res = $con->query($sql);
            $row=$res->fetch_array();
            $nombre=$row['nombre'];
            echo"$nombre<br>";
            $cantidad=$row['cantidad'];
            $costo=$row['costo'];
            echo "<label for='cantidad'>Cantidad(gramos):</label><br>";
            echo "<input type='number' name='cantidad' placeholder='$cantidad' value='$cantidad'><br>";
            echo "<label for='costo'>Costo:</label><br>";
            echo "<input type='number' name='costo' placeholder='$costo' value='$costo'><br>";
            echo"<input type='button' value='Guardar' onclick='validacion($id,$idea);'>";
            ?>
            
        </form>
    </body>
</html>