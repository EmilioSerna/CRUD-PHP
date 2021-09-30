<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenidos al sistema POS versión Web Gesti&oacute;n de Productos</h1>
    <br>
    <form action="validate.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <h2>User <input type="text" name="username" placeholder="Escriba su usuario" required></h2>
            <h2>Password <input type="password" name="passwd" placeholder="Escriba su contraseña" required></h2>    
            <input type="submit" value="Login">
            <br>
        </fieldset>
    </form>
    <br>
    <br>
    <a href="crud.php" target="_blank" rel="noopener noreferrer">Pushale aquí pa'l CRUD</a>
</body>
</html>