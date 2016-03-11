<?php
	global $cnx;
	$consulta = <<<consulta
		SELECT
			p.ID,
			p.NOMBRE,
			p.APELLIDO,
			p.EMAIL,
			p.DNI,
			p.USUARIO,
			p.LEGAJO,
			n.NIVEL
		FROM
			personas as p
			JOIN permisos as pp ON pp.FKPERSONAS = p.ID
			JOIN nivel as n ON pp.FKNIVEL = n.ID
		WHERE
			n.NIVEL = 'alumno';
consulta;
	$alumnos = mysqli_query($cnx,$consulta);
	$a = mysqli_fetch_assoc($alumnos);
?>
<article class="alumnos">	
<h2>Alumnos</h2>
<a href="index.php?cat=agregar_usuario">Agregar</a>
<table border="1" cellspacing="0" bordercolor="#52b6ec">
	<tr>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>EMAIL</td>
		<td>DNI</td>
		<td>USUARIO</td>
		<td>LEGAJO</td>
		<td>ACCION</td>
	</tr>
		<?php
			for($i=0;$i<mysqli_num_rows($alumnos);$i++){
				$datos = <<<datos
					<tr>
						<td>$a[NOMBRE]</td>
						<td>$a[APELLIDO]</td>
						<td>$a[EMAIL]</td>
						<td>$a[DNI]</td>
						<td>$a[USUARIO]</td>
						<td>$a[LEGAJO]</td>
						<td><a href="modulos/eliminar.php?id=$a[ID]&volver=alumnos">Eliminar</a><a href="index.php?cat=editar&id=$a[ID]">Editar</a></td>
					</tr>
datos;
				$a = mysqli_fetch_assoc($alumnos);			
				echo $datos;
			}
		?>
</table>
</article>