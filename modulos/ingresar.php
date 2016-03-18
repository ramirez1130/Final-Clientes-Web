<article id="ingresar" class="contenido-no-home animated slideOutDown">
	<h2>Apuntec</h2>
	<section>
		<?php if(isset($_GET['error'])){echo "<span class='error'>$_GET[error]</span>";} ?>
		<form action="modulos/actions/login.php" method="post" autocomplete="off">
			<div><label><span>Usuario</span><input type="text" name="usuario" autofocus/></label></div>
			<div><label><span>Contraseña</span><input type="password" name="clave"/></label></div>
			<div><input type="submit" value="Ingresar"/></div>
		</form>
	</section>
</article>