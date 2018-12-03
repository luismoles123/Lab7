<?php
	include "ParametrosDB.php";
	$email=$_GET['email'];
	$link = new mysqli($server, $user, $pass, $basededatos);
    if($link->connect_error){
        die("La conexión falló:" . $link->connect_error);
    }
	$sqla= mysqli_query($link, "DELETE FROM usuarios WHERE email='$email'");
	mysqli_close($link);
	header("location:GestionarCuentas.php");
?>