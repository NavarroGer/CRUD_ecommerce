<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD VENTAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<br>
  <div class="container">
    <h1 class="text-center" style="background-color:#2C3E50; color: white ">LISTA DE PRODUCTOS</h1>
    </div>
<br>
  <div class="container">

  <table class="table">
  <thead>
    <tr>
      <th scope="col">N° Prod</th>
      <th scope="col">Categoria</th>
      <th scope="col">Marca</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
   <?php
   // Incluye el archivo de configuración de la base de datos para establecer la conexión.
        require("Config/conDB.php");

        $sql = $conexion ->  query("SELECT * FROM productos
            INNER JOIN categorias ON productos.CategoriaId = categorias.Id
            INNER JOIN marcas ON productos.MarcaId = marcas.Id
            ");

            while($resultado=$sql -> fetch_assoc()){
    ?>
    
        <tr>
            <th scope="row"><?php echo $resultado['IdProducto']?></th>
            <th scope="row"><?php echo $resultado['NombreCategoria']?></th>
            <th scope="row"><?php echo $resultado['NombreMarca']?></th>
            <th scope="row"><?php echo $resultado['Precio']?></th>
            <th scope="row"><?php echo $resultado['DescripcionProducto']?></th>
            <th scope="row"><?php echo $resultado['Nombre']?></th>
            <th>
                <a href="Formularios/EditarForm.php?Id= <?php echo $resultado['IdProducto']?>" 
                class= "btn btn-warning">Editar</a>

                <a href="CRUD/EliminarDatos.php?Id=<?php echo $resultado['IdProducto']?>" 
                class="btn btn-danger" onclick="return confirmDelete();">Eliminar</a>

              <script>
                function confirmDelete() {
                return confirm("¿Estás seguro de que quieres eliminar este producto?");
                }
               </script>

            </th>
            
        </tr>
   
   
   <?php

            }
   ?>  
  </tbody>
</table>
<div class="container">
<a href="Formularios/AgregarForm.php" class= "btn btn-success">Agregar Producto</a>

</div>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>