<?php 
use App\Tablas\Alumno;

session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar alumno</title>
</head>
<body>
    <?php

    require '../vendor/autoload.php';

    $id = obtener_get('id');

    if (!isset($id)) {
        return volver();
    }
    $alumno = obtener_post('alumno');
    
    if (isset($alumno)) {
        $pdo = conectar();
        $sent = $pdo->prepare("UPDATE alumnos
                                  SET nombre = :nombre
                                WHERE id = :id");
        $sent->execute([
            ':nombre' => $alumno,
            ':id' => $id
        ]);
        return volver();
    }

    ?>
    <div>
        <form action="" method="post">
            <div>
                <label>
                    Inserte nuevo nombre para el alumno:
                    <input type="text" name="alumno" size="10"value="<?= $alumno ?>">
                </label>
            </div>
            <div>
                <button type="submit">Modificar</button>
                <a href="index.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>