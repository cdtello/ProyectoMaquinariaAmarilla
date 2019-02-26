<?php

session_start();
session_unset();

session_destroy();
session_start();
$valido = true;
	require("Conexion.php");
	$id_usuario = $_POST['Id'];
	$contra = $_POST['Pass'];
	if($id_usuario=="" || $contra=="")
	{
		echo'<script language="javascript">alert("Ingrese Todos Los Campos");
		location.href = "servicios.html";</script>';
	}
	else
	{
		$consulta = "select * from usuarios where id_usuario = '$id_usuario' and contra='$contra'";
		$result = mysqli_query($conectar, $consulta) or die (mysqli_error($conectar));
		$filasn = $result->num_rows;
		if ($filasn <= 0) 
		{
			$valido = false;
			echo'<script language="javascript">alert("Acceso Denegado");
			location.href = "servicios.html";</script>';
		}
		else
		{
			$rowresult = mysql_fetch_array($result);
			$_SESSION['id_usuario']=$rowresult['id_usuario'];
			$valido=true;
			$_SESSION["usuario"]=$id_usuario;
			header("location:portafolio.php");
		}

	}
?>