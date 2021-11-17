<?php
 require "conecta.php";
 $con = conecta();
 $correo = $_REQUEST['correo'];
 $sql = "SELECT * FROM usuario WHERE status=1 AND eliminado=0";
 $res = $con->query($sql);
 $ban=1;
while($row=$res->fetch_array()){
    if($correo==$row['Correo']){
       $ban=0; 
    }
}
echo $ban;
?>