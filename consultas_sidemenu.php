<?php

include 'conexion.php';

function enableFormulario(): bool
{
    $db = new DataBase();
    $con = $db->conectar();

    $usuario = $_SESSION['id'];

    $sql = $con->prepare("SELECT COUNT(*) FROM proyectos_detalle WHERE ID_USU_DET = :usuario AND ID_ROL_DET=1 OR ID_ROL_DET=2");
    $sql->bindParam(':usuario', $usuario, PDO::PARAM_INT);
    $sql->execute();

    $rowCount = $sql->fetchColumn();

    return $rowCount > 0;
}

function enableHistorial(): bool
{
    $db = new DataBase();
    $con = $db->conectar();

    $usuario = $_SESSION['id'];

    $sql = $con->prepare("SELECT COUNT(*) FROM cambios WHERE ID_USU_CAM = :usuario");
    $sql->bindParam(':usuario', $usuario, PDO::PARAM_INT);
    $sql->execute();

    $rowCount = $sql->fetchColumn();

    return $rowCount > 0;
}

function enablePeticiones(): bool
{
    $db = new DataBase();
    $con = $db->conectar();

    $usuario = $_SESSION['id'];

    $sql = $con->prepare("SELECT COUNT(*) FROM proyectos_detalle WHERE ID_USU_DET = :usuario AND ID_ROL_DET=3");
    $sql->bindParam(':usuario', $usuario, PDO::PARAM_INT);
    $sql->execute();

    $rowCount = $sql->fetchColumn();

    return $rowCount > 0;
}

function closeSession()
{
    session_start();
    session_destroy();
}
