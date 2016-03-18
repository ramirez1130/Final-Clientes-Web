<header>
	<div>
		<h1>Apuntec</h1>
		<nav>
			<ul>
			<?php
			if( isset($_SESSION['login'])){
				nivel($_SESSION['nivel'],$_SESSION['nombre']);
			}else{
				$sections = mysqli_query($cnx,"SELECT * FROM secciones ORDER BY ID");
				$exist;
				if(isset($_GET['cat'])){
					while( $a = mysqli_fetch_assoc($sections) ){
						$get = strtolower($a['SECCION']);
						if( $a['SECCION'] == "Registrate" ){
							$a['SECCION'] = accentuate($a['SECCION'],3);
						}

						if( $get == $_GET['cat'] ){
							echo parse_utf8("<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>");
							$exist = true;
						}else{
							echo parse_utf8("<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>");
						}
					}
					if( !($exist) ){
						Header("Location:index.php");
					}
				}else{
					while( $a = mysqli_fetch_assoc($sections) ){
						$get = strtolower($a['SECCION']);
						
						if( $a['SECCION'] == "Registrate" ){
							$a['SECCION'] = accentuate($a['SECCION'],3);
						}

						if( $get == 'home' ){
							echo parse_utf8("<li><a href='index.php?cat=$get' class='selected'>$a[SECCION]</a></li>");
						}else{
							echo parse_utf8("<li><a href='index.php?cat=$get'>$a[SECCION]</a></li>");
						}
					}
				}
			}
			?>
			</ul>
		</nav>
	</div>
</header>