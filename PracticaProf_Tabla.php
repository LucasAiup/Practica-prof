<?php
class tabla{
    protected static $nombre_tabla;
    protected static $campos_tabla;

    public static function buscar_por_id($id){
        Global $bd;
        $matriz= static::buscar_por_sql("SELECT * FROM ".
        static::$nombre_tabla . " WHERE $id");
        return (!empty($matriz)) ? array_shift($matriz) : false;
    }
    public static function buscar_por_sql($sql)
    {
        global $bd;
        $resultado = $bd->enviar_consulta($sql);
        $matriz = array();
        while($registro = $bd->fetch_array($resultado))
        {
            array_push($matriz, static::instanciar($registro));
        }
        return $matriz;
    }
    public static function borrar_por_id($id){
        Global $bd;
        $matriz= $bd->enviar_consulta("DELETE FROM ".
            static::$nombre_tabla . " WHERE $id");
    }
    public function guardar(){
        if(!isset($this->id)){
            $this->crear();
        }else{
            $this->actualizar();
        }
    }
    public function crear(){
        global $bd;
        $propiedades= $this->propiedades();
        $sql = "INSERT INTO ". static::$nombre_tabla. "(";
        $sql .= implode(",",array_keys($propiedades));
        $sql .= ") VALUES ('";
        $sql .= implode("','",array_values($propiedades))."')";
        if($bd->enviar_consulta($sql))
        {
            $bd->id = $bd->insert_id();
            return true;
        }else{
            return false;
        }
    }
    public function actualizar(){
        global $bd;
        $propiedades = $this->propiedades();
        $prop_format = array();
        foreach($propiedades as $propiedad => $valor)
        {
            array_push($prop_format, "{$propiedad}=' {$valor}'");
        }
        $sql = "UPDATE ". static::$nombre_tabla." SET ";
        $sql .= implode(",",$prop_format);
        $sql .= " WHERE id=".$this->id;
        $bd->enviar_consulta($sql);
        if($bd->affected_rows()==1)
        {
            return true;
        }else{
            return false;
        }
    }
    public function propiedad_existe($propiedad){
        $propiedades = get_object_vars($this);
        return array_key_exists($propiedad, $propiedades);
    }
    public function propiedades(){
        $campos_props= array();
        foreach(static::$campos_tabla as $campo){
            $campos_props[$campo] = $this->$campo;
        }
        return $campos_props;
    }
}
?>