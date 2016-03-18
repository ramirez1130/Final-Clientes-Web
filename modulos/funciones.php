<?php
#Convertir String en utf8
function parse_utf8( $text ){
	$coding = mb_detect_encoding($text,"UTF-8,ISO-8859-1");
	$text_converted = iconv( $coding , "UTF-8" , $text );
	return $text_converted;
}

function escapar( $variable ){
	global $cnx;
	return mysqli_real_escape_string($cnx, $variable);	
}

function nivel($nivel,$nombre){
	console($nivel);
	global $cnx;
	switch($nivel){
		case 'administrador':
			$acciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE ID > 1 AND ID <6");
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
			$secciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE SECCION = 'Comedor' OR SECCION = 'Apuntes'");
			while( $a = mysqli_fetch_assoc($secciones) ){
				$get = strtolower($a['SECCION']);
				echo "<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>";				
			}	
		break;
	}
	echo "<li><a href='#' class='usuario'>$nombre</a></li>";
}

#Funcion para imprimir en consola
function console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . (string) $data . "' );</script>";

    echo $output;
}

#Acentuar palabras
#$position va a recibir un numero que es la posicion de la vocal a acentuar
function accentuate( $string , $position ){
	$array = str_split( $string );
	switch( $array[$position] ){
		case "a":
			$array[$position] = "á";
		break;
		case "e":
			$array[$position] = "é";
		break;
		case "i":
			$array[$position] = "í";
		break;
		case "o":
			$array[$position] = "ó";
		break;
		case "u":
			$array[$position] = "ú";
		break;
	}

	$string = implode( $array );
	console($string);
	return $string;
}

?>