<?php
    include("./inc/settings.php");
    validate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ola</title>
    <script>
        function confirmar() {
            if (confirm("Va a eliminar un registro, ¿está usted seguro de eliminarlo?")) {
                return true;
            }
            return false;
        }
    </script>
    <style>

        tr:nth-child(even) {
            background-color: yellow;
        }

        tr:nth-child(odd) {
            background-color: pink;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    Bienvenidos al himalaya
    <?php
        include("./inc/settings.php");
        // Create connection
        $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM table1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "
            <table border=1>
            <tr>
                <th>column1</th>
                <th>column2</th>
                <th>column3</th>
                <th>column4</th>
                <th>column5</th>
            </tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>".$row["column1"]."</td>
                <td>".$row["column2"]."</td>
                <td>".$row["column3"]."</td>
                <td>".$row["column4"]."</td>
                <td>".$row["column5"]."</td>
                <td><a href='delete.php?column1=".$row["column1"]."' onClick='return confirmar()'><img src='delete.png'></a></td>
                <td><a href='update.php?column1=".$row["column1"]."'><img src='modify.png'></td>
            </tr>";
        }
        echo "</table>";
        } else {
        echo "0 results";
        }
        $conn->close();
    ?>

    <form action="insertar.php" method="post">
        <fieldset>
            <legend>Inserte la información del nuevo registro</legend>
            column1 <input type="number" name="column1" id="" value="1975" required>
            <br>
            column2 <input type="text" name="column2" id="" value="Humberto">
            <br>
            column3 <input type="date" name="column3" id="" value="1975-06-26">
            <br>
            column4 <input type="number" name="column4" id="" value="254">
            <br>
            column5 <input type="number" name="column5" id="" value="213.52">
            <br>
            <input type="submit" value="Enviar">
            <br>
        </fieldset>
    </form>
</body>
</html>