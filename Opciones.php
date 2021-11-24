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
            function opciones(){
                window.location.href="./Opciones.php";
            }
            function vendedores(){
                window.location.href="./vendedores.php";
            }
            function validacion(id){
                var correo=document.forma01.correo.value;
                var hini=document.forma01.inicial.value;
                var tiempoventa=document.forma01.tiempo.value;
                var baja=document.forma01.baja.value;
                $.ajax({
                    url:'Funciones/actualiza.php',
                    type:'post',
                    dataType:'text',
                    data:'&correo='+correo+'&hini='+hini+'&tiempo='+tiempoventa+'&baja='+baja,
                    success:function(ban){
                        if(ban==1){
                            window.location.href="./menu.php";
                        }
                    }
                });
                
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
            <form name="forma01">
                <?php
                //conexion
                    require "funciones/conecta.php";
                    $con = conecta();
                    session_start();
                    //inicio de se variable de sesion para validar que usuario esta trabajando
                    $id= $_SESSION["idU"];
                    $sql ="SELECT Correo,tiempo_venta,h_inicial,eliminado, status FROM `usuario` WHERE id=$id;";
                    $res = $con->query($sql);
                    $row=$res->fetch_array();
                    $correo=$row["Correo"];
                    $ini=$row["h_inicial"];
                    $hventa=$row["tiempo_venta"];
                    $eliminado=$row["eliminado"];
                    echo" <label for='correo'>Correo:</label><br>";
                    echo"<input type='text' name='correo' placeholder='$correo' value='$correo'/><br>";
                    echo"<label for='inicial'>Dame la hora inicial de venta:</label><br>";
                    echo"<input type='number' name='inicial' min='1' max='24' placeholder='$ini' value='$ini'><br>";
                    echo"<label for='tiempo'>Dame el total de tiempo de venta:</label><br>";
                    echo"<input type='number' name='tiempo' min='1' max='24' placeholder='$hventa' value='$hventa'><br>";
                ?>
                <label for="baja">Dar de baja:</label><br>
                <select name="baja" id="baja">
                    <option value="1" >NO</option>
                    <option value="0" >SI</option>
                </select><br><br>
                <input type="button" value="Guardar"onclick="validacion(<?php $id ?>);">
            </form>
    </body>
</html>