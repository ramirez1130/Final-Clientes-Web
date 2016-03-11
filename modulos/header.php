<header>
	<div>
		<h1>Apuntec</h1>
		<nav>
			<ul>
			<?php
			if( isset($_SESSION['login'])){
				nivel($_SESSION['nivel'],$_SESSION['nombre']);
			}else{
				$secciones = mysqli_query($cnx,"SELECT * FROM secciones WHERE ID=1 OR ID=5 OR ID=6 OR ID=7 ORDER BY ID");
				if(isset($_GET['cat'])){
					navegacion($_GET['cat'],$secciones);
				}else{
					navegacion('home',$secciones);
				}
			}
			?>
			</ul>
		</nav>
	</div>
</header>