<html>
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
            function opciones(){
                window.location.href="./Opciones.php";
            }
            function vendedores(){
                window.location.href="./vendedores.php";
            }
            function validacion(id,ida){
                var nombre=document.forma01.nombre.value;
                var cantidad=document.forma01.cantidad.value;
                if(nombre!=' '&&cantidad!=' '){
                    $.ajax({
                    url:'funciones/platillossalva.php',
                    type:'post',
                    dataType:'text',
                    data:'&nombre='+nombre+'&cantidad='+cantidad+'&id='+id+'&ida='+ida,
                    success:function(ban){
                        if(ban==1){
                            window.location.href="./alta_platillo.php?id="+id;
                        }
                    }
                    });
                }
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
    <form name="forma01">
    <label for="nombre">Nombre del platillo:</label><br>
    <input type="text" name="nombre"><br>
    <label for="cantidad">Cantidad(gramos):</label><br>
    <input type="text" name="cantidad" >
    </form><br>
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
                    echo"<input onclick='validacion($id,$ida);' type='submit' value='Enviar' />";
                    echo"</div>";
                    echo "</div>";
                    $cont++;
                }
            ?>
    </body>
</html>