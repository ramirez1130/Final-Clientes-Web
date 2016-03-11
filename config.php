<?php
	ini_set('display_errors', 1);
	error_reporting( E_ALL );
	date_default_timezone_set( "America/Argentina/Buenos_Aires" );
	ini_set( 'upload_max_filesize' , '20M' );

	#Conecxion a la base de datos
	$cnx = @mysqli_connect('localhost', 'root', '', 'dw3_ramirez_brian' );
	#Inicio de sesion
	session_start();
?>