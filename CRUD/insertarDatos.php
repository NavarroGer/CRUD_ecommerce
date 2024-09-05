
<?php

include ("../Config/conDB.php");

$categorias = $_POST['CategoriaP']; 
$marca = $_POST['MarcaP'];  
$precio = $_POST['Precio']; 
$descripcion = $_POST['descripcion']; 
$nombre = $_POST['nombre'];


$stmt = $conexion->prepare("INSERT INTO productos (CategoriaId, MarcaId, Precio, DescripcionProducto, Nombre) 
                            VALUES (?, ?, ?, ?, ?)");


if ($stmt === false) {
    die('Error en la preparación de la consulta: ' . htmlspecialchars($conexion->error));
}


$stmt->bind_param("iisss", $categorias, $marca, $precio, $descripcion, $nombre);


if ($stmt->execute()) {
   
    header("Location: ../index.php");
} else {
    
    echo "Ups... Algo salió mal: " . htmlspecialchars($stmt->error);
}


$stmt->close();
$conexion->close();
?>

