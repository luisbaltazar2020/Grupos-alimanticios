<?php
require "conecta.php";
$con=conecta();
$usuario= $_REQUEST['usuario'];
$pass= $_REQUEST['pass'];
$band=0;

$sql ="Select * from usuario where C    orreo = '$usuario' and password = '$passw'and status= 1 and eliminado =0;";
$res = $con->query($sql);
$num = $res->num_rows;

if($num>0){
    $band=1;
    $row =$res->fetch_array();
    $idU = $row["id"];
    $nombre = $row["nombre"];
    $correo = $row["Correo"];
    session_start();
    $_SESSION['idU']= $idU;
    $_SESSION["nombre"]=$nombre;
    $_SESSION["correo"]=$correo;
}
echo $band;
?>