<?php

    include_once('../Config/conDB.php');

    $id = $_POST['Id'];
    $Categoria = $_POST['Categorias'];
    $Marca = $_POST['Marcas'];
    $Precio = $_POST['Precio'];
    $Descriocion = $_POST['Descripcion'];
    $Nombre = $_POST['Nombre'];

    $sql = "UPDATE productos SET
    
            CategoriaId = '".$Categoria."',
            MarcaId = '".$Marca."',
            Precio = '".$Precio."',
            DescripcionProducto = '".$Descriocion."',
            Nombre = '".$Nombre."' WHERE IdProducto = '".$id."'";

    if ($resultado = $conexion ->query($sql)) {
        header("location:../index.php");
    }