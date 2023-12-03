<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <form class = "formulario" method="post"> 
        <div class = "contenedor">
            <h1>Crear Cuenta</h1>

            <div class = "input-contenedor">
            <i class='bx bxs-user-detail'></i>
<input type = "text" name="cedula" placeholder = "Cédula">
</div> 

    <div class = "input-contenedor">
        <i class='bx bxs-user-circle'></i>
<input type = "text" name="nombre1" placeholder = "Primer nombre">
</div>

<div class = "input-contenedor">
    <i class='bx bx-user-circle' ></i>
<input type = "text" name="nombre2" placeholder = "Segundo Nombre">
</div>

<div class = "input-contenedor">
    <i class='bx bxs-user-rectangle' ></i>
<input type = "text" name="apellido1" placeholder = "Primer Apellido">
</div>

<div class = "input-contenedor">
    <i class='bx bx-user-pin' ></i>
<input type = "text" name="apellido2" placeholder = "Segundo Apellido">
</div>

<div class = "input-contenedor">
    <i class='bx bxs-envelope'></i>
<input type = "text" name="correo" placeholder = "Correo electrónico">
</div>

<div class = "input-contenedor">
    <i class='bx bxs-map' ></i>
<input type = "text" name="direccion" placeholder = "Dirección">
</div>

<div class = "input-contenedor">
    <i class='bx bxs-phone-incoming' ></i>
<input type = "text" name="telefono" placeholder = "Teléfono">
</div>

<div class = "input-contenedor">
    <i class='bx bxs-key' ></i>
<input type = "password" name="contrasena" placeholder = "Contraseña">
</div>

<input type="submit" value = "Registrar" name = 'registrar' class = "button">
<p>Al registrarte, aceptas nuestras Condiciones de uso y Politica de privacidad.</p>
<p>¿Ya tienes cuenta? <a class="link" href="?">Iniciar Sesion</a></p> 
    </div>
    </form>
    <?php
    include("registrar.php");
    ?>
</body>
</html>