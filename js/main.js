$(document).ready(function(){
	$("main article:nth-of-type(2) h3:odd").css('text-align','right');
	$("main article:nth-of-type(2) h3").addClass('titulos');
	/*Menu desplegable de opciones del usuario*/
	$(".usuario").on('click',function(){
		if( $('#menu-usuario').length){
			$('.menu-usuario').remove();
		}else{
			var menu = $("<div class='menu-usuario animated slideOutDown' id='menu-usuario'></div>");
			menu.css('width',$('header div nav ul li:last-child').width());
			menu.css('left',$(this).offset().left);
			var top = $('header').height();
			menu.css('top',top);
			$(".usuario").append($(menu));
			$(".menu-usuario").append("<a href='index.php?cat=perfil'>Perfil</a>");
			$(".menu-usuario").append("<a href='modulos/cerrar_sesion.php'>Salir</a>");
		}
	});
});