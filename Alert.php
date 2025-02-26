<?php
session_start();
require_once("PracticaProf_DB.php");
require_once("PracticaProf_Tabla.php");
require_once("class_PractProf.php");
$bd = new base;
$materias_seleccionadas = $_POST['materias'];
$Carrera_id = $_SESSION['Carrera'];
if(isset($_POST['Volver'])) {//funcionalidad del boton para regresar a la pestaña anterior
    volver();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Estilo.css" rel="stylesheet">
</head>
<body>
<nav class="container">
        <ul class="row" id="center_y">
            <div id="border">
                <div id="banner">
                    <div class="col-xxl-15  d-flex justify-content-center">
                        <H1>Alerta</H1>
                    </div>
                </div>
                <div id="form" >
                    <div class="col-xxl-15  d-flex flex-column">
                        <div class="col-xxl-15  d-flex justify-content-center">
                            <?php
                            foreach ($materias_seleccionadas as $materia_id => $v) {//esto toma el array de materias seleccionadas y lo pasa por distintas comprobaciones
                                if (!verificar_correlatividades($materia_id)) {//las comprovaciones son encontradas en verificar_correlatividades()
                                    $Error_flag = TRUE;//si las comprobaciones dan negativas imprime un mensaje de error en el cual muestra el nombre de la materia a la que no se le puede inscribir
                                    $nombres= $Carrera_id::getnombresbyid($materia_id);
                                    foreach ($nombres as $array){
                                        foreach ($array as $k=>$v){
                                            if ($k=="nombre"){
                                                echo "No puedes reinscribirte en la materia: ".$v.". No has aprobado las correlatividades necesarias o la materia ya esta aprobada. <br>";
                                            }
                                        }
                                    }
                                }else{//si no se encuentra ningun problema guarda la materia deseada en un array
                                    $Error_check = TRUE;
                                    $Inscripciones[] = $materia_id;
                                }
                            }
                            if (isset($Error_check)){//esta funcion consulta si se dio el caso de que alguna materia estuviera correcta
                                $_SESSION["inscripciones"]=$Inscripciones;//guarda las inscripciones a materias deseadas las cuales no tuvieron errores
                                if(empty($Error_flag)){//consulta si se dieron errores e imprime un mensaje correspondiente al caso
                                    Echo "Aprete en continuar para confirmar la seleccion. <br>";
                                }else{
                                    echo "<br> Si desea inscribirse al resto de las materias que selecciono aprete continuar. <br>";
                                }
                            }
                        ?>
                        </div>
                        <div class="col-xxl-15  d-flex justify-content-center">
                            <div id="spaced">
                                <form method="post">
                                    <input type="submit" name="Volver" value="Volver"/>
                                </form> 
                            </div>
                            <div id="spaced">
                                <form action="confirm.php">
                                    <?php if(isset($Error_check)){ //este boton desaparece en caso de que ninguna materia sea apta para la inscripcion?>
                                        <input type="submit" name="Continuar" value="Continuar"/>
                                    <?php } ?>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </nav>
</body>
</html>
<?php
function verificar_correlatividades($id_materia) {
    $Carrera_id = $_SESSION['Carrera'];  // Carrera del estudiante, guardada en la sesión
    $username = $_SESSION['username'];  // id del estudiante, guardada en la sesión
    global $bd;
    $nota = notas::obtener_nota($id_materia, $username);
    if ($nota < 6){//primera comprobacion, si la materia esta ya aprobada
        $materia_data = "$Carrera_id"::buscar_por_id('id_materia='.$id_materia);
        $correlatividades = get_object_vars($materia_data);
        $correlatividades = array_slice($correlatividades,2,3);//las tres anteriores lineas crean un array de las posibles correlatividades de la materia
        foreach ($correlatividades as $id_correlativa) {
            if ($id_correlativa != 0) {//segunda comprobacion si la materia tiene correlatividades
                $nota = notas::obtener_nota($id_correlativa, $username);
                if ($nota < 6) {//tercera comprobacion si la materia tiene las correlatividades aprovadas
                    return false; 
                }
            }
        }
    }else{
        return false;
    }
    return true;
}

function volver(){
    echo "<script>window.location.href = 'form.php';</script>";
}
?>