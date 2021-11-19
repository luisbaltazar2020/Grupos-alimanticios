<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login 01</title>
    <link rel="stylesheet" href="./css/alta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
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
        
        <form name="forma02" class="form-box animated fadeInUp">
            <input type="button" value="Regresar al login" onclick="regresar();">
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