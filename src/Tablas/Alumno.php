<?php
namespace App\Tablas;

use PDO;

class Alumno extends Modelo
{
    protected static string $tabla = 'alumnos';

    public $id;
    public $usuario;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->usuario = $campos['usuario'];
    }


    public static function registrar($nombre, ? PDO $pdo = null)
    {
        $pdo = conectar();
        $sent = $pdo->prepare("INSERT
                                INTO alumnos (nombre)
                            VALUES (:nombre)");
        $sent->execute([
            ':nombre' => $nombre
        ]);

        $_SESSION['exito'] = 'El registro se ha hecho correctamente.';
        volver();

    }

    public static function borrar($id, ? PDO $pdo = null)
    {
        $pdo->beginTransaction();
        $pdo->exec('LOCK TABLE alumnos IN SHARE MODE');
        $sent = $pdo->prepare("SELECT COUNT(*)
                                 FROM alumnos
                                WHERE id = :id");
        $sent->execute([':id' => $id]);
        if ($sent->fetchColumn() === 0) {
            $sent = $pdo->prepare("DELETE FROM alumnos WHERE id = :id");
            $sent->execute([':id' => $id]);
            $_SESSION['mensaje'] = 'El departamento se ha borrado correctamente';
        }
    }


}