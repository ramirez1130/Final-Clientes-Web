<article class="contenido perfil">
	<h2>Perfil</h2>
	<form action="modulos/update_data.php" method="post">
		<?php
			global $cnx;
			$datos_personales = mysqli_query($cnx,"SELECT * FROM personas WHERE ID = '$_SESSION[login]'");
			$a = mysqli_fetch_assoc($datos_personales);
			$cbono = <<<bono
				SELECT
					p.NOMBRE as RECEPTOR,
					d.DIA
				FROM
					bonos as b
					JOIN dias as d ON b.FKDIAS=d.ID
					JOIN personas as p ON p.ID=b.RECEPTOR
				WHERE
					p.ID= '$_SESSION[login]';
bono;
			$bono = mysqli_query($cnx,$cbono);
			console($_SESSION['login']);
		?>
		<div><span>Nombre:</span><input name="name" type="text" value="<?php echo "$a[NOMBRE]";?>"></div>
		<div><span>Apellido:</span><input name="lastname" type="text" value="<?php echo "$a[APELLIDO]"?>"></div>
		<div><span>Email:</span><input name="email" type="email" value="<?php echo "$a[EMAIL]"?>"></div>
		<div><span>DNI:</span><input type="text" value="<?php echo "$a[DNI]"?>" disabled="disabled"></div>
		<div><span>Legajo:</span><input type="text" value="<?php echo "$a[LEGAJO]"?>" disabled="disabled"></div>
		<div><span>Credito:</span><input type="number" value="<?php echo "$a[CREDITO]"?>" disabled="disabled"></div>
		<div><input type="submit" value="Actualizar"></div>
	</form>
	<?php
		if( $_SESSION['nivel'] == 'alumno' ){
			console($a);
			echo "<div>
			<h3>Dias del comedor de esta semana</h3>
			<ul>";
				#La variable dentro del while $a es interna y nada tiene que
				#ver con la variable $a de fuera del if
				while( $a = mysqli_fetch_assoc($bono) ){
					echo "<li>$a[DIA]</li>";
				}
			echo "</ul>
			</div>";
		}
	?>
</article>