<?php
  include("./inc/settings.php");
  include("./inc/products.php");
  include("./inc/error.php");
  validar();
?>
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
      <form action="update2.php" method="POST">
      <fieldset>
<legend>Cambie la información del registro.</legend>
  Id: <input type="number" name="identificador" id="" value="<?= $row[$product_id] ?>" readonly><br>
  Nombre: <input type="text" name="nombre" id="" value="<?= $row[$product] ?>"><br>
  Fecha de Ingreso: <input type="date" name="fecha" id="" value="<?= $row[$date] ?>"><br>
  Cantidad: <input type="number" name="numero" id="" value="<?= $row[$quantity] ?>"><br> 
  Precio: <input type="number" name="numdouble" id="" value="<?= $row[$price] ?>"><br>
  <br>
  <input type="submit" value="Modificar"><br> 
</fieldset>
    </form>
      <?php
    }
}else{
    echo $error;
}

?>
