<?php

$con = mysqli_connect("localhost", "root", "", "formulario_de_cambio");

$usuario = $_SESSION['id_usuario'];

function enableFormulario(): bool
{
    global $con, $usuario;

    $sql = $con->prepare("SELECT COUNT(*) FROM proyectos_detalle WHERE ID_USU_DET = ? AND (ID_ROL_DET = 1 OR ID_ROL_DET = 2) AND ID_PRO_DET IN (SELECT ID_PRO FROM PROYECTOS WHERE EST_PRO = 1)");
    $sql->bind_param('i', $usuario);
    $sql->execute();
    $sql->bind_result($rowCount);
    $sql->fetch();
    $sql->close();

    return $rowCount > 0;
}


function enableHistorial(): bool
{
    global $con, $usuario;

    $sql = $con->prepare("SELECT COUNT(*) FROM cambios WHERE ID_USU_CAM = ? AND ID_PRO_CAM IN (SELECT ID_PRO FROM PROYECTOS WHERE EST_PRO = 1)");
    $sql->bind_param('i', $usuario);
    $sql->execute();
    $sql->bind_result($rowCount);
    $sql->fetch();
    $sql->close();

    return $rowCount > 0;
}


function enablePeticiones(): bool
{
    global $con, $usuario;

    $sql = $con->prepare("SELECT COUNT(*) FROM proyectos_detalle WHERE ID_USU_DET = ? AND ID_ROL_DET = 3 AND ID_PRO_DET IN (SELECT ID_PRO FROM PROYECTOS WHERE EST_PRO = 1)");
    $sql->bind_param('i', $usuario);
    $sql->execute();
    $sql->bind_result($rowCount);
    $sql->fetch();
    $sql->close();

    return $rowCount > 0;
}


function closeSession()
{
    session_destroy();
}
