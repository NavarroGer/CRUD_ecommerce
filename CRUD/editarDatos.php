<?php
// Este archivo recibe los datos del formulario de editar producto y 
// actualiza los registros correspondientes en la base de datos.
// Utiliza sentencias preparadas para prevenir la inyección SQL.

    include_once('../Config/conDB.php');

    // Recoger los datos del formulario
    $id = $_POST['Id'];
    $Categoria = $_POST['Categorias'];
    $Marca = $_POST['Marcas'];
    $Precio = $_POST['Precio'];
    $Descripcion = $_POST['Descripcion']; // Corregido el nombre de la variable
    $Nombre = $_POST['Nombre'];

    // Preparar la consulta usando sentencias preparadas
    $stmt = $conexion->prepare("UPDATE productos
                                 SET CategoriaId = ?, MarcaId = ?, Precio = ?, DescripcionProducto = ?, Nombre = ? 
                                 WHERE IdProducto = ?");
    $stmt->bind_param("iisssi", $Categoria, $Marca, $Precio, $Descripcion, $Nombre, $id);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir si la actualización fue exitosa
        header("Location: ../index.php");
    } else {
        // Mostrar el error si la consulta falla
        echo "Error al actualizar el producto: " . $stmt->error;
    }

    // Cerrar el statement
    $stmt->close();

    // Cerrar la conexión
    $conexion->close();
?>
