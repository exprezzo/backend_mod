<?php
if ( !isset($_SESSION['isLoged'])|| $_SESSION['isLoged']!=true ){	
	header ('Location: '.$APP_PATH.$_PETICION->modulo.'/user/login'); exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="us">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $APP_CONFIG['nombre']; ?></title>
	<!--jQuery References-->
	
	
	<script src="<?php echo $_APP_PATH; ?>web/libs/jquery-1.8.3.js"></script>
	<script src="<?php echo $_APP_PATH; ?>web/libs/jquery-ui-1.9.2.custom/jquery-ui-1.9.2.custom.js"></script>  
	
	
	<!--Theme-->
	
	<?php 
		global $_TEMAS;
		//$rutaTema=$_TEMAS[TEMA];
		
		$rutaTema=getUrlTema('artic');
		$rutaTema=getUrlTema($APP_CONFIG['tema']);
		
		$rutaMod=$APP_URL_BASE.'web/<?php echo $_PETICION->modulo; ?>/css/mods/black-tie/black-tie.css';
	?>
	
	
	<link href="<?php echo $rutaTema; ?>" rel="stylesheet" type="text/css" />
	<!--link href="<?php //echo $rutaMod; ?>" rel="stylesheet" type="text/css" /-->
	
	
	
	<!--Wijmo Widgets CSS-->	
	<link href="<?php echo $_APP_PATH; ?>web/libs/Wijmo.2.3.2/Wijmo-Complete/css/jquery.wijmo-complete.2.3.2.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_APP_PATH; ?>web/libs/Wijmo.2.3.2/Wijmo-Open/css/jquery.wijmo-open.2.3.2.css" rel="stylesheet" type="text/css" />			
	<!--link href="/css/themes/blitzer/jquery-ui-1.9.2.custom.css" rel="stylesheet"-->	
	<!--Wijmo Widgets JavaScript-->
	<script src="<?php echo $_APP_PATH; ?>web/libs/Wijmo.2.3.2/Wijmo-Complete/js/jquery.wijmo-complete.all.2.3.2.js" type="text/javascript"></script>
	<script src="<?php echo $_APP_PATH; ?>web/libs/Wijmo.2.3.2/Wijmo-Open/js/jquery.wijmo-open.all.2.3.2.js" type="text/javascript"></script>		
	<!-- Gritter -->
	<link href="<?php echo $_APP_PATH; ?>web/libs/Gritter-master/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $_APP_PATH; ?>web/libs/Gritter-master/js/jquery.gritter.min.js" type="text/javascript"></script>
	
	
	<script src="<?php echo $_APP_PATH; ?>web/libs/shortcut.js"></script>  
	
	<link href="<?php echo $MOD_WEB_PATH; ?>css/estilos.css" rel="stylesheet" type="text/css" />	
	<link href="<?php echo $_APP_PATH.$_PETICION->modulo; ?>/backend/cssmenu" rel="stylesheet" type="text/css" />
	
	<script src="<?php echo $MOD_WEB_PATH; ?>js/funciones.js" type="text/javascript"></script>
	<script src="<?php echo $MOD_WEB_PATH; ?>js/TabManager.js" type="text/javascript"></script>
	<script src="<?php echo $MOD_WEB_PATH; ?>js/navegacion_en_tabla.js" type="text/javascript"></script>
	<script src="<?php echo $MOD_WEB_PATH; ?>js/navegacion_en_tabla_agrupada.js" type="text/javascript"></script>
	
	<script type="text/javascript">		
		kore={
			modulo:'<?php echo $_PETICION->modulo; ?>',
			controlador:'<?php echo $_PETICION->controlador; ?>',
			accion:'<?php echo $_PETICION->accion; ?>',
			url_base:'<?php echo $APP_URL_BASE; ?>',
			mod_url_base:'<?php echo $APP_URL_BASE.$_PETICION->modulo.'/'; ?>',
			decimalPlacesMoney:2
			// dafault:{
				// modulo:
				// controlador:
				// accion:
			// }			
		};
		
		salir=function(){		
			window.location=kore.mod_url_base+'usuarios/logout';
		}
		$(function () {
		
			shortcut.add("Ctrl+Alt+C", 
				function() { 
					TabManager.add(kore.mod_url_base+'catalogos/busqueda','Menu',0);
					
				}, 
				{ 'type':'keydown', 'propagate':false, 'target':document}
			);
			
			shortcut.add("Ctrl+Alt+M", 
				function() { 
					TabManager.add(kore.mod_url_base+'/backend/menu','Menu');
					
				}, 
				{ 'type':'keydown', 'propagate':false, 'target':document}
			);
			
			shortcut.add("Ctrl+Alt+G", 
				function() { 
					var tab=$('#tabs > div[aria-hidden="false"]');
					var tabObj = tab.data('tabObj');
					if (tabObj!=undefined && tabObj.guardar!=undefined){
						tabObj.guardar();
					}
					
				}, 
				{ 'type':'keydown', 'propagate':false, 'target':document}
			);
			
			shortcut.add("Ctrl+S", 
				function() { 
					var tab=$('#tabs > div[aria-hidden="false"]');
					var tabObj = tab.data('tabObj');
					if (tabObj!=undefined && tabObj.guardar!=undefined){
						tabObj.guardar();
					}
					
				}, 
				{ 'type':'keydown', 'propagate':false, 'target':document} 
			);  
			
			
			
			shortcut.add("Ctrl+Alt+W", 
				function() { 
					//busca el tab seleccionado
					var tab=$('#tabs > div[aria-hidden="false"]');
					var idTab=tab.attr('id');					
					var tabs=$('#tabs > div');
					for(var i=0; i<tabs.length; i++){
						if ( $(tabs[i]).attr('id') == idTab ){
							$('#tabs').wijtabs('remove', i);
						}
					}
					
					
				}, 
				{ 'type':'keydown', 'propagate':false, 'target':document} 
			); 
			
			
			
			shortcut.add("Ctrl+Alt+N", 
				function() { 
					var tab=$('#tabs > div[aria-hidden="false"]');
					var tabObj = tab.data('tabObj');
					if (tabObj!=undefined && tabObj.nuevo!=undefined){
						tabObj.nuevo();
					}
					
				}, 
				{ 'type':'keydown', 'propagate':false, 'target':document} 
			); 
			
			shortcut.add("Ctrl+Alt+B", 
				function() { 
					var tab=$('#tabs > div[aria-hidden="false"]');
					var tabObj = tab.data('tabObj');
					if (tabObj!=undefined && tabObj.borrar!=undefined){
						tabObj.borrar();
					}
					
					if (tabObj!=undefined && tabObj.eliminar!=undefined){						
					}
					
				}, 
				{ 'type':'keydown', 'propagate':false, 'target':document} 
			); 
			
			$.extend($.gritter.options, { 
				position: 'bottom-right', // defaults to 'top-right' but can be 'bottom-left', 'bottom-right', 'top-left', 'top-right' 
				fade_in_speed: 'medium', // how fast notifications fade in (string or int)
				fade_out_speed: 2000, // how fast the notices fade out
				time: 6000 // hang on the screen for...
			});
			
			TabManager.init('#tabs');
			
			//Agregar opcion para salir
			
			ajustarTab(); //Ajusta la altura al tama�o en relacion al tama�o de la pantalla
			iniciarLinkTabs(); //A los objetos con atributo linkTab=true,  se les agrega comportamiento ajax para abrir tabs.
			
			// TabManager.add('/'+kore.modulo+'/general/welcome','Bienvenido');
			// TabManager.add('/'+kore.modulo+'/pedidoi/verlista','Busqueda');
			// TabManager.add('/'+kore.modulo+'/orden_compra/index','Orden de Compra',1,'');			
			// TabManager.add('/'+kore.modulo+'/pedidoi/verlista','Nuevo');			 
			 // TabManager.add('/'+kore.modulo+'/catalogos/busqueda','Busqueda',0);
			 TabManager.add(kore.mod_url_base+'backend/menu','Menu',0,'tabMenu');
			
			
			<?php 
			
			foreach($this->catalogos as $cat){
				// echo 'TabManager.add(\'/\'+kore.modulo+\'/'.$cat['controlador'].'/busqueda\',\'Busqueda\',0);';
			}
			?>
			// TabManager.add('/'+kore.modulo+'/series/busqueda','Busqueda',0);
			// TabManager.add('/'+kore.modulo+'/estadopedidos/busqueda','Busqueda',0);
			// TabManager.add('/'+kore.modulo+'/stocks/busqueda','Busqueda',0);
			// TabManager.add('/'+kore.modulo+'/productos/busqueda','Busqueda',0);
			// TabManager.add('/'+kore.modulo+'/catalogos/busqueda','Busqueda',0);
						
			//TabManager.add('/'+kore.modulo+'/'+kore.controlador+'/'+kore.accion+'/');
			
			//TabManager.add('/'+kore.modulo+'/pedidoi/pedido');
			//TabManager.add('/'+kore.modulo+'/pedidoi/editar/580');
			//$('#tabs > ul').append('');
			
			$(window).resize( function() {
			  ajustarTab();
			});
			
			$('.user_widget a').mouseenter(function(){
				$(this).addClass('ui-state-hover');
			});			
			$('.user_widget a').mouseleave(function(){
				$(this).removeClass('ui-state-hover');
			});
			
			$('.header_empresa').mouseenter(function(){
				$(this).addClass('ui-state-hover');
			});
			$('.header_empresa').mouseleave(function(){
				$(this).removeClass('ui-state-hover');
			});
			
			//$("#splitter").wijsplitter({ orientation: "horizontal" });
			
			 $(".accesos_directos").wijcarousel({
                display: 12,
                step: 4,
                orientation: "horizontal"
            });			
			
			$('.link-salir').mouseenter(function(){
				$(this).addClass('ui-state-hover');
			});
			$('.link-salir').mouseleave(function(){
				$(this).removeClass('ui-state-hover');
			});
		});
		
		
	</script>
	<style type="text/css">		
		@media only screen and (max-width: 999px) {	  } 									/* rules that only apply for canvases narrower than 1000px */
		@media only screen and (device-width: 768px) and (orientation: landscape) {} 		/* rules for iPad in landscape orientation */
		@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {}	/* iPhone, Android rules here */		
		.link{cursor:pointer;}
		.ui-tabs .ui-tabs-nav{	/* border-bottom:0; */	}
		 /*.ui-tabs .ui-tabs-hide {display: inline-block !important;}		*/
		 .tbPedido.ui-tabs-hide {display: inline-block !important;}		
		.main_header{display: none;width: 100%;border: 0;}
		
		.wijmo-wijsplitter-h-panel1.ui-resizable{
				transition:height .5s;
				-moz-transition:height .5s; 			/* Firefox 4 */
				-webkit-transition:height .5s; 			/* Safari and Chrome */
				-o-transition:height .5s; 				/* Opera */					
		}
		
		.eliminado td{
			background-color:#F9DADA !important;
		}
		#tabs > ul > li.ui-state-active{
			background: #ffe475 url(images/ui-bg_inset-hard_100_ffe475_1x100.png) bottom repeat-x !important;
		}
	</style>	
</head>
<body style="padding:0; margin:0;" class="" >	
	
		<div id="tabs">
			 <ul>			
			</ul>		
		</div>	
		
		<div class="ui-state-default link-salir" style=""><a onclick="salir()" href="#" >Salir</a></div>			
</body>
</html>