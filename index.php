<html>
    <head>
        <link rel="stylesheet" href="./css/index.css">
        
        <script src="JS/jquery-3.3.1.min.js"></script>
        <script>
            function registro(){
                window.location.href="alta.php";
            }
            function validacion(){
                var usuario=document.forma01.usuario.value;
                var pass=document.forma01.pass.value;
                if(usuario&&pass!=''){
                    $.ajax({
                        url:'./funciones/validausuario.php',
                        type: 'post',
                        datatype:'text',
                        data:'usuario='+usuario+'&pass='+pass,
                        success:function(band){
                            if(band==0){
                                $('#mensajenuevo').html('Datos incorrectos');
                                setTimeout("$('#mensajenuevo').html('');",5000);
                            }
                            else{
                                alert("datos correctos redireccionando");//aqui debe ir el redireccionamiento al menu que puso leonel
                            }
                        }
                    });
                }
                else{
                    alert("faltan campos por llenar");
                }
            }
        </script>
    </head>
    <body>
    <?php
        error_reporting(0);
        if(session_start()!=null||session_start()!=''){
            $varsesion = $_SESSION['nombre'];
        if($varsesion!=null||$varsesion!=''){
            header("Location:menu.php");
        }
        }
        ?>
    <div class="titulo">Grupos Alimenticios, S.A de C.V</div><br>
    <div id="mensajenuevo" style="color:#F00;font-size:16px;"></div>
        <div class="login">
            <img src="https://definicion.de/wp-content/uploads/2019/06/perfildeusuario.jpg"/><br><br>
            <form name="forma01">
                Usuario:<br>
                <input type="text" name="usuario"></input> <br><br>
                Password: <br>
                <input type="password" name="pass"></input><br>
            </form>
            <button type="submit" class="inicio" onclick="validacion();">Iniciar sesion</button>
            <button type="submit" class="registro" onclick="registro();">Registrarse</button>
        </div>
        
    </body>
</html>