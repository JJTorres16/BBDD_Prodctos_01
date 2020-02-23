<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Productos por país</title>
  </head>
  <body>
      <?php
        require("datos_conexion.php");

        $res = $_GET["pais"];

          $conexion = mysqli_connect($DB_HOTS,$DB_USER,$DB_PASS);

            if (mysqli_connect_errno()) {
              echo "Falló la conexión a la base de datos";
              exit ();
            }

              mysqli_select_db($conexion,$DB_NAME) or die ("No se pudo conectar a la base de datos.");
              mysqli_set_charset($conexion,"utf8");

                $consulta = "SELECT * FROM datos WHERE PAISDEORIGEN = ?"; // Paso número 1.

                  $resultado = mysqli_prepare($conexion,$consulta);
                  $ok = mysqli_stmt_bind_param($resultado,"s", $res);

                    $Ejecutar_Consulta = mysqli_stmt_execute($resultado);

                      if (!($Ejecutar_Consulta)) {
                        echo "Error al ejecutar la consulta.";
                      } else {
                        ?>
                        <table border="1">
                          <tr>
                            <td>SECCIÓN</td>
                            <td>NOMBRE DE ARTÍCULO</td>
                            <td>PRECIO</td>
                            <td>FECHA</td>
                            <td>IMPORTADO</td>
                            <td>PAIS DE ORIGEN</td>
                          </tr>
                        <?php
                        //Paso número 5.
                          $Asociar = mysqli_stmt_bind_result($resultado,$seccion,$nombre,$precio,$fecha,$importado,$paisdeorigen);
                            echo "Atrículos econtrados: <br><br>";
                              while (mysqli_stmt_fetch($resultado)) {
                                //echo $seccion. " ". $nombre. " ". $precio. " ". $fecha. " ". $importado. " ". $paisdeorigen. " ";
                                  ?>
                                    <tr>
                                      <td><?php echo $seccion; ?></td>
                                      <td><?php echo $nombre; ?></td>
                                      <td><?php echo $precio; ?></td>
                                      <td><?php echo $fecha; ?></td>
                                      <td><?php echo $importado; ?></td>
                                      <td><?php echo $paisdeorigen; ?></td>
                                    </tr>
                              <?php  }
                      }
                      mysqli_stmt_close($resultado); //También necesita el objeto mysqli_stmt?>
                          </table>
  </body>
</html>
