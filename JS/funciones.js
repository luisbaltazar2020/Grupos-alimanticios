function validacion(){
    var nombre=document.forma01.usuario.value;
    var pass=document.forma01.pass.value;
    if(nombre&&pass!=''){
        alert("campos llenos");
    }
    else{
        alert("faltan campos por llenar");
    }
}