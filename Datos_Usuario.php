<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Datos del Usuario</title>
  </head>
  <body>
    <?php

      require("datos_conexion.php");

          $conexion = mysqli_connect($DB_HOTS,$DB_USER,$DB_PASS);
            mysqli_select_db($conexion,"usuarios") or die ("No se encontró la base de datos solicitada.");
            mysqli_set_charset($conexion,"utf8");

            $user = mysqli_real_escape_string($conexion,$_GET["usuario"]); //Movelos los parámetros después de la conexión a la DB.
            $pass = mysqli_real_escape_string($conexion,$_GET["pass"]);

              if (mysqli_connect_errno()) {
                echo "Hubo un error al conectarse a la base de datos.";
                  exit();
              } else {
                echo "Conexión exitosa a la base de datos.<br><hr>";
              }

                $consulta = "SELECT * FROM datosusuarios WHERE NOMBRE = '$user' AND CONTRA = '$pass'";
                $resultado = mysqli_query($conexion,$consulta);

                  if (mysqli_num_rows($resultado)> 0) {
                    echo "Datos de Usuario : <br><br>";
                  } else {
                    echo "No se han encontrado usuarios.<br><br>";
                  }
                ?>

                <table border = "1">
                  <tr>
                    <td>NOMBRE</td>
                    <td>CONTRASEÑA</td>
                    <td>TELEFONO</td>
                    <td>DIRECCION</td>
                  </tr>

                  <?php
                    while ($row = mysqli_fetch_array($resultado)) {
                      ?>
                        <tr>
                          <td><?php echo $row['NOMBRE']; ?></td>
                          <td><?php echo $row['CONTRA']; ?></td>
                          <td><?php echo $row['TELEFONO']; ?></td>
                          <td><?php echo $row['DIRECCION']; ?></td>
                        </tr>
                  <?php  } mysqli_close($conexion); ?>

                </table>
  </body>
</html>
