<?php
	//////////////// CONEXION A LA BD ////////////////////
	$host="localhost";
	$usuario="root";
	$contrasena="";
	$base="datos";
	$conexion=new mysqli($host,$usuario,$contrasena,$base);
	if($conexion -> connect_errno)
	{
		die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion->mysqli_connect_error());
	}
?>