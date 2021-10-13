<?php
  include("./inc/settings.php");
  include("./inc/products.php");
  include("./inc/error.php");
  validar();
?>
<link rel="stylesheet" href="./css/estilos.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php

$query="SELECT $product_id, $product, $date, $quantity, $price FROM $table_products WHERE $product_id = ".$_GET['id'].";";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($query);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ( $conn->query($query)== TRUE){
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      
      ?>

    <div class="form-group">
        <form action="update2.php" method="POST">
            <label>ID</label>
            <input type="number" name="identificador" class="form-control" id="" value="<?= $row[$product_id] ?>" readonly>
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" id="" value="<?= $row[$product] ?>">
            <label>Fecha de Ingreso</label>
            <input type="date" name="fecha" class="form-control" id="" value="<?= $row[$date] ?>">
            <label>Cantidad</label>
            <input type="number" name="numero" class="form-control" id="" value="<?= $row[$quantity] ?>">
            <label>Precio</label>
            <input type="number" step="0.01" name="numdouble" class="form-control" id="" value="<?= $row[$price] ?>">
            <br>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
      <?php
    }
}else{
    echo $error;
}

?>
