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
	$usuario = escapar($_POST['usuario']);
	$nivel = $_POST['nivel'];
	$id = $_POST['id'];

	mysqli_query($cnx,"UPDATE personas SET NOMBRE='$nombre',APELLIDO='$apellido',EMAIL = '$email',DNI='$dni',USUARIO='$usuario' WHERE ID = $id");

	$can = <<<nivel
		SELECT
			pp.ID,
			p.USUARIO,
			pp.FKNIVEL
		FROM
			personas as p
			JOIN permisos as pp ON pp.FKPERSONAS = p.ID
		WHERE
			p.ID='$id';
nivel;
	$actualizar_nivel = mysqli_query($cnx,$can);
	$a = mysqli_fetch_assoc($actualizar_nivel) ;
	mysqli_query($cnx,"UPDATE permisos SET FKNIVEL=$nivel WHERE ID=$a[ID]");
	echo "<script> window.history.back(); </script>"
?>