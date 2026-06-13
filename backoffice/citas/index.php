<?php
session_start();
if(!isset($_SESSION['usuario']))
{
header("Location: ../../user/login/");
exit();
}
require_once "../mvc/v1/models/cita.php";
$cita = new Cita();
$datos = $cita->listar();
?>
<h2>Mantenedor de Citas</h2>
<a href="add/">
<button>
Nueva cita
</button>
</a>
<br><br>
<table border="1">
<tr>
<th>Cliente</th>
<th>Fecha</th>
<th>Hora</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
<?php foreach($datos as $c){ ?>
<tr>
<td>
<?=$c['prospecto']?>
</td>
<td>
<?=$c['fecha']?>
</td>
<td>
<?=$c['hora']?>
</td>
<td>
<?=$c['estado']?>
</td>
<td>
<a href="status/?id=<?=$c['id']?>&estado=Realizada">
<button>
Realizada
</button>
</a>
<a href="status/?id=<?=$c['id']?>&estado=Cancelada">
<button>
Cancelar
</button>
</a>
</td>
</tr>
<?php } ?>
</table>