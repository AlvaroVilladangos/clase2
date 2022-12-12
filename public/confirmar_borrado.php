<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="v<?php session_start() ?>iewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">

    <title>Confirmar borrado</title>
</head>
<body>
    <?php
    require '../vendor/autoload.php';

    $id = obtener_get('id');

    if (!isset($id)) {
        return volver();
    }
    $pdo = conectar();
    $sent = $pdo->prepare("SELECT nombre
                              FROM alumnos
                            WHERE id = :id");
    $sent->execute([
        ':id' => $id
    ]);
    $fila = $sent->fetch(PDO::FETCH_ASSOC);
    var_dump($fila);
    ?>
    <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
        <span class="font-medium">El alumno es:</span> <?= mb_substr($fila['nombre'], 0, 30) ?>
    </div>
    <form action="borrar_alumno.php" method="post">
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <span class="font-medium">¡Peligro!</span> ¿Está seguro de que desea borrar ese alumno?
    </div>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Si</button>
    <a href="index.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">No</a>

    <!--<p>¿Está seguro de que desea borrar ese alumno?</p>
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit">Sí</button>
        <a href="index.php">No</a>-->
    </form>
</body>
</html>
