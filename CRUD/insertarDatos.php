<?php
    include ("../Config/conDB.php");

    $categorias = $_POST['CategoriaP']; 
    $marca = $_POST['MarcaP'];  
    $precio = $_POST['Precio']; 
    $descripcion = $_POST['descripcion']; 
    $nombre = $_POST['nombre'];  

    //Las sentencias preparadas son la forma más eficaz de evitar la inyección SQL.
    // En lugar de insertar directamente las variables dentro de la consulta SQL, 
    //puedes utilizar marcadores de posición y enlazar los valores más tarde.
    $stmt = $conexion->prepare("INSERT INTO productos (CategoriaId, MarcaId, Precio, DescripcionProducto, Nombre) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $categorias, $marca, $precio, $descripcion, $nombre);
    $stmt->execute();
    $stmt->close();
    

    if ($resultado === true) {
        header("Location: ../index.php");
    } else {
        echo "Ups... Algo salió mal: " . mysqli_error($conexion);  // para mostrar el error
    }
?>
