<?php

session_start();
    require '../vendor/autoload.php';

    $id = obtener_post('id');

    if (!isset($id)) {
        return volver();
    }

    $pdo = conectar();

    $sent = $pdo->prepare("DELETE FROM notas WHERE alumno_id = :id");
    $sent->execute([':id' => $id]);

    $sent = $pdo->prepare("DELETE FROM alumnos WHERE id = :id");
    $sent->execute([':id' => $id]);
    $_SESSION['error'] = 'El alumno se ha borrado correctamente';
    volver();
    
    ?>
