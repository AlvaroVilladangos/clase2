<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
<?php
    require '../vendor/autoload.php';
    $id = obtener_get('id');

    $pdo = conectar();
    $sent = $pdo->prepare("SELECT * FROM notas WHERE alumno_id = :id");
    $sent->execute([':id' => $id]);
?>
    <div>
        <table style="margin: auto" border="1">
            <thead>
                <th>ID</th>
                <th>CE</th>
                <th>Notas</th>
            </thead>
            <tbody>
                <?php foreach ($sent as $fila): ?>
                    <tr>
                        <td><?= mb_substr($fila['alumno_id'], 0, 30) ?></td>
                        <td><?= mb_substr($fila['ccee_id'], 0, 30) ?></td>
                        <td><?= mb_substr($fila['nota'], 0, 30) ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div><a href="index.php">Volver</a>
</div>
</body>
</html>