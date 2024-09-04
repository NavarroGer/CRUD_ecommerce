<?php
// Este archivo contiene las credenciales para conectarse a la base de datos MySQL.
// Establece una conexión a la base de datos y la almacena en la variable $conexion.

$host="localhost";
$user="root";
$pass="";
$db="ecommerce";

$conexion= new mysqli($host,$user,$pass,$db);

if (!$conexion){
    echo'Conexion Fallida';
}