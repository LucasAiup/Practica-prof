<?php
session_start();
require_once ("PracticaProf_DB.php");
require_once ("PracticaProf_Tabla.php");
require_once ("class_PractProf.php");
$username=$_POST["username"];
$password=$_POST["password"];
$bd= new base;
$login= alumno::login($username,$password);
if($login){//esto se usa para comprobar el login, si sale el true se mueve a form guardando el usuario y su carrera en una variable global
    $carrera = alumno::getCarrera($username);
    $_SESSION['Carrera'] = $carrera[0]->id_carrera;
    $_SESSION['username'] = $username;
    header("location:form.php");
}else{ //si sale false usa aspectos de mvc para tomar index html y mostrar un mensaje de error
    $diccionario=array(' hidden '=>'');
    $template=file_get_contents('index.html');
    foreach ($diccionario as $clave=>$valor){
        $template= str_replace('{'.$clave.'}',$valor,$template);
    }
    print($template);
}
?>