<?php
    session_start();
    require_once ("PracticaProf_DB.php");
    require_once ("PracticaProf_Tabla.php");
    require_once ("class_PractProf.php");
    $bd= new base;
    global $mat_i;
    $mat_i=0;
    if(isset($_POST['Volver'])) {//funcionalidad del boton para regresar al inicio
        header("location:index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Estilo.css" rel="stylesheet">
    <title>Form</title>
</head>
<body>
<nav class="container">
        <ul class="row" id="center_y">
            <div id="border">
                    <div id="banner">
                        <div class="col-xxl-15  d-flex justify-content-center">
                            <H1>Formulario de inscripcion</H1>
                        </div>
                        <div class="col-xxl-15  d-flex justify-content-center">
                            <p id="banner_text">Revise bien sus respuestas antes de enviar, este formulario solo se puede realizar una vez</p>
                        </div>
                    </div>
            <div id="border" class="col-xxl-15  d-flex justify-content-center">
                <form action="Alert.php" method="post">
                    <div class="d-inline-flex">
                        <div id="form">
                            <h2>Primer año</h2>
                            <?php
                            $mat_i=Nombrar_materias(1,$mat_i);
                            ?>
                        </div>
                        <div id="form">
                            <h2>Segundo año</h2>
                            <?php
                            $mat_i=Nombrar_materias(2,$mat_i);
                            ?>
                        </div>
                        <div id="form">
                            <h2>Tercer año</h2>
                            <?php
                            $mat_i=Nombrar_materias(3,$mat_i);
                            ?>
                        </div>
                    </div>
                    <div class="col-xxl-15  d-flex justify-content-center">
                        <div id="spaced">
                            <input type="submit" value="Enviar">
                        </div>
                </form>
                        <div id="spaced">
                            <form method="post">
                                <div id="spaced"><input type="submit" name="Volver" value="Volver"/>
                            </form>
                        </div>
                    </div>
            </div>
        </ul>
    </nav>
</body>
</html>
<?php
function Nombrar_materias($año,$mat_i){ //esta funcion se utiliza para imprimir los nombres de las materias con checkboxes al costado
    $Carrera_id = $_SESSION['Carrera'];
    $nombres= "$Carrera_id"::getnombres($año);
    foreach ($nombres as $array){
        $mat_i+=1;//este es un puntero que muestra el ultimo id que fue impreso
        ?>
        <input type="checkbox" name="materias[<?php echo $mat_i;?>]">
        <?php //gracias a la linea anterior de codigo al enviar el formulario se crea un array en el que se guardan las ids de las materias a las que se desean ser inscripto
        foreach ($array as $k=>$v){
            if ($k=="nombre"){
                Echo $v."<br>";
            }
        }
    }
    return $mat_i;//devulve el ultimo valor del puntero
}
?>
