<?php 
use App\Tablas\Alumno;

session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar un nuevo alumno</title>
</head>

<body>

    <?php

    require '../vendor/autoload.php';

    $nombre = obtener_post('alumno');
    if (isset($nombre)) {
        $pdo = conectar();
        Alumno::registrar($nombre);
    }

    ?>
    <div>
        <form action="" method="post">
            <div>
                <label>
                    Alumno:
                    <input type="text" name="alumno" size="10"value="<?= $nombre ?>">
                </label>
            </div>
            <div>
                <button type="submit">Insertar</button>
                <a href="index.php">Cancelar</a>
            </div>
        </form>
    </div>

</body>

</html>