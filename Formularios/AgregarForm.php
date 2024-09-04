
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agragar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <h1 class="bg-black p-2 text-white text-center">Agragar Producto</h1>
    <br>
    <div class="container">
        <form action="../CRUD/insertarDatos.php" method="POST">
            <label for="">Categorias</label>
            <select class="form-select mb-3" name="CategoriaP">
                <option selected>--Seleccionar--</option>
                
                <?php
                    include("../Config/conDB.php"); 

                    $sql = $conexion -> query ("SELECT * FROM categorias");
                while ($resultado = $sql -> fetch_assoc()) {
                   echo "<option value='".$resultado['Id']."'>".$resultado
                   ['NombreCategoria']."</option>";
                }    
                ?>
              
            </select>

            <label for="">Marcas</label>
            <select class="form-select mb-3" name="MarcaP">
                <option selected>--Seleccionar--</option>
                
                <?php
                    include("../Config/conDB.php"); 

                    $sql = $conexion -> query ("SELECT * FROM marcas");
                while ($resultado = $sql -> fetch_assoc()) {
                   echo "<option value='".$resultado['Id']."'>".$resultado
                   ['NombreMarca']."</option>";
                }    
                ?>
              
            </select>

            <div class="mb-3">
                <label  class="form-label">Precio</label>
                <input type="text" class="form-control" name="Precio"> 
            </div>

            <div class="mb-3">
                <label  class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion"> 
            </div>

            <div class="mb-3">
                <label  class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre"> 
            </div>
         
            <form action="../CRUD/insertarDatos.php" method="POST" onsubmit="return confirmAdd();">
                <!-- Campos del formulario -->
                <button type="submit" class="btn btn-danger">Enviar</button>
                <a href="../index.php" class="btn btn-dark">Volver</a>

                <script>
                    function confirmAdd() {
                        return confirm("¿Estás seguro de que quieres agregar este producto?");
                    }
                </script>
            </form>



        </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
  </body>
</html>