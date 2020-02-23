<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizar la búsqueda</title>
  </head>
  <body>
    <?php

      require("datos_conexion.php");

      $busqueda = $_GET["buscar_actualizar"]; // Hacemos referencia al botón submit dell Formulario.

      $conexion = mysqli_connect($DB_HOTS,$DB_USER,$DB_PASS);
      mysqli_select_db($conexion, $DB_NAME) or die ("No se encontró la base de datos.");
      mysqli_set_charset($conexion,"urf8");

      if(mysqli_connect_errno()){
        echo "Falló la conexión a la base de datos.";
          exit();
      }else {
        echo "Conexión a la base de datos, exitosa.<hr>";
      }

      $consulta = "SELECT * FROM datos WHERE NOMBREARTICULO LIKE '%$busqueda%'";
      $resultado = mysqli_query($conexion,$consulta);

         while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
           echo "<form action = 'Actualizar.php' method = 'get'> ";
             echo "<input type = 'text' name = 'seccion' value = '".$row['SECCION']."'><br>";
             echo "<input type = 'text' name = 'n_articulo' value = '". $row['NOMBREARTICULO']."'><br>";
             echo "<input type = 'text' name = 'precio' value = '". $row['PRECIO']."'><br>";
             echo "<input type = 'date' name = 'fecha' value = '". $row['FECHA']."'><br>";
             echo "<input type = 'text' name = 'importado' value = '".$row['IMPORTADO']."'><br>";
             echo "<input type = 'text' name = 'origen' value = '".$row['PAISDEORIGEN']."'><br><br>";

                echo "<input type = 'submit'  name = 'enviado' value = 'Actualizar!'>";
           echo "</form><br>";
         }
    ?>
  </body>
</html>
