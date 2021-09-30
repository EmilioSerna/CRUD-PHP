<?php
    include("./inc/settings.php");
    $DBNAME = "ing_software_2";

    $query = "SELECT * FROM usuarios WHERE 
    usuarios_numero_empleado='$_POST[username]'
    AND
    passwd='$_POST[passwd]';";

    // Create connection
    $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["nombre"] = $row["usuarios_nombre"];
        $_SESSION["apellido1"] = $row["usuarios_apellido1"];
        $_SESSION["apellido2"] = $row["usuarios_apellido2"];
        header("location: crud.php");
    } else {
        echo "Llamando a la policía";
?>
        <a href="localhost/crud/">Sitio de Login</a>
<?php
    }
    $conn->close();
?>