<?php
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "point_of_sale";

    function validate() {
        session_start();
        if (empty($_SESSION["nombre"])) {
            echo "Se detecto un acceso ilegal al sistema, su ip esta siendo monitoreada y sera enviada a la policia";
        ?>
    <a href="http://localhost/crud/">Sitio de login</a>
<?php
    exit();
        }
    }
?>