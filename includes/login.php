
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/0c9945bea4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/st.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Formulario de Cambios</title>

</head>
    <body>
        <div id="login">
            <section>
                <div class="contenedor">
                    <div class="formulario">
                        <form action="_function.php" method="POST">
                            <h2>Iniciar Sesión</h2>

                            <div class="input-contenedor">
                                <i class="fas fa-user-secret"></i>
                                <input type="text" name="nombre" required>
                                <label>Nombre</label>
                            </div>

                            <div class="input-contenedor">
                                <i class="fas fa-unlock-alt"></i>
                                <input type="password" name="password" required>
                                <label>Contraseña</label>
                            </div>

                            <div>
                                <button type="submit">Acceder</button>
                                <div class="registrar">
                                    <p>
                                        No tengo cuenta
                                        <a href="../views/register.php"> Registrarse</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>