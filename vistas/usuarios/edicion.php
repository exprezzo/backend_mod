
<script src="<?php echo $MOD_WEB_PATH; ?>js/catalogos/<?php echo $_PETICION->controlador; ?>/edicion.js"></script>

<script>			
	$( function(){		
		var config={
			tab:{
				id:'<?php echo $_REQUEST['tabId']; ?>'
			},
			controlador:{
				nombre:'<?php echo $_PETICION->controlador; ?>'
			},
			modulo:{
				nombre:'<?php echo $_PETICION->modulo; ?>'
			},
			catalogo:{
				nombre:'Usuario'
			}
			
		};				
		 var editor=new Edicionusuarios();
		 editor.init(config);		
	});
</script>

	<div class="pnlIzq">
		<?php 	
			global $_PETICION;
			$this->mostrar('/componentes/toolbar');	
			if (!isset($this->datos)){		
				$this->datos=array();		
			}
		?>
		
		<form class="frmEdicion" style="padding-top:10px;">	
			<input type="hidden" name="id" class="txtId" value="<?php echo $this->datos['id']; ?>" />	
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">nick:</label>
			<input type="text" name="nick" class="txt_nick" value="<?php echo $this->datos['nick']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">pass:</label>
			<input type="text" name="pass" class="txt_pass" value="<?php echo $this->datos['pass']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">email:</label>
			<input type="text" name="email" class="txt_email" value="<?php echo $this->datos['email']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">rol:</label>
			<input type="text" name="rol" class="txt_rol" value="<?php echo $this->datos['rol']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fbid:</label>
			<input type="text" name="fbid" class="txt_fbid" value="<?php echo $this->datos['fbid']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">name:</label>
			<input type="text" name="name" class="txt_name" value="<?php echo $this->datos['name']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">picture:</label>
			<input type="text" name="picture" class="txt_picture" value="<?php echo $this->datos['picture']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">originalName:</label>
			<input type="text" name="originalName" class="txt_originalName" value="<?php echo $this->datos['originalName']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
