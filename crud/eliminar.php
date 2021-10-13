<?php
include("./inc/settings.php");
include("./inc/products.php");
validar();
?>
<?php

$id=$_GET['id'];

$query="DELETE FROM $table_products WHERE $product_id = $id;";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ( $conn->query($query)== TRUE){
    header("location:crud.php");
}else{
    echo "Algo salio mal <a href='https://localhost/crud/crud.php'> clic aqui para volver al crud</a>" ;

}


?>