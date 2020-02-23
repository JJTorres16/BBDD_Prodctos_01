<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Elimnar registros</title>
  </head>
  <body>

      <?php
        require("datos_conexion.php");

        $section=$_GET["seccion"];
        $name=$_GET["nombre"];
        $price=$_GET["precio"];
        $date=$_GET["Fecha"];
        $import=$_GET["Importacion"];
        $Origen=$_GET["pais_origen"];

        $conexion = mysqli_connect($DB_HOTS,$DB_USER,$DB_PASS);
            mysqli_select_db($conexion,$DB_NAME) or die ("No se pudo conectar a la base de datos.");
            mysqli_set_charset($conexion,"utf8");

        if (mysqli_connect_errno()) {
          echo "Error de conexión a la base de datos.";
          exit();
        }else{
          echo "Conexión exitosa.<br>";
        }

        $consulta = "DELETE FROM datos WHERE SECCION = '$section'";
        $resultado = mysqli_query($conexion,$consulta);

        if ($resultado==false) {
          echo "Error en la consulta <br>.";
        } else {
          //echo "Registro eliminado.<br><br>";
          //echo "Se han afectado ". mysqli_affected_rows($conexion). " lineas";
              if ((mysqli_affected_rows($conexion))==0) {
                  echo "<br>No se hallaron registros para modificar, o eliminar<br>.";
                  }
                    elseif ((mysqli_affected_rows($conexion))==1) {
                        echo "Se ha elimnado ". mysqli_affected_rows($conexion). " registro.";
                      }else {
                        echo "Se han eliminado ". mysqli_affected_rows($conexion). " registros.";
                        }
        }

        mysqli_close($conexion);
      ?>

  </body>
</html>
