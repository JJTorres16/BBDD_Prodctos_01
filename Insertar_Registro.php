<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insertar_Registro</title>
  </head>
  <body>
    <?php
    require("datos_conexion.php");
    //$busqueda = $_GET("buscar");
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
      echo "No se pudo conectar a la base de datos.";
      exit();
    }else{
      echo "Conectado.<br>";
    }

    $consulta = "INSERT INTO datos (SECCION,NOMBREARTICULO,PRECIO,FECHA,IMPORTADO,PAISDEORIGEN) VALUES ('$section','$name','$price','$date','$import','$Origen')";
    $resultado = mysqli_query($conexion,$consulta);

    if($resultado==false){
      echo "Error en la consulta";
    }else{
      echo "Registro guardado.<br><br>";
    }

    ?>
<table border="1">
  <tr>
    <td>SECCIÓN </td>
    <td>NOMBRE DE ARTÍCULO</td>
    <td>PRECIO</td>
    <td>FECHA</td>
    <td>IMPORTADO</td>
    <td>PAIS DE ORIGEN</td>
  </tr>

  <?php
  $consulta_2 = "SELECT * FROM datos";
  $resultado_2 = mysqli_query($conexion,$consulta_2);
  while($row=mysqli_fetch_array($resultado_2)){
  ?>
  <tr>

  <td><?php echo $row['SECCION'];?></td>
  <td><?php echo $row['NOMBREARTICULO'];?></td>
  <td><?php echo $row['PRECIO'];?></td>
  <td><?php echo $row['FECHA'];?></td>
  <td><?php echo $row['IMPORTADO'];?></td>
  <td><?php echo $row['PAISDEORIGEN'];?></td>

  </tr>
  <?php  }   mysqli_close($conexion); ?>
</table>
  </body>
</html>
