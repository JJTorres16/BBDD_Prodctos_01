<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizar los registros</title>
  </head>
  <body>
    <?php
      require("datos_conexion.php");

      $section = $_GET["seccion"];
      $nombre = $_GET["n_articulo"];
      $precio = $_GET["precio"];
      $fecha = $_GET["fecha"];
      $import = $_GET["importado"];
      $pais = $_GET["origen"];

        $conexion = mysqli_connect($DB_HOTS,$DB_USER,$DB_PASS);
        mysqli_select_db ($conexion,$DB_NAME) or die ("No se encontró la base de datos.");
        mysqli_set_charset($conexion,"urf8");

          if (mysqli_connect_errno()) {
            echo "Falló la conexión a la base de datos.";
          }else {
            echo "Conexión a la base de datos, exitosa.";
          }

            $consulta = "UPDATE datos SET SECCION='$section', NOMBREARTICULO='$nombre', PRECIO='$precio',
                        FECHA='$fecha', IMPORTADO='$import', PAISDEORIGEN='$pais' WHERE NOMBREARTICULO='$nombre'";

            $resultado = mysqli_query($conexion,$consulta);

              if (!($resultado)) {
                echo "Error en la Consulta.<br><br>";
              } else {
                echo "Registro actualizado correctamento.<br><hr>";
              }
    ?>

    <table border="1">
        <td>SECCION</td>
        <td>NOMBRE DE ARTÍCULO</td>
        <td>PRECIO</td>
        <td>FECHA</td>
        <td>IMPORTADO</td>
        <td>PAIS DE ORIGEN</td>

        <?php
          $consulta_2 = "SELECT * FROM datos";
          $resultado_2 = mysqli_query($conexion,$consulta_2);

            while ($row = mysqli_fetch_array($resultado_2,MYSQLI_ASSOC)) {
          ?>

          <tr>

          <td><?php echo $row['SECCION'];?></td>
          <td><?php echo $row['NOMBREARTICULO']; ?></td>
          <td><?php echo $row['PRECIO']; ?></td>
          <td><?php echo $row['FECHA']; ?></td>
          <td><?php echo $row['IMPORTADO']; ?></td>
          <td><?php echo $row['PAISDEORIGEN']; ?></td>

            </tr>

              <?php }
                mysqli_close($conexion);
              ?>
    </table>
  </body>
</html>
