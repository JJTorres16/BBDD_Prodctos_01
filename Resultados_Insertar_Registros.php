<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require("datos_conexion.php");

      $section = $_GET["secc"];
      $name = $_GET["n_art"];
      $price = $_GET["pre"];
      $date = $_GET["fec"];
      $import = $_GET["imp"];
      $origen = $_GET["p_ori"];

      $conexion = mysqli_connect($DB_HOTS,$DB_USER,$DB_PASS);
      mysqli_select_db($conexion,$DB_NAME) or die("No se pudo conectar a la base de datos.");
      mysqli_set_charset($conexion,"utf8");

        if (mysqli_connect_errno()) {
          echo "Falló la conexión a la base datos.";
          exit ();
        }

          $consulta = "INSERT INTO datos(SECCION,NOMBREARTICULO,PRECIO,FECHA,IMPORTADO,PAISDEORIGEN) VALUES (?,?,?,?,?,?)";

              $resultado = mysqli_prepare($conexion,$consulta);
              $ok = mysqli_stmt_bind_param($resultado,"ssssss", $section, $name, $price, $date, $import, $origen);

                $Ejecutar_Consulta = mysqli_stmt_execute($resultado);

                    if (!($Ejecutar_Consulta)) {
                      echo "Error al ejecutar la consulta.";
                    } else {
                      $consulta_2 = "SELECT * FROM datos";
                        $resultado_2 = mysqli_prepare($conexion,$consulta_2);
                          $Ejecutar_Consulta_2 = mysqli_stmt_execute($resultado_2);
                      ?>
                      <table border="1">
                        <tr>
                          <td>SECCION</td>
                          <td>NOMBRE DE ARTÍCULO</td>
                          <td>PRECIO</td>
                          <td>FECHA</td>
                          <td>IMPORTADO</td>
                          <td>PAIS DE ORIGEN</td>
                        </tr>
                        <?php
                            $Asociar = mysqli_stmt_bind_result($resultado_2,$seccion,$nombre,$precio,$fecha,$importado,$paisdeorigen);
                              echo "Artículos: <br><br>";
                                while (mysqli_stmt_fetch($resultado_2)) {
                                  ?>

                                  <tr>
                                    <td><?php echo $seccion; ?></td>
                                    <td><?php echo $nombre; ?></td>
                                    <td><?php echo $precio; ?></td>
                                    <td><?php echo $fecha; ?></td>
                                    <td><?php echo $importado; ?></td>
                                    <td><?php echo $paisdeorigen; ?></td>
                                  </tr>
                            <?php }

                    }  mysqli_stmt_close($resultado);?>
    </table>
  </body>
</html>
