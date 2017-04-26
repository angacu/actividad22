<html>
  <head>
    <meta charset="utf-8">
    <title>Pagina de borrado</title>
  </head>
  <body>
  <?php
  //Incluimos clase de conexion
  include "dbNBA.php";
  $user=new dbNBA();

  //insertar un usuario
  $resultadoBorrar=$user->borrarEquipo($_GET["Nombre"]);

  //Devolver el usuario insertado
  if($resultadoBorrar==true){
    echo "Registro ".$_GET["Nombre"]." borrado";
  }else{
    echo "Error al borrar el usuario";
  }
  ?>
  </body>
</html>
