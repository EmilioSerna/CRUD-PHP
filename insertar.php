<?php
include("./inc/settings.php");
include("./inc/products.php");
include("./inc/error.php");
validar();

$identificador=$_POST ['identificador'];
$nombre=$_POST ['nombre'];
$fecha=$_POST ['fecha'];
$numero=$_POST ['numero'];
$numdouble=$_POST ['numdouble'];

$query="INSERT INTO $table_products ($product_id, $product, $date, $quantity, $price) VALUES ($identificador, '$nombre', '$fecha', $numero, $numdouble);";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ( $conn->query($query)== TRUE){
    header("location:crud.php");
}else{
    echo $error;
}

?>
