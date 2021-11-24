<html>
    <head>
        <link rel="stylesheet" href="./css/menu.css">
        <link rel="stylesheet" href="./css/vendedores.css">
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
            function eliminarfila(id){
                if(confirm("desea eliminarlo?")==true){
                    $.ajax({
                        url:'Funciones/Update.php',
                        type: 'post',
                        datatype:'text',
                        data: 'id='+id,
                        success:function(ban){
                        if(ban==1){
                            $('#'+id).hide();
                        }else{
                             
                        }
                    },error: function(){
                        alert('error archivo no encontrado');
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
            </div><br><br>
            
            <div class='fila'>
                <div class='id'>ID</div>
                <div class='nombre'>Nombre</div>
                <div class='correo'>Correo</div>
                <div class='tiempo'>Tiempo venta</div>
                <div class='hini'>Hora inicial</div>
                <div class='botona'>Boton</div>
            </div>
            <?php
                require "funciones/conecta.php";
                $con = conecta();

                $sql = "SELECT * FROM usuario WHERE status=1 AND eliminado=0";
                $res = $con->query($sql);
                $cont =1;
                
                while($row=$res->fetch_array()){
                    $id = $row["id"];
                    $nombre = $row["nombre"];
                    $correo = $row["Correo"];
                    $tiempo = $row["tiempo_venta"];
                    $hini = $row["h_inicial"];
                    echo"<div class='fila' id=$cont>";
                    echo"<div class='id'>$id</div>";
                    echo"<div class='nombre'>$nombre </div>";
                    echo"<div class='correo'>$correo</div>";
                    echo"<div class='tiempo'>$tiempo</div>";
                    echo"<div class='hini'>$hini</div>";
                    echo"<div class='botona'>";
                    echo"<input onclick='eliminarfila($id);' type='submit' value='Eliminar'/>";
                    echo"</div>";
                    echo "</div>";
                    $cont++;
                }

            ?>
    </body>
</html>