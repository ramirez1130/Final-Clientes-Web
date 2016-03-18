<?php
	include('../config.php');
	include('funciones.php');

	$name = escapar($_POST["name"]);
	$lastname = escapar($_POST["lastname"]);
	$email = escapar($_POST["email"]);

	$c = "UPDATE personas SET NOMBRE='$name' , APELLIDO='$lastname' , EMAIL='$email' WHERE ID='$_SESSION[login]'";
	mysqli_query($cnx,$c);
	Header("Location:../index.php?cat=perfil");

?>