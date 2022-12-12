<?php 

session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <title>Principal</title>
</head>
<body>
<?php require '../src/_alerts.php' ?>

<?php

    require '../vendor/autoload.php';
    $pdo = conectar();
    $sent = $pdo->query("SELECT * FROM alumnos ORDER BY id");
?>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th scope="col" class="py-3 px-6">Nombre</th>
                <th scope="col" class="py-3 px-6">Acciones</th>
            </thead>
            <tbody>
            <?php foreach ($sent as $fila): ?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= mb_substr($fila['nombre'], 0, 30) ?>
                </th>    
                <td class="py-4 px-6">
                    <a href="confirmar_borrado.php?id=<?= $fila['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>
                </td>
                <td class="py-4 px-6">
                    <a href="notas.php?id=<?= $fila['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Notas</a>
                </td>
                <td class="py-4 px-6">
                    <a href="modificar_alumno.php?id=<?= $fila['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modificar</a>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div><a href="insertar_alumno.php">Insertar Alumno</a></div>
</body>
</html>