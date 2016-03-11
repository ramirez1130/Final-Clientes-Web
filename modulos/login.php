<?php
	include('funciones.php');
	include('../config.php');
	$usuario = escapar($_POST['usuario']);
	$clave = md5("$_POST[clave]");

	$consulta = mysqli_query($cnx,"SELECT * FROM personas WHERE USUARIO='$usuario' AND CLAVE='$clave'");
	$a = mysqli_fetch_assoc($consulta);
	if( is_null($a['USUARIO']) ){
		header("Location:../index.php?cat=ingresar&error=Usuario no encontrado.Verifica el usuario o la clave.");
	}else{
		$c = <<<permisos
			SELECT
				p.ID,
				p.NOMBRE,
				p.USUARIO,
				p.CLAVE,
				n.NIVEL
			FROM
				nivel as n LEFT JOIN permisos as perm ON perm.FKNIVEL = n.ID
			LEFT JOIN 
				personas as p ON perm.FKPERSONAS = p.ID
			WHERE
			USUARIO = '$usuario';
	permisos;

		$consulta2 = mysqli_query($cnx,$c);
		$a = mysqli_fetch_assoc($consulta2);
		session_start();
		$_SESSION['login'] = $a['ID'];
		$_SESSION['nivel'] = $a['NIVEL'];
		$_SESSION['nombre'] = $a['NOMBRE'];
		Header("Location:../index.php");
	}
?>