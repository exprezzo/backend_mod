<?php
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/catalogo_modelo.php';
require_once $APPS_PATH.$_PETICION->modulo.'/modelos/modulo_modelo.php';

class backend extends Controlador{
	function index($vistaFile=''){
		$vista= $this->getVista();
		$catMod = new CatalogoModelo();
		$params=array(
			'start'=>0,
			'limit'=>1000
		);
		$res=$catMod->buscar( $params );
		$vista->catalogos=$res['datos'];		
		return $vista->mostrar( );
	}
	function cssmenu(){
		header("Content-type: text/css");
		$catMod = new CatalogoModelo();
		$params=array(
			'start'=>0,
			'limit'=>1000
		);
		$res=$catMod->buscar( $params );
		foreach($res['datos'] as $cat){
			echo 'ul.ui-tabs-nav li a.tab_'.$cat['controlador'].'{ background-image:url("'.$cat['icono'].'"); } ';
		}
		exit;
		
	}
	function menu($vistaFile=''){
		$vista= $this->getVista();
	//--- MOdulos
		$catMod = new ModuloModelo();
		$params=array(
			'start'=>0,
			'limit'=>1000
		);
		$res=$catMod->buscar( $params );
		$modulos=$res['datos'];
		
		
	//Catalogos
		$catMod = new CatalogoModelo();
		for($i=0; $i<sizeof($modulos) ; $i++ ){
			$filtros=array(	);
			$filtros[]=array(
				'dataKey'=>'fk_modulo',
				'filterValue'=>$modulos[$i]['id'],
				'filterOperator'=>'equals'
			);
			
			$params=array(
				'start'=>0,
				'limit'=>1000,
				'filtros'=>$filtros				
			);
			$res=$catMod->buscar( $params );				
			$modulos[$i]['catalogos']=$res['datos'];			
		}
		$vista->modulos=$modulos;
		// print_r( $modulos ); exit;
		
	//-- Fin	
		
		return $vista->mostrar( );
	}
}
?>