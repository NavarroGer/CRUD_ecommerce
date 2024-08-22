<?php
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