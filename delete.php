<?php
    include("./inc/settings.php");
    validate();
?>
<?php
    $column1 = $_GET["column1"];

    $query = "DELETE FROM $DBNAME.table1 WHERE column1 = '$column1';";

    // Create connection
    $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($query) == TRUE) {
        header("location:crud.php");
    } else {
        echo "Algo salió mal <br> <a href=\"crud.php\">Volver a la página anterior</a>";
    }
?>