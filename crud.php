<?php
  include("./inc/settings.php");
  include("./inc/products.php");
  validar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/funciones.js"></script> 

<!--<link rel="stylesheet" href="./css/estilos.css">-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <h3>
    Bienvenido al himalaya
    <?= $_SESSION["nombre"]?>
    <?= $_SESSION["apellido1"]?>
    <?= $_SESSION["apellido2"]?>
    <br>
    <a href="logout.php" >Log out</a>
  </h3>
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT $product_id, $product, $date, $quantity, $price FROM $table_products";
$result = $conn->query($sql);
//print_r($result);
if ($result->num_rows > 0) {
  ?>

<table class='table table-hover'>
  <thead>
    <tr>
      <th scope='col'>ID</th>
      <th scope='col'>Nombre del producto</th>
      <th scope='col'>Fecha de Ingreso</th>
      <th scope='col'>Cantidad</th>
      <th scope='col'>Precio</th>
      <th scope='col'>Eliminar</th>
      <th scope='col'>Modificar</th>
    </tr>
  </thead>

  <?php
  // output data of each row
  echo "<tbody>";
  while($row = $result->fetch_assoc()) {
    echo "\n<tr>
    \n\t<th scope='row'>".$row[$product_id]."</th>\n\t
    <td>".$row[$product]."</td>\n\t
    <td>".$row[$date]."</td>\n\t
    <td>".$row[$quantity]."</td>\n\t
    <td>".$row[$price]."</td>";

    echo "<td><a href='eliminar.php?id=".$row[$product_id]."' onclick='return confirmar()'><img src='./img/eliminar.png'></a></td><td>
          <a href='update.php?id=".$row[$product_id]."' onclick='return confirmarModificar()'><img src='./img/update.png'></td></tr>\n";
  }
  echo "</tbody>";
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();

$year = getdate()['year'];
$month = getdate()['mon'];
$day = getdate()['mday'];
$current_date = "$year-$month-$day";
$name = $_SESSION['nombre'];
?>
<br>
<form action="insertar.php" method="post">

<fieldset style="width:300px">
<legend>Inserte la informacion del nuevo registro</legend>
  <?php
  echo "Id: <input type='number' name='identificador' id='' value='$result->num_rows' class='w3-input' required><br>";
  echo "Nombre: <input type='text' name='nombre' id='' value='$name' class='w3-input'><br>";
  echo "Fecha de Ingreso: <input type='date' name='fecha' id='' value=$current_date><br>";?>
  Cantidad: <input type="number" name="numero" id="" value="123"><br> 
  Precio: <input type="number" name="numdouble" id="" value="321"><br>
  <br>
  <input type="submit" value="Aceptar"><br> 
</fieldset>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>