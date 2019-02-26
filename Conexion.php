<?php
$Servidor = "localhost";
$BaseDeDatos = "proyecto";
$Usuario = "root";
$Password = "";

$conectar = mysqli_connect("$Servidor", "$Usuario", "$Password", "$BaseDeDatos");//or die(header ("Location: index.html?error_login=0"));

//mysqli_select_db("$BaseDeDatos");

//date_default_timezone_get(oid)
?>
