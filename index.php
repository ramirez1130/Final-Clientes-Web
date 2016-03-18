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
					include('modulos/contact.php');
				break;
				case 'ingresar':
					if( isset($_SESSION['login']) ){
						include('modulos/home.php');
					}else{
						include('modulos/ingresar.php');
					}
				break;
				case 'blog':
					include("modulos/blog.php");
				break;
				case 'comedor':
					include("modulos/comedor.php");
				break;
				case 'apuntes':
					include("modulos/apuntes.php");
				break;
				case 'lista':
					include("modulos/lista.php");
				break;
				case 'nueva_nota':
					include("modulos/nueva_nota.php");
				break;
				case 'alumnos':
					include("modulos/alumnos.php");
				break;
				case 'perfil':
					include("modulos/alumnos.php");
				break;
				case 'registrate':
					include("modulos/registrate.php");
				break;
			}
		}else{
			include("modulos/home.php");
		}
		?>
	</main>
</body>
</html>