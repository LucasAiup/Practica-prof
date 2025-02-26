<?php
session_start();
require_once("PracticaProf_DB.php");
require_once("PracticaProf_Tabla.php");
require_once("class_PractProf.php");
$bd = new base;
if(isset($_POST['Volver'])) {
    header("location:index.html");
}
$carrera = $_SESSION['Carrera']; // Carrera del estudiante, guardada en la sesión
$username = $_SESSION['username']; // id del estudiante, guardada en la sesión
$inscripciones = $_SESSION["inscripciones"]; // lista de materias deseadas aprobadas por el sistema, guardada en la sesión
foreach ($inscripciones as $valor){//crea objetos para en las siguientes lineas guardar en propiedades los datos anteriores y ejecutar un insert desde el ABM
    $formulario = new inscriptions;
    $formulario->id_alumno = $username;
    $formulario->id_materia = $valor;
    $nombres= $carrera::getnombresbyid($valor);
    foreach ($nombres as $array){
        foreach ($array as $k=>$v){
            if ($k=="nombre"){
                $formulario->nombre_materia = $v;
            }
        }
    }
    if($formulario->existe($username,$valor)){//checkea si la entrada existe antes de crearla, en caso de que esta exista no hace nada
    }else{
        $formulario->crear();
    }
    
}
$imprimir = inscriptions::buscar_por_sql("SELECT * FROM inscriptions WHERE id_alumno=".$username);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Estilo.css" rel="stylesheet">
</head>
<body>
<nav class="container">
        <ul class="row" id="center_y">
            <div id="border">
                <div id="banner">
                    <div class="col-xxl-15  d-flex justify-content-center">
                        <H1>Se inscribio en:</H1>
                    </div>
                    <div class="col-xxl-15  d-flex justify-content-center">
                        <p id="banner_text">(esta slide es de prueba para poder mostrar que las inscripciones funcionas)</p>
                    </div>
                </div>
                    <div id="spaced" class="col-xxl-15  d-flex justify-content-center">
                        <div class="d-flex flex-column">
                                <?php
                                    foreach ($imprimir as $array){//imprime todo el contenido de la tabla inscriptions para mostrar que el alumno fue inscrito con exito
                                        foreach($array as $v){
                                            echo $v." ";
                                        }
                                        echo "<br>";
                                    }
                                ?>
                            <div id="spaced" class="col-xxl-15  d-flex justify-content-center">
                                <form method="post">
                                    <div id="spaced"><input type="submit" name="Volver" value="Volver"/>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </ul>
    </nav>
</body>
</html>