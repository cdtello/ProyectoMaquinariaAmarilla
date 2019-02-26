<?php
require("Conexion.php");

$id_usuario = $_POST['id_usuario'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contra = $_POST['contra'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
#$suscripcion = $_POST['suscripcion'];


if($id_usuario=="" || $nombres=="" || $apellidos==""  || $contra==""  || $correo==""  || $telefono=="")
{
	echo '<script language="javascript">alert("Ingresa Todos Los Campos");
	location.href = "servicios.html";</script>';
}
else
{
	$consulta = "Select * from usuarios where id_usuario = '$id_usuario'";
	$result = mysqli_query($conectar,$consulta) or die (mysql_error());
	$num_rows = mysqli_num_rows($result);


	if($num_rows > 0)
	{
		echo '<script language="javascript">alert("Usuario ya Registrado");
		location.href = "servicios.html";</script>';
	}
	else
	{
		mysqli_query($conectar,"insert into usuarios(id_usuario, nombres, apellidos, contra, correo, telefono) 
		values ('$id_usuario','$nombres','$apellidos','$contra','$correo','$telefono')") or die(mysql_error());
		echo '<script language="javascript">alert("Registro Correcto");
		location.href = "servicios.html";</script>';
	}
}
?>