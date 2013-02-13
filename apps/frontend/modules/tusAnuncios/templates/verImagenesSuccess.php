<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<h1 style="text-align: center;">Imágenes del anuncio</h1>

					<div class="tabla_imagenes">
					<?php foreach($fotografia_anuncios as $fotografia_anuncio): ?>
						<div class="caja-imagen">
                                                    <div onclick="javascript:eliminarImagen('<?php echo url_for('fotografiaAnuncio/delete?id='.$fotografia_anuncio->id) ?>',<?php echo $fotografia_anuncio->id ?>)"
								style="position: absolute; top: 0px; right: 0px; display: none; color: red; background-color: white;">
								<?php echo image_tag('/images/iconos/cross.png',array('style' => 'float: right;'))?>
								<span
									style="padding-top: 3px; padding-left: 5px; display: block; float: right;">Eliminar</span>
							</div>
                                                    
                                                     <!--<div onclick="javascript:editarImagen('<?php // echo url_for('fotografiaAnuncio/edit?id='.$fotografia_anuncio->id) ?>',<?php // echo $fotografia_anuncio->id ?>)"
								style="position: absolute; top: 0px; right: 150px; display: none; color: red; background-color: white;">
								<?php // echo image_tag('/images/iconos/editar.png',array('style' => 'float: left;'))?>
								<span
									style="padding-top: 3px; padding-left: 5px; display: block; float: left;">Editar</span>
							</div>-->
                                                    
							<?php echo image_tag('/uploads/'.$fotografia_anuncio->getFotografia(),array('width' => '200', 'id'=> $fotografia_anuncio->id,'class'=>'imagenPiso')); ?>
						</div>
						<?php endforeach ?>
					</div>
<div id="editar-imagen" style="display: none; z-index: 10; position: absolute; background-color: #3399ff;"></div>
<br></br><br></br><br></br><br></br><br></br><br></br>




<div id="eliminar-comen" style="display: none;"></div><br></br><br></br><br></br>
<form action="<?php echo url_for('fotografiaAnuncio/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('tusAnuncios/index') ?>">Volver a la lista</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Eliminar', 'fotografiaAnuncio/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Está seguro?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php  $form['idAnuncio']->renderLabel() ?></th>
        <td>
          <?php echo $form['idAnuncio']->renderError() ?>
          <?php echo $form['idAnuncio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fotografia']->renderLabel() ?></th>
        <td>
          <?php echo $form['fotografia']->renderError() ?>
          <?php echo $form['fotografia'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
<div style="text-align: right;">
    <a href="<?php echo url_for('default/mostrar?id='.$idAnuncio) ?>"><button style="font-size: 18px;">Finalizar y visualizar</button></a>
</div>
<br></br>
  <script type="text/javascript">
	$(document).ready(function() {
		$('.caja-imagen').each(function() {
			$(this).hover(function() {
				$(this).addClass('hover-borrar-imagen');
				$(this).children('div').show();
			}, function() {
				$(this).removeClass('hover-borrar-imagen');
				$(this).children('div').hide();
			});
		});
		
	});
        
        
            function eliminarImagen(url,idImagen){
                if (confirm("¿Desea eliminar esta imágen?")) {
           $('#eliminar-comen').load(url,{},function() {  
               $('#'+idImagen).hide("slow");
              
        }); 
        
   }
 }
 
             function editarImagen(url,idImagen){
           $('#editar-imagen').load(url,{},function() {  
               $('#editar-imagen').show("slow");
              
        }); 
 }


             function cerrar(){
               $('#editar-imagen').hide("slow");       
 }
</script>

