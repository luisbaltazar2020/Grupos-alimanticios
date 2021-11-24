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
            function validacion(){
                var nombre=document.forma01.nombre.value;
                var cantidad=document.forma01.cantidad.value;
                var costo=document.forma01.costo.value;
                if(nombre!=' '&&cantidad>0&&costo>0){
                    document.forma01.method='post'
                    document.forma01.action='funciones/guardarproducto.php';
                    document.forma01.submit();    
                }
                else{
                    $('#mensaje').html('Error (Faltan campos por llenar)');
                    setTimeout("$('#mensaje').html('');",5000);
                }
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
                <label for="nombre">Nombre:</label><br>
                <input type="text" name="nombre"><br><div id="mensajenombre" style="color:#F00;font-size:16px;"></div>
                <label for="cantidad">Cantidad(gramos):</label><br>
                <input type="number" name="cantidad"><br>
                <label for="costo">Costo:</label><br>
                <input type="number" name="costo"><br>
                <input type="button" value="Guardar" onclick='validacion();'>
                <div id="mensaje" style="color:#F00;font-size:16px;"></div>
            </form>
        
    </body>
</html>