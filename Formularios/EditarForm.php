<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
  </head>

  <body>
  <h1 class="text-center" style="background-color:#2C3E50; color: white ">EDITAR PRODUCTOS</h1>
<br>
  <form class="container" action="../CRUD/editarDatos.php" method="POST">
  <?php
    include_once('../Config/conDB.php');

    $sql= "SELECT * FROM productos WHERE IdProducto =".$_REQUEST['Id'];
    $resultado = $conexion -> query($sql);

    $row=$resultado -> fetch_assoc();
  ?>

<input type="Hidden" class="form-control" name="Id" value="<?php echo $row ['IdProducto']?>">

<!--Traer datos de categorias-->
<label for="">Categorias</label>

    <select class="form-select mb-3" aria-label="Default select example" name="Categorias">
        <option selected disabled>--Seleccinar--</option>
        
        <?php
            include("../Config/conDB.php");

            $sql1 = "SELECT * FROM categorias WHERE Id=" .$row['CategoriaId'];
            $resultado1 = $conexion -> query($sql1);

            $row1 = $resultado1 ->fetch_assoc();

            echo "<option selected value='".$row1['Id']."'>
            ".$row1['NombreCategoria']."</option>";

            $sql2 ="SELECT * FROM categorias";
            $resultado2 = $conexion -> query($sql2);

            while ($fila = $resultado2-> fetch_array()){
                echo "<option value='".$fila['Id']."'>
                ".$fila['NombreCategoria']."</option>";
            }
        ?>

    </select>

    <!--Traer datos de marcas-->
<label for="">Marcas</label>

    <select class="form-select mb-3" aria-label="Default select example" name="Marcas">
        <option selected disabled>--Seleccinar--</option>
        
        <?php
            include("../Config/conDB.php");

            $sql3 = "SELECT * FROM marcas WHERE Id=" .$row['MarcaId'];
            $resultado3 = $conexion -> query($sql3);

            $row3 = $resultado3 ->fetch_assoc();

            echo "<option selected value='".$row3['Id']."'>
            ".$row3['NombreMarca']."</option>";

            $sql4 ="SELECT * FROM marcas";
            $resultado4 = $conexion -> query($sql4);

            while ($fila = $resultado4-> fetch_array()){
                echo "<option value='".$fila['Id']."'>
                ".$fila['NombreMarca']."</option>";
            }
        ?>
    </select>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="text" class="form-control" name="Precio" value="<?php echo $row ['Precio']?>">  
    </div>

    <div class="mb-3">
        <label class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="Descripcion"  value="<?php echo $row ['DescripcionProducto']?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="Nombre" value="<?php echo $row ['Nombre']?>">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-danger">Agregar</button>
        <a href="../index.php" class="btn btn-dark">Volver</a>
    </div>
    
</form>



  </body>