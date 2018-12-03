<?php
	include "ParametrosDB.php";
	$email=$_GET['email']; $estado=$_GET['estado'];
	$link = new mysqli($server, $user, $pass, $basededatos);
    if($link->connect_error){
        die("La conexión falló:" . $link->connect_error);
    }
	if($estado=='activo'){
		$sqla= mysqli_query($link, "UPDATE usuarios SET estado='bloqueado' WHERE email='$email'");
	}else if ($estado=='bloqueado'){
		$sql2= mysqli_query($link, "UPDATE usuarios SET estado='activo' WHERE email='$email'");
	}
	mysqli_close($link);
	header("location:GestionarCuentas.php");
	
?>