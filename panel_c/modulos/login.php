<?php
	$cnx = mysqli_connect('localhost','root','','dw3_ramirez_brian');
	$usuario = mysqli_real_escape_string($cnx, $_POST['usuario']);
	$clave = md5($_POST['clave']);

	$consulta = <<<consulta
		SELECT
			p.USUARIO,
			p.CLAVE
		FROM
			usuario_a AS ua
			JOIN personas AS p ON ua.FKPERSONA = p.ID
		WHERE
		USUARIO = '$usuario'
		AND
		CLAVE = '$clave';
consulta;
	$login = mysqli_query($cnx,$consulta);
	$a = mysqli_fetch_assoc($login);
	if( is_null($a['USUARIO']) ){
		header("Location:../index.php?cat=ingresar&error=Usuario no encontrado.Verifica el usuario o la clave.");
	}else{
		session_start();
		$_SESSION['login'] = 1;
		$_SESSION['usuario'] = $usuario;
		Header("Location:../index.php?cat=alumnos");
	}
?>