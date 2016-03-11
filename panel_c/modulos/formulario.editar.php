<?php
	$id = $_GET['id'];
	$consulta = mysqli_query($cnx,"SELECT * FROM personas WHERE ID='$id'");
	$a = mysqli_fetch_assoc($consulta);
?>
<article class="editar">
	<h2>Datos de <?php echo "$a[NOMBRE] $a[APELLIDO]"?></h2>
	<form action="modulos/actualizar.php" method="post">
		<div><span>Nombre:</span><input type="text" value="<?php echo $a['NOMBRE'];?>" name="nombre"></div>
		<div><span>Apellido:</span><input type="text" value="<?php echo $a['APELLIDO'];?>" name="apellido"></div>
		<div><span>Email:</span><input type="text" value="<?php echo $a['EMAIL']?>" name="email"></div>
		<div><span>DNI:</span><input type="text" value="<?php echo $a['DNI']?>" name="dni"></div>
		<div><span>Usuario:</span><input type="text" value="<?php echo $a['USUARIO']?>" name="usuario"></div>
		<div><span>Legajo:</span><input type="text" value="<?php echo $a['LEGAJO']?>" disabled="disabled"></div>
		<div><span>Credito:</span><input type="text" value="<?php echo $a['CREDITO']?>" disabled="disabled"></div>
		<?php
			echo "<div><span>Fecha de Ingreso:</span><input type='text' value='$a[FECHA_ALTA]' disabled='disabled'/></div>";
			echo "<div><span>Nivel:</span><select name='nivel'>";
			$consulta = mysqli_query($cnx,"SELECT * FROM nivel ORDER BY ID");
			while( $a2 = mysqli_fetch_assoc($consulta) ){
				echo "<option value='$a2[ID]'>$a2[NIVEL]</option>";
			}
			echo "</select></div>";
		?>
		<div>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="submit" value="Actualizar">
			<input type="button" value="Volver" onclick="window.history.back()">
		</div>
	</form>
</article>