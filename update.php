<?php
    include("./inc/settings.php");
    validate();
?>
<?php
    $column1 = $_GET['column1'];
    $query = "SELECT column1, column2, column3, column4, column5 FROM table1 WHERE column1 = $column1;";
    $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);
    $result = $conn->query($query);

    // Create connection
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($query) == TRUE) {
        // print_r ($result);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
                <form action="update2.php" method="POST">
                    <fieldset>
                        <legend>Cambie la información del nuevo registro</legend>
                        column1 <input type="number" name="column1" id="" value="<?=$row['column1'] ?>" readonly>
                        <br>
                        column2 <input type="text" name="column2" id="" value="<?=$row['column2'] ?>">
                        <br>
                        column3 <input type="date" name="column3" id="" value="<?=$row['column3'] ?>">
                        <br>
                        column4 <input type="number" name="column4" id="" value="<?=$row['column4'] ?>">
                        <br>
                        column5 <input type="number" name="column5" id="" value="<?=$row['column5'] ?>">
                        <br>
                        <input type="submit" value="Modificar">
                        <br>
                    </fieldset>
                </form>
            <?php
        }
    } else {
        echo "Algo salió mal <br> <a href=\"crud.php\">Volver a la página anterior</a>";
    }

    
?>