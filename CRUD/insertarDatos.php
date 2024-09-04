
<?php
// Este archivo recibe los datos del formulario de agregar producto y los inserta en la base de datos.
// Utiliza sentencias preparadas para prevenir la inyección SQL.

include ("../Config/conDB.php");

$categorias = $_POST['CategoriaP']; 
$marca = $_POST['MarcaP'];  
$precio = $_POST['Precio']; 
$descripcion = $_POST['descripcion']; 
$nombre = $_POST['nombre'];

// Las sentencias preparadas son la forma más eficaz de evitar la inyección SQL.
// En lugar de insertar directamente las variables dentro de la consulta SQL, 
// puedes utilizar marcadores de posición y enlazar los valores más tarde.
$stmt = $conexion->prepare("INSERT INTO productos (CategoriaId, MarcaId, Precio, DescripcionProducto, Nombre) 
                            VALUES (?, ?, ?, ?, ?)");

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    die('Error en la preparación de la consulta: ' . htmlspecialchars($conexion->error));
}

// Enlazar los parámetros
$stmt->bind_param("iisss", $categorias, $marca, $precio, $descripcion, $nombre);

// Ejecutar la consulta y verificar el resultado
if ($stmt->execute()) {
    // Redirigir si se inserta correctamente
    header("Location: ../index.php");
} else {
    // Mostrar el error si algo salió mal
    echo "Ups... Algo salió mal: " . htmlspecialchars($stmt->error);
}

// Cerrar la sentencia y la conexión
$stmt->close();
$conexion->close();
?>

