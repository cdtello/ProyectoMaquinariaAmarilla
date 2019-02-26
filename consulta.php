<?php
require("Conexion.php");

$telefono = $_GET['telefono'];
$fecha = $_GET['fecha'];
$hora_inicio = $_GET['hora_inicio'];
$hora_fin = $_GET['hora_fin'];
$tiempo = $_GET['tiempo'];


echo "  $telefono";
echo "  $fecha";
echo "  $hora_inicio";
echo "  $hora_fin";
echo "  $tiempo";

		mysqli_query($conectar,"insert into reportes(id_maquina, fecha_insercion, fecha, hora_inicio, hora_fin, tiempo_laborado) 
		values ('$telefono',now(),'$fecha','$hora_inicio','$hora_fin','$tiempo')") or die(mysql_error());
		echo '<script language="javascript">alert("Registro Correcto")</script>';
		//location.href = "login.html";</script>';

?>