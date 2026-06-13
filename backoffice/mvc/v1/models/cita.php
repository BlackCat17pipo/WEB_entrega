<?php
require_once "../conexion.php";
class Cita
{
    public function listar()
    {
        $db = Conexion::conectar();
        $sql = "
        SELECT *
        FROM citas
        ORDER BY fecha DESC
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($datos)
    {
        $db = Conexion::conectar();
        $sql = "
        INSERT INTO citas
        (
        titulo,
        descripcion,
        fecha,
        hora,
        prospecto,
        correo
        )
        VALUES
        (?,?,?,?,?,?)
        ";
        $stmt = $db->prepare($sql);
        return $stmt->execute($datos);
    }

    public function cambiarEstado($id,$estado)
    {
        $db = Conexion::conectar();
        $sql="
        UPDATE citas
        SET estado=?
        WHERE id=?
        ";
        $stmt=$db->prepare($sql);
        return $stmt->execute([
            $estado,
            $id
        ]);
    }
}