<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilosabm.css">
    <title>Document</title>
</head>
<body>
<header>
         <nav class="nav_bar">
            <div class="img_header">
            <img height="80px" src="Images/logo_header.png"></div>

            <ul class="ListaMenu">
            <h2>Panel ABM Mercado de Aromas</h2>
            <li><a href="listarencards.php">VOLVER AL SITIO</a></li>
            </ul>
        </nav>
    
 </header>
<br>
<section class="main">
    <button type="submit"><a href="index.html">Inicio</a></button>
    <button type="submit"><a href="listar.php">Listar perfumes</a></button>
    <button type="submit"><a href="agregar.html">Agregar perfume</a></button>
     <p>Perfumes actualmente en stock.</p>
    <table border="1">
    <tr class="tablaproductos">
        <th class="id">ID</th>
        <th class="nombre">NOMBRE</th>
        <th class="tipo">TIPO</th>
        <th class="precio">PRECIO</th>
        <th class="imagen">IMAGEN</th>
        <th class="borrar">BORRAR</th>
    </tr>
    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "tienda_perfume");


    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta='SELECT * FROM perfumes';

    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);

    /*nueva forma con foreach
    while ($reg=mysqli_fetch_array($datos, MYSQLI_ASSOC)){
      foreach ($reg as $key => $value) {
        print ("<p>$key: $value</p>\n");
      };
    };*/

    // 4) Mostrar los datos del registro
     while ($reg=mysqli_fetch_array($datos)) { ?>
        <tr>
        <td><?php echo $reg['id']; ?></td>
        <td><?php echo $reg['nombre']; ?></td>
        <td><?php echo $reg['tipo']; ?></td>
        <td><?php echo $reg['precio']; ?></td>
        <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>

        <td><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></td>
        </tr>
    <?php } ?>
  </table>
  </section>
</body>
</html>
