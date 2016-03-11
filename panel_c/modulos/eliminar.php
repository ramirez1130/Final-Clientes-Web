<?php
	$cnx = mysqli_connect('localhost','root','','dw3_ramirez_brian');
	$id = $_GET['id'];
	$c = "DELETE FROM personas WHERE ID='$id'";
	mysqli_query($cnx,$c);
	if($_GET['volver'] == 'empleados'){
		Header("Location:../index.php?cat=empleados&rta=Usuario Borrado");
	}else{
		Header("Location:../index.php?cat=alumnos&rta=Usuario Borrado");
	}
?>