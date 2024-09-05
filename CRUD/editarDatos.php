<?php


    include_once('../Config/conDB.php');

    
    $id = $_POST['Id'];
    $Categoria = $_POST['Categorias'];
    $Marca = $_POST['Marcas'];
    $Precio = $_POST['Precio'];
    $Descripcion = $_POST['Descripcion']; 
    $Nombre = $_POST['Nombre'];

   
    $stmt = $conexion->prepare("UPDATE productos
                                 SET CategoriaId = ?, MarcaId = ?, Precio = ?, DescripcionProducto = ?, Nombre = ? 
                                 WHERE IdProducto = ?");
    $stmt->bind_param("iisssi", $Categoria, $Marca, $Precio, $Descripcion, $Nombre, $id);
    
    
    if ($stmt->execute()) {
       
        header("Location: ../index.php");
    } else {
      
        echo "Error al actualizar el producto: " . $stmt->error;
    }

   
    $stmt->close();

  
    $conexion->close();
?>
