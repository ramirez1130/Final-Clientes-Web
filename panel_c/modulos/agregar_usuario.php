<article class="editar">
	<h2>Agregar Usuario</h2>
	<form action="modulos/new_user.php" method="post">
		<div><span>Nombre:</span><input type="text" name="nombre"></div>
		<div><span>Apellido:</span><input type="text"  name="apellido"></div>
		<div><span>Email:</span><input type="text" name="email"></div>
		<div><span>DNI:</span><input type="text" name="dni"></div>
		<div><span>Usuario:</span><input type="text" name="usuario"></div>
		<div><span>Clave:</span><input type="text" name="clave"></div>
		<div><span>Legajo:</span><input type="text" name="legajo"></div>
		<?php
			echo "<div><span>Nivel:</span><select name='nivel'>";
			$consulta = mysqli_query($cnx,"SELECT * FROM nivel ORDER BY ID");
			while( $a2 = mysqli_fetch_assoc($consulta) ){
				echo "<option value='$a2[ID]'>$a2[NIVEL]</option>";
			}
			echo "</select></div>";
		?>
		<div>
			<input type="submit" value="Aceptar">
			<input type="button" value="Volver" onclick="window.history.back()">
		</div>
	</form>
</article>