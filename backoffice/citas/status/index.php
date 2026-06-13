<?php
session_start();
require_once "../../mvc/v1/models/cita.php";
$cita=new Cita();
$cita->cambiarEstado(
    $_GET['id'],
    $_GET['estado']
);
header("Location: ../");
exit();
?>