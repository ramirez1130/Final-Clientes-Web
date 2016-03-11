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
			CONCAT(UPPER(LEFT(n.NIVEL,1)),SUBSTR(n.NIVEL,2)) as NIVEL
		FROM
			personas as p
			JOIN permisos as pp ON pp.FKPERSONAS = p.ID
			JOIN nivel as n ON pp.FKNIVEL = n.ID
		WHERE
			n.NIVEL = 'escritor' OR n.NIVEL = 'gabinetero' OR n.NIVEL = 'veedor';
consulta;
	$empleados = mysqli_query($cnx,$consulta);
	$a = mysqli_fetch_assoc($empleados);
?>
<article class="alumnos">	
<h2>Empleados</h2>
<a href="index.php?cat=agregar_usuario">Agregar</a>
<table border="1" cellspacing="0" bordercolor="#52b6ec">
	<tr>
		<td>NOMBRE</td>
		<td>Apellido</td>
		<td>EMAIL</td>
		<td>DNI</td>
		<td>USUARIO</td>
		<td>NIVEL</td>
		<td>ACCION</td>
	</tr>
		<?php
			for($i=0;$i<mysqli_num_rows($empleados);$i++){
				$datos = <<<datos
					<tr>
						<td>$a[NOMBRE]</td>
						<td>$a[APELLIDO]</td>
						<td>$a[EMAIL]</td>
						<td>$a[DNI]</td>
						<td>$a[USUARIO]</td>
						<td>$a[NIVEL]</td>
						<td><a href="modulos/eliminar.php?id=$a[ID]&volver=empleados">Eliminar</a><a href="index.php?cat=editar&id=$a[ID]">Editar</a></td>
					</tr>
datos;
				$a = mysqli_fetch_assoc($empleados);			
				echo $datos;
			}
		?>
</table>
</article>