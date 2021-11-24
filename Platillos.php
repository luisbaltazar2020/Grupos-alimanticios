<html>
    <head>
        <link rel="stylesheet" href="./css/menu.css">
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
            function alta_platillo(){

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
            <input type="button" value="Registrar Platillo" onclick="alta_platillo();"><br>
            despues el listado
    </body>
</html>