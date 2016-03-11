<!DOCTYPE html>
<?php include('../config.php'); ?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel de Control</title>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<?php
		if( isset($_SESSION['login']) ){
			include('modulos/header.php');
			echo "<main>";
			if( isset($_GET['cat']) ){
				switch($_GET['cat']){
					case 'alumnos':
						include('modulos/alumnos.php');
					break;
					case 'empleados':
						include('modulos/empleados.php');
					break;
					case 'agregar_usuario':
						include('modulos/agregar_usuario.php');
					break;
					case 'editar':
						include('modulos/formulario.editar.php');
					break;
				}
			}else{
				include('modulos/alumnos.php');
			}
			echo "</main>";
		}else{
			include('modulos/ingresar.php');
		}
	?>
</body>
</html>