<?php
    /*session_start();
    $varsesion =$_SESSION['nombre'];
    if($varsesion==null||$varsesion==''){
        header("Location:menu.php");
    }
    else{
        $name = $_SESSION['nombre'];
    }*/
?>
<html>
    <head>
    <script src="JS/jquery-3.3.1.min.js"></script>
        <script>
            function regresar(){
                window.location.href="index.php";
            }
            function validacion(){
                var nombre= document.forma02.nombre.value;
                var correo = document.forma02.correo.value;
                var pass = document.forma02.pass.value;
                var hinicial = document.forma02.inicial.value;
                var tiempoventa = document.forma02.tiempoventa.value;
                if(nombre&&correo&&pass&&hinicial&&tiempoventa!=0){
                $.ajax({
                    url:'Funciones/validarcorreo.php',
                    type: 'post',
                    dataType:'text',
                    data:'correo='+correo,
                    success:function(ban){
                        if(ban==1){
                            document.forma02.method='post'
                           document.forma02.action='funciones/usuariosalva.php'
                           document.forma02.submit();
                        }
                        else{
                            $('#mensajecorreo').html('El correo '+correo+' Ya existe!');
                            setTimeout("$('#mensajecorreo').html('');",5000);
                         }
                        
                        }
                    });
                }
            else{
                $('#mensaje').html('Error (Faltan campos por llenar)');
                    setTimeout("$('#mensaje').html('');",5000);
                }
            }   
        </script>
    </head>
    <body>
        <input type="button" value="Regresar al login" onclick="regresar();">
        <form name="forma02">
            <label for="nombre:">Nombre:</label><br>
            <input type="text" name="nombre" id="nombre"/><br>
            <label for="correo">Correo:</label><br>
            <input type="text" name="correo" id="correo"/> <div id="mensajecorreo" style="color:#F00;font-size:16px;"></div>
            <label for="pass">Password:</label><br>
            <input type="password" name="pass" id="pass"/><br>
            <label for="inicial">Dame la hora inicial de venta:</label><br>
            <input type="number" name="inicial" min="1" max="24"><br>
            <label for="tiempoventa">Dame el total de tiempo de venta:</label><br>
            <input type="number" name="tiempoventa" min="1" max="16"><br><br>
            <input type="button" value="Guardar"onclick="validacion();">
            <div id="mensaje" style="color:#F00;font-size:16px;"></div>
        </form>
    </body>
</html>