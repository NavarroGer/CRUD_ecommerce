<?php

    include_once('../Config/conDB.php');

    $id = $_POST['Id'];
    $Categoria = $_POST['Categorias'];
    $Marca = $_POST['Marcas'];
    $Precio = $_POST['Precio'];
    $Descriocion = $_POST['Descripcion'];
    $Nombre = $_POST['Nombre'];

     //Las sentencias preparadas son la forma más eficaz de evitar la inyección SQL.
    // En lugar de insertar directamente las variables dentro de la consulta SQL, 
    //puedes utilizar marcadores de posición y enlazar los valores más tarde.
    $stmt
     = $conexion->prepare("UPDATE productos
                                 SET CategoriaId = ?, MarcaId = ?, Precio = ?, DescripcionProducto = ?, Nombre = ? 
                                 WHERE IdProducto = ?");
    $stmt->bind_param("iisssi", $Categoria, $Marca, $Precio, $Descripcion, $Nombre, $id);
    $stmt->execute();
    $stmt->close();
    

    if ($resultado = $conexion ->query($sql)) {
        header("location:../index.php");
    }