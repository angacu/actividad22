<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar</title>
  </head>
  <body>
  <?php
  // Clase conexion
  include "dbNBA.php";
  $user=new dbNBA();

  // Insertar user
  $resultadoActualizar=$user->actualizarEquipo($_POST["Nombre"],$_POST["Ciudad"],$_POST["Conferencia"],$_POST["Division"]);

  // Devolver user actualizado
  if($resultadoActualizar==true){
    $resultado=$user->devolverUltimoEquipo($_POST["Nombre"]);
    $fila=$resultado->fetch_assoc();
      echo "Nombre: ".$fila["Nombre"]."</br>";
      echo "Ciudad: ".$fila["Ciudad"]."</br>";
      echo "Conferencia: ".$fila["Conferencia"]."</br>";
      echo "Division: ".$fila["Division"]."</br>";
      echo "<a href='actualizar.php?Nombre=".$fila["Nombre"]."&Ciudad=".$fila["Ciudad"]."&Conferencia=".$fila["Conferencia"]."&Division=".$fila["Division"]."'>Actualizar Registro</a>";
  }else{
      echo "Error en la insercion";
  }
  ?>
  </body>
</html>
