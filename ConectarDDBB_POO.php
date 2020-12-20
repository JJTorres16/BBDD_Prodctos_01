<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Conexión a DDBB por POO</title>
  </head>
  <body>
      <?php
        $conexion = new mysqli("localhost","julian","JJTV97","producto");

          if($conexion -> connect_errno){
            echo "Falló la conexión a la base de datos.". $conexion -> connect_errno;
          }

            $conexion -> set_charset("utf8"); // La codificación de caracteres.
              $query = "SELECT * FROM datos"; // La sentencia SQL.

                $resultado = $conexion -> query($query);
                  if ($conexion -> connect_errno) {
                    die($conexion->error);
                  }
                    ?>

                    <table border = "1">
                      <tr>
                        <td>SECCIÓN</td>
                        <td>NOMBRE DE ARTÍCULO</td>
                        <td>PRECIO</td>
                        <td>FECHA</td>
                        <td>IMPORTACIÓN</td>
                        <td>PAIS DE ORIGEN</td>
                      </tr>

                    <?php

                      while ($row = $resultado->fetch_assoc()) {
                        ?>
                        <tr>
                          <td><?php echo $row["SECCION"]; ?></td>
                          <td><?php echo $row["NOMBREARTICULO"]; ?></td>
                          <td><?php echo $row["PRECIO"]; ?></td>
                          <td><?php echo $row["FECHA"]; ?></td>
                          <td><?php echo $row["IMPORTADO"]; ?></td>
                          <td><?php echo $row["PAISDEORIGEN"]; ?></td>
                        </tr>

                      <?php }
                        $conexion -> close();
                      ?>
      </table>
  </body>
</html>
