<?php
class alumno extends tabla
{
    public $id;
    public $id_carrera;
    public $password;
    protected static $nombre_tabla = "alumnos";

    public static function instanciar($registro){
        $alumno = new alumno();
        foreach($registro as $propiedad => $valor){
            if ($alumno->propiedad_existe($propiedad))
            {
                $alumno->$propiedad = $valor;
            }
        }
        return $alumno;
    }
    public static function Login($id,$password){
        $exists = alumno::buscar_por_id('id='."$id".' AND password='.'"'."$password".'";');
        if (empty($exists)){
            return False;
        }else{
            return True;
        }
    }
    public static function getCarrera($id){
        $id_carrera = static::buscar_por_sql("SELECT id_carrera FROM ". static::$nombre_tabla . " WHERE id='$id'");
        return $id_carrera;
    }
}

class Carreras extends tabla
{
    public $id_materia;
    public $nombre;
    public $correlatividad_1;
    public $correlatividad_2;
    public $correlatividad_3;

    public static function instanciar($registro){
        $Carreras = new Carreras();
        foreach($registro as $propiedad => $valor){
            if ($Carreras->propiedad_existe($propiedad))
            {
                $Carreras->$propiedad = $valor;
            }
        }
        return $Carreras;
    }
    public static function getnombres($año){
        $id_carrera = static::buscar_por_sql("SELECT nombre FROM ". static::$nombre_tabla. " Where Año='$año'");
        return $id_carrera;
    }
    public static function getnombresbyid($id){
        $id_carrera = static::buscar_por_sql("SELECT nombre FROM ". static::$nombre_tabla. " Where id_materia='$id'");
        return $id_carrera;
    }
    public static function getcorrelatividades(){
        $correlatividades = array($this->$correlatividad_1,$this->$correlatividad_2,$this->$correlatividad_3);
        return $correlatividades;
    }
}
class DS extends Carreras{
    protected static $nombre_tabla = "materias_ds";
}
class AF extends Carreras{
    protected static $nombre_tabla = "materias_af";
}
class ITI extends Carreras{
    protected static $nombre_tabla = "materias_iti";
}
class notas extends tabla
{
    public $id_materia;
    public $nota;
    public $id_alumno;
    protected static $nombre_tabla = "notas";

    public static function instanciar($registro){
        $notas = new notas();
        foreach($registro as $propiedad => $valor){
            if ($notas->propiedad_existe($propiedad))
            {
                $notas->$propiedad = $valor;
            }
        }
        return $notas;
    }
    public static function obtener_nota($id_materia, $id_alumno) {
        $resultado = static::buscar_por_sql("SELECT nota FROM ". static::$nombre_tabla ." WHERE id_alumno =".$id_alumno." AND id_materias =".$id_materia.";");
        if(isset($resultado[0])){
            $nota = get_object_vars($resultado[0]);
        }   
        return $nota['nota'] ?? 0; 
    }
}
class inscriptions extends tabla
{
    public $id_alumno;
    public $id_materia;
    public $nombre_materia;
    protected static $nombre_tabla = "inscriptions";
    protected static $campos_tabla = array("id_alumno","id_materia","nombre_materia");

    public static function instanciar($registro){
        $inscriptions = new inscriptions();
        foreach($registro as $propiedad => $valor){
            if ($inscriptions->propiedad_existe($propiedad))
            {
                $inscriptions->$propiedad = $valor;
            }
        }
        return $inscriptions;
    }
    Public static function existe($id_alumno,$id_materia){
        global $bd;
        $sql = "SELECT * FROM ". static::$nombre_tabla." WHERE id_alumno=$id_alumno AND id_materia=$id_materia";
        $bd->enviar_consulta($sql);
        $matriz=$bd->affected_rows();
        if(empty($matriz)){
            return false;
        }else{
            return true;
        }
    }
}

