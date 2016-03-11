<!DOCTYPE html>
<?php include('config.php');include('modulos/funciones.php');?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Apuntec</title>
	<script type="text/javascript" src="js/html5shiv.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/respond.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="css/animate.css">
</head>
<body>
	
	<?php include('modulos/header.php');?>
	<main>
		<?php
		if( isset($_GET['cat']) ){
			switch( $_GET['cat'] ){
				case 'home':
					include("modulos/home.php");
				break;
				case 'contacto':
					include('modulos/contacto.php');
				break;
				case 'ingresar':
					if( isset($_SESSION['login']) ){
						include('modulos/home.php');
					}else{
						include('modulos/ingresar.php');
					}
				break;
				case 'blog':
					crear_sss('blog');
				break;
				case 'comedor':
					crear_sss('comedor');
				break;
				case 'apuntes':
					crear_sss('apuntes');
				break;
				case 'lista':
					crear_sss('lista');
				break;
				case 'nueva_nota':
					crear_sss('nueva_nota');
				break;
				case 'alumnos':
					crear_sss('alumnos');
				break;
				case 'perfil':
				crear_sss('perfil');
				break;
				default:
					include("modulos/home.php");
				break;
			}
		}else{
			include("modulos/home.php");
		}
		?>
	</main>
</body>
</html>