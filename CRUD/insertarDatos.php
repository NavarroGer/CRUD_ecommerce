<?php
    include ("../Config/conDB.php");

    $categorias = $_POST['CategoriaP']; 
    $marca = $_POST['MarcaP'];  
    $precio = $_POST['Precio']; 
    $descripcion = $_POST['descripcion']; 
    $nombre = $_POST['nombre'];  

    $sql = "INSERT INTO productos (CategoriaId, MarcaId, Precio, DescripcionProducto, Nombre) VALUES 
    ('$categorias', '$marca', '$precio', '$descripcion', '$nombre')";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado === true) {
        header("Location: ../index.php");
    } else {
        echo "Ups... Algo salió mal: " . mysqli_error($conexion);  // para mostrar el error
    }
?>
