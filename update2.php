<?php 
include("./inc/settings.php");
include("./inc/products.php");
validar();
?>

<?php 
    $query = "UPDATE $table_products SET $product = '".$_POST['nombre']."', $date = '".$_POST['fecha']."', $quantity = ".$_POST['numero'].", $price = ".$_POST['numdouble']." WHERE $product_id = ".$_POST['identificador'].";";

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