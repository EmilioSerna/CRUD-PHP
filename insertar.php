<?php
    include("./inc/settings.php");
    validate();
    $columns = array();

    foreach ($_POST as &$column) {
        array_push($columns, "\"".$column."\"");
    }
    
    $query = "INSERT INTO point_of_sale.table1 (column1, column2, column3, column4, column5) 
    VALUES(".implode(", ", $columns).");";

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