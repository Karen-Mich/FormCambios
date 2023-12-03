<?php
include("conexion.php");

if(isset($_POST['registrar'])){
    if(strlen($_POST['cedula']) >= 1 &&
    strlen($_POST['nombre1']) >= 1 &&
    strlen($_POST['nombre2']) >=1 &&
    strlen($_POST['apellido1']) >=1 &&
    strlen($_POST['apellido2']) >=1 &&
    strlen($_POST['correo']) >=1 &&
    strlen($_POST['direccion']) >=1 &&
    strlen($_POST['telefono']) >=1 &&
    strlen($_POST['contrasena']) >=1 ){
        $cedula = trim($_POST['cedula']);
        $nombre1 = trim($_POST['nombre1']);
        $nombre2=trim($_POST['nombre2']);
        $apellido1=trim($_POST['apellido1']);
        $apellido2=trim($_POST['apellido2']);
        $correo=trim($_POST['correo']);
        $telefono=trim($_POST['telefono']);
        $direccion=trim($_POST['direccion']);
        $contrasena=trim($_POST['contrasena']);
        $consulta = "INSERT INTO usuario (ID_USU,NOM_USU, NOM2_USU, APE_USU, APE2_USU, COR_USU, DIR_USU, TEL_USU, CON_USU,EST_USU)
        VALUES ('$cedula','$nombre1', '$nombre2', '$apellido1', '$apellido2', '$correo', '$direccion', '$telefono', '$contrasena','1');";
        $resultado = mysqli_query($conex, $consulta);
       
       /* if ($resultado){
            ?>
            <h3 class="ok">Inscrito correctamente </h3>
            <?php
        } else {
            ?>
            <h3 class="bad">ha ocurrido un error</h3>
            <?php
        } else {
            ?>
            <h3 class="bad">Complete los campos</h3>
            <?php

    }*/
}
}

?>