<?php
#Convertir String en utf8
function parse_utf8( $text ){
	$coding = mb_detect_encoding($text,"UTF-8,ISO-8859-1");
	$text_converted = iconv( $coding , "UTF-8" , $text );
	echo $text_converted;
}

function navegacion($categoria,$secciones){
	switch( $categoria ){
				case 'home':
					while( $a = mysqli_fetch_assoc($secciones)){
						$get = strtolower($a['SECCION']);
						if($a['ID'] == 1){
							echo "<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>";
						}else{
							parse_utf8("<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>");
						}
					}
				break;
				case 'blog':
					while( $a = mysqli_fetch_assoc($secciones)){
						$get = strtolower($a['SECCION']);
						if($a['ID'] == 2){
							echo "<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>";
						}else{
							echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
						}
					}
				break;
				case 'comedor':
					while( $a = mysqli_fetch_assoc($secciones)){
						$get = strtolower($a['SECCION']);
						if($a['ID'] == 3){
							echo "<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>";
						}else{
							echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
						}
					}
				break;
				case 'apuntes':
					while( $a = mysqli_fetch_assoc($secciones)){
						$get = strtolower($a['SECCION']);
						if($a['ID'] == 4){
							echo "<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>";
						}else{
							echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
						}
					}
				break;
				case 'contacto':
					while( $a = mysqli_fetch_assoc($secciones)){
						$get = strtolower($a['SECCION']);
						if($a['ID'] == 5){
							echo "<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>";
						}else{
							echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
						}
					}
				break;
				case 'ingresar':
					while( $a = mysqli_fetch_assoc($secciones)){
						$get = strtolower($a['SECCION']);
						if($a['ID'] == 6){
							echo "<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>";
						}else{
							echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
						}
					}
				break;
				default:
					while( $a = mysqli_fetch_assoc($secciones) ){
						$get = strtolower($a['SECCION']);
						if($a['ID'] == 1){
							echo "<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>";
						}else{
							echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
						}
					}
				break;
			}
}

function escapar( $variable ){
	global $cnx;
	return mysqli_real_escape_string($cnx, $variable);	
}

function nivel($nivel,$nombre){
	global $cnx;
	switch($nivel){
		case 'administrador':
			$acciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE VISIBLE_A = 1;");
			while( $a = mysqli_fetch_assoc($acciones) ){
				$get = strtolower($a['SECCION']);
				echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
			}
		break;
		case 'alumno':
			$acciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE ID<6 ORDER BY ID");
			while( $a = mysqli_fetch_assoc($acciones) ){
				$get = strtolower($a['SECCION']);
				echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
			}
		break;
		case 'escritor':
			$secciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE SECCION='Blog' OR SECCION = 'Nueva Nota'");
			while( $a = mysqli_fetch_assoc($secciones) ){
				$get = strtolower($a['SECCION']);
				echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";
			}

		break;
		case 'veedor':
			$secciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE SECCION='Lista'");
			$a = mysqli_fetch_assoc($secciones);
			$get = strtolower($a['SECCION']);
			echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";

		break;
		case 'gabinetero': #346
			$secciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE ID = 3 OR ID = 4 OR ID=6");
			while( $a = mysqli_fetch_assoc($secciones) ){
				$get = strtolower($a['SECCION']);
				echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";				
			}	
		break;
	}
	echo "<li><a href='#' class='usuario'>$nombre</a></li>";
}

#Esta funcion comprueba si hay una sesion para inhabilitar secciones de la navegacion
function crear_sss($seccion){ 
	if( isset($_SESSION['login']) ){
		include("modulos/$seccion.php");
	}else{
		include('modulos/home.php');
	}
}

#Funcion para imprimir en consola
function console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . (string) $data . "' );</script>";

    echo $output;
}

?>