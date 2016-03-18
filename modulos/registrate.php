<article class="contenido-no-home animated slideOutDown">
	<h1>Contacto</h1>
	<!--El id que le doy a este formulario es solo para identificarlo en el javascript-->
	<form action="register.php" method="post" id="register">
		<div>
			<label>
				<span>Nombre:</span>
				<input type="text" name="name"/>
			</label>
		</div>
		<div>
			<label>
				<span>Apellido:</span>
				<input type="text" name="lastname"/>
			</label>
		</div>
		<div>
			<label>
				<span>Email:</span>
				<input type="mail" name="email"/>
			</label>
		</div>
		<div>
			<label>
				<span>Dni:</span>
				<input type="number" name="dni"/>
			</label>
		</div>
		<div>
			<label>
				<span>Usuario:</span>
				<input type="text" name="user"/>
			</label>
		</div>
		<div>
			<label>
				<span>Contraseña:</span>
				<input type="password" name="password"/>
			</label>
		</div>
		<div>
			<label>
				<span>Repetir contraseña:</span>
				<input type="text" name="password2"/>
			</label>
		</div>
		<div>
			<input type="reset" value="Vaciar">
			<input type="submit" value="Registrar">
		</div>
	</form>
</article>