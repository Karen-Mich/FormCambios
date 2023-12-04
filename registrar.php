<?php
include("conexion.php");

$cedula = $nombre1 = $nombre2 = $apellido1 = $apellido2 = $correo = $telefono = $direccion = $contrasena = "";

if (isset($_POST['registrar'])) {
    $cedula = trim($_POST['cedula']);
    $nombre1 = trim($_POST['nombre1']);
    $nombre2 = trim($_POST['nombre2']);
    $apellido1 = trim($_POST['apellido1']);
    $apellido2 = trim($_POST['apellido2']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);
    $contrasena = trim($_POST['contrasena']);

    $errors = array();

    if (empty($cedula) || strlen($cedula) !== 10 || !ctype_digit($cedula)) {
        $errors[] = "La cédula debe tener exactamente 10 números.";
    } else {
        $consultaCedula = "SELECT * FROM usuario WHERE ID_USU = '$cedula'";
        $resultadoCedula = mysqli_query($conex, $consultaCedula);

        if (mysqli_num_rows($resultadoCedula) > 0) {
            $errors[] = "La cédula ya existe en la base de datos.";
        }
    }

    if (empty($telefono) || strlen($telefono) !== 10 || !ctype_digit($telefono)) {
        $errors[] = "El teléfono debe tener exactamente 10 números.";
    }

    if (empty($nombre1) || !ctype_alpha($nombre1)) {
        $errors[] = "Ingrese un primer nombre válido.";
    }

    if (empty($nombre2) || !ctype_alpha($nombre2)) {
        $errors[] = "Ingrese un segundo nombre válido.";
    }

    if (empty($apellido1) || !ctype_alpha($apellido1)) {
        $errors[] = "Ingrese un primer apellido válido.";
    }

    if (empty($apellido2) || !ctype_alpha($apellido2)) {
        $errors[] = "Ingrese un segundo apellido válido.";
    }

    if (empty($correo)) {
        $errors[] = "Ingrese un correo válido.";
    } else {
        $consultaCorreo = "SELECT * FROM usuario WHERE COR_USU = '$correo'";
        $resultadoCorreo = mysqli_query($conex, $consultaCorreo);

        if (mysqli_num_rows($resultadoCorreo) > 0) {
            $errors[] = "El correo ya existe en la base de datos.";
        }
    }

    if (empty($direccion)) {
        $errors[] = "Ingrese una dirección válida.";
    }

    if (empty($contrasena)) {
        $errors[] = "Ingrese una contraseña válida.";
    }

    echo '<div class="error-container">';
    
    echo '<button onclick="cerrarError()">×</button>';

    if (empty($errors)) {
        $consulta = "INSERT INTO usuario (ID_USU, NOM1_USU, NOM2_USU, APE1_USU, APE2_USU, COR_USU, DIR_USU, TEL_USU, CON_USU, EST_USU)
        VALUES ('$cedula','$nombre1', '$nombre2', '$apellido1', '$apellido2', '$correo', '$direccion', '$telefono', '$contrasena','1');";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            ?>
            <h3 class="ok">Inscrito correctamente </h3>
            <?php
        } else {
            ?>
            <h3 class="bad">Ha ocurrido un error</h3>
            <?php
        }
    } else {
        ?>
        <h3 class="bad">Complete todos los campos correctamente.</h3>
        <?php
        foreach ($errors as $error) {
            ?>
            <h3 class="bad"><?php echo $error; ?></h3>
            <?php
        }
    }

    echo '</div>';
}
?>

<script>
    function cerrarError() {
        var errorContainer = document.querySelector('.error-container');
        errorContainer.style.display = 'none';
    }
</script>
