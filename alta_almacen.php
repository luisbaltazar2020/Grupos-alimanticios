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
            function guardar(){
                document.forma01.method='post'
                document.forma01.action='funciones/guardaralmacen.php';
                document.forma01.submit();    
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
            <label for="nombre">Dame el nombre del almacen</label><br>
            <input type="text" name="nombre" >
            <input type="button" value="Guardar"onclick="guardar();">
        </form>
    </body>
</html>