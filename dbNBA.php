<?php
  // la clase
class dbNBA
{
  // Atributos necesarios para realizar la conexion
    private $host="localhost";
    private $user="root";
    private $pass="root";
    private $db_name="nba";

  // Conector
  private $conexion;

  // Control de errores
  private $error=false;
  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  // Funcion para saber si hay error
  function hayError(){
    return $this->error;
  }

  // Funcion insertar contra usuarios
  public function devolverUltimoEquipo($nombre){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM equipos WHERE Nombre=' ".$nombre." ' ");
      return $resultado;
    }else{
      return null;
    }
  }

  // Funcion insertar contra equipos
  public function insertarEquipo($nombre,$ciudad,$conferencia,$division){
    if($this->error==false)
    {
      $insert_sql="INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES (' ".$nombre." ', '".$ciudad."',' ".$conferencia."', ' ".$division." ')";
      if (!$this->conexion->query($insert_sql)) {
        echo "Error al insertar la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }

  // Actualizar contra equipos
  public function actualizarEquipo($nombre,$ciudad,$conferencia,$division){
    if($this->error==false)
    {
      $insert_sql="UPDATE equipos SET Nombre='".$nombre."', Ciudad='".$ciudad."', Conferencia='".$conferencia."', Division='".$division."'  WHERE Nombre=' ".$nombre." ' ";
      if (!$this->conexion->query($insert_sql)) {
        echo "Error al actualizar la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  // Borrar contra equipos
  public function borrarEquipo($nombre){
    if($this->error==false)
    {
      $insert_sql="DELETE FROM equipos WHERE Nombre=' ".$nombre." ' ";
      if (!$this->conexion->query($insert_sql)) {
        echo "Error al borrar el usuario: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
}
 ?>
