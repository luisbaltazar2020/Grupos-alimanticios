<html>
    <head>
        <link rel="stylesheet" href="./css/index.css">
        
        <script src="JS/jquery-3.3.1.min.js"></script>
        <script>
            function validacion(){
                var usuario=document.forma01.usuario.value;
                var pass=document.forma01.pass.value;
                if(usuario&&pass!=''){
                    $.ajax({
                        url:'./funciones/validausuario.php',
                        type: 'post',
                        datatype:'text',
                        data:'usuario='+usuario+'&pass='+pass,
                        success:function(ban){
                            if(ban==0){
                                $('#mensajenuevo').html('Datos incorrectos');
                                setTimeout("$('#mensajenuevo').html('');",5000);
                            }
                            else{
                                alert("datos correctos redireccionando");
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
    <div class="titulo">Grupos Alimenticios, S.A de C.V</div>
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
        </div>
    </body>
</html>