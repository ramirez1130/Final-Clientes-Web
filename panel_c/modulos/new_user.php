<?php
	include('../../config.php');
	function escapar( $variable ){
		global $cnx;
		return mysqli_real_escape_string($cnx, $variable);	
	}
	$nombre = escapar($_POST['nombre']);
	$apellido = escapar($_POST['apellido']);
	$email = escapar($_POST['email']);
	$dni = escapar($_POST['dni']);
	$fecha = date('Y-m-d',time());
	$usuario = escapar($_POST['usuario']);
	$clave = md5($_POST['clave']);
	$legajo = $_POST['legajo'];
	$nivel = $_POST['nivel'];

	$usuarios_e = mysqli_query($cnx,"SELECT USUARIO,EMAIL FROM personas");
	while( $a = mysqli_fetch_assoc($usuarios_e) ){
		if( $usuario == $a['USUARIO'] ){
			Header("Location:../index.php?error=usuario_existente");
		}
		else if($email == $a['EMAIL']){
			Header("Location:../index.php?error=email_en_uso");
		}
		else{
			mysqli_query($cnx,"INSERT INTO personas
			(NOMBRE,APELLIDO,EMAIL,DNI,FECHA_ALTA,USUARIO,CLAVE,LEGAJO,CREDITO) VALUE ('$nombre','$apellido','$email',$dni,'$fecha','$usuario','$clave',$legajo,0)");
			$id2 = mysqli_insert_id();
			echo $id2;
			#Header("Location:../index.php?e=usuario_creado");
		}
	}

?>
