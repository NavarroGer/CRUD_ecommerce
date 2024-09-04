<?php
// Este archivo elimina un producto de la base de datos según el ID proporcionado.
// Utiliza una consulta SQL DELETE para eliminar el registro.

    include("../Config/conDB.php");


    $Id = $_GET['Id'];
    $sql = "DELETE FROM productos WHERE IdProducto = '$Id' ";

    $query = mysqli_query($conexion, $sql);

    if ($query === TRUE) {
        header("Location:../index.php");
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }
    
    $conexion->close();

?>