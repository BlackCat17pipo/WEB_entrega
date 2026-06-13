<?php
session_start();
if(!isset($_SESSION['usuario']))
{
header("Location: ../../user/login/");
exit();
}
require_once "../mvc/v1/models/cita.php";
$cita=new Cita();
$datos=$cita->listar();
?>
<h2>Calendario de citas</h2>
<?php foreach($datos as $c){ ?>
<div style="
border:1px solid black;
padding:15px;
margin:10px;
">
<h3>
<?=$c['fecha']?>
</h3>
Hora:
<?=$c['hora']?>
<br>
Prospecto:
<?=$c['prospecto']?>
<br>
Estado:
<?=$c['estado']?>
</div>
<?php } ?>