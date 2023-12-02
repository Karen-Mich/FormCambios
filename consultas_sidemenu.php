<?php

include 'conexion.php';

function enableFormulario(): bool
{
    $db = new DataBase();
    $con = $db->conectar();

    $usuario = $_SESSION['id'];
    
    $sql = $con->prepare("SELECT COUNT(*) FROM proyectos_detalle WHERE ID_USU_DET = ? AND (ID_ROL_DET = 1 OR ID_ROL_DET = 2)");
    $sql->bind_param('i', $usuario);
    $sql->execute();
    $sql->bind_result($rowCount);
    $sql->fetch();
    $sql->close();

    return $rowCount > 0;
}


function enableHistorial(): bool
{
    $db = new DataBase();
    $con = $db->conectar();

    $usuario = $_SESSION['id'];

    $sql = $con->prepare("SELECT COUNT(*) FROM cambios WHERE ID_USU_CAM = ?");
    $sql->bind_param('i', $usuario);
    $sql->execute();
    $sql->bind_result($rowCount);
    $sql->fetch();
    $sql->close();

    return $rowCount > 0;
}


function enablePeticiones(): bool
{
    $db = new DataBase();
    $con = $db->conectar();

    $usuario = $_SESSION['id'];

    $sql = $con->prepare("SELECT COUNT(*) FROM proyectos_detalle WHERE ID_USU_DET = ? AND ID_ROL_DET = 3");
    $sql->bind_param('i', $usuario);
    $sql->execute();
    $sql->bind_result($rowCount);
    $sql->fetch();
    $sql->close();

    return $rowCount > 0;
}


function closeSession()
{
    session_start();
    session_destroy();
}
