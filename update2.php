<?php
    include("./inc/settings.php");
    validate();
?>
<?php
    $query = "UPDATE table1 SET 
        column2 = '".$_POST['column2']."', 
        column3 = '".$_POST['column3']."', 
        column4 = '".$_POST['column4']."', 
        column5 = '".$_POST['column5']."'
        WHERE column1 = ".$_POST['column1'].";";

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