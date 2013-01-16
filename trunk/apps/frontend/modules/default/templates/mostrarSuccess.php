<?php use_helper('Date') ?>
<style type="text/css">

/*Make sure your page contains a valid doctype at the top*/
#simplegallery1{ 
position: relative; /*keep this intact*/
visibility: hidden; /*keep this intact*/
border: 2px solid #CCC;
margin-left: 200px;
}

.simplegallery1{ 
position: relative; /*keep this intact*/
visibility: hidden; /*keep this intact*/
border: 2px solid #CCC;
margin-left: 200px;
}

#simplegallery1 .gallerydesctext{ 
text-align: left;
padding: 2px 5px;
}

</style>
<?php $imagenes=$anuncio->getFotografiaAnuncio(); ?>
<script type="text/javascript">
<?php if(count($imagenes)>0){?>

var mygallery=new simpleGallery({
	wrapperid: "simplegallery<?php echo $anuncio->id ?>", //ID of main gallery container,
	dimensions: [530, 355], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
       imagearray: [
            <?php foreach ($imagenes as $imagen) { ?>
		["<?php echo '/uploads/'.$imagen->getFotografia() ?>", "<?php echo '/uploads/'.$imagen->getFotografia() ?>", "_new", "<?php echo $imagen->getDescripcion(); ?>"],
                    <?php  } ?>
                        
                       
	],
	autoplay: [true, 3000, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})
<?php } ?>
</script>
<br><br><h1 style="text-align: center;"><?php echo ucfirst($anuncio->getTitulo()); ?></h1></br>
<div>
    
<!--    <h3><?php //echo "Precio: ". number_format($anuncio->getPrecio(), 1, ',', '.').'€' ?></h3></br> -->
    <div>
        <div style="float: left; width: 150px; margin-left: 40px; text-align: left;">
            <h3 class="description">Anunciante:</h3><?php echo $anuncio->getTipo(); ?>    </br> </br> 
            <h3 class="description">Categoría:</h3><?php echo $anuncio->getCategoriaAnuncio()->getTexto(); ?>    </br> </br> 
            <h3 class="description">Fecha Inicio:</h3><?php echo format_date($anuncio->getFechaInicio(), 'r') ?>    </br>  </br> 
            <h3 class="description">Fecha Fin:</h3><?php echo format_date($anuncio->getFechaFin(), 'r') ?>    <br> </br>  <br> </br></br> </br> 
            <div id="estadistica">
            <h3 class="description">Visitas:</h3><?php echo $anuncio->getVisitas() ?>    </br> 
            </div>
        </div>
        <?php if(count($imagenes)>0){ ?>
        <div class="simplegallery1" id="simplegallery<?php echo $anuncio->id ?>" style="margin-left: 230px;"></div>
<br></br>
<?php }else{ ?>

       <div style="width: 530px; position: relative;border: 2px solid #CCC; margin-left: 230px;">
              <img width="530" class="lazy" src="<?php echo '/images/no-foto.png' ?>" alt="<?php echo $anuncio->getTitulo() ?>" title="<?php echo $anuncio->getTitulo() ?>" border="0" style="display: inline-block;"> 
          </div>   
<br></br>


<?php } ?>
        <div style="float: right; width: 150px; margin-top: -385px; margin-right: 40px; text-align: left;">    
            <h3 class="description">Tipo anuncio:</h3><?php echo $anuncio->getTipoAnuncio(); ?>    </br> </br> 
            <h3 class="description">Creado en: </h3><?php echo format_date($anuncio->getCreatedAt(), 'r') ?></br></br> 
            <h3 class="description">Última actualización:</h3><?php echo format_date($anuncio->getUpdatedAt(), 'r') ?>    </br> </br> 
            <h3 class="description">Provincia:</h3><?php echo $anuncio->getProvinciaAnuncio()->getTexto(); ?>    </br></br> 
            <h3 class="description">Localidad:</h3><?php echo $anuncio->getLocalidad(); ?>    </br></br> 
            <h3 class="description">Código postal:</h3><?php echo $anuncio->getCodigoPostal(); ?>    <br> </br> 
            <div id="estadistica">
            <h3 class="description">Votos positivos:</h3><?php echo $anuncio->getVotopositivo() ?></br> </br> 
            <h3 class="description">Votos negativos:</h3><?php echo $anuncio->getVotonegativo() ?></br> 
            </div>
        </div>
 
<!--    <?php //echo "Efectividad: ". $anuncio->getEfectividadAnuncio(); ?>    </br> -->
<br></br>
<?php if(strlen($anuncio->getDescripcion())>5){ ?>
<h3 class="description">Descripción:</h3><br></br>
    <div>

       <?php echo nl2br(html_entity_decode($anuncio->getDescripcion(), ENT_COMPAT , 'UTF-8')); ?>

    </div>
   <?php  } ?>
       <br></br>
       <?php if(strlen($anuncio->getEnlaceVideo())>5){ ?>
<h3 class="description">Vídeo:</h3><br></br>
            
                  <?php
      //poner tamaño a 400 por 250
      //obtenemos la posicion de width
      $posicionCadenaWidth=strpos($anuncio->getEnlaceVideo(), "width=") ;
      $posicionCadenaHeight=strpos($anuncio->getEnlaceVideo(), "height=") ;
      //vamos a la posicion de width y obtenemos todo el width completo
      $variableWidth=substr($anuncio->getEnlaceVideo(), $posicionCadenaWidth, 22) ;
      $variableHeight=substr($anuncio->getEnlaceVideo(), $posicionCadenaHeight, 22) ;
      //variable de cadena para reemplazar
      $reemplazoWidth="width=\"400\"";
      $reemplazoHeight="height=\"250\"";
      //reemplazamos variable width con todo por otro texto con el tamaño indicado
      $codigo=str_replace($variableWidth,$reemplazoWidth,$anuncio->getEnlaceVideo()) ;
      $codigo=str_replace($variableHeight,$reemplazoHeight,$codigo) ;
      ?>
      <td><?php 
      //si la longitud de string es mayor de 40 entonces es un iframe,sino no es nada.
      if(strlen($codigo)>40){
          echo nl2br(html_entity_decode($codigo, ENT_COMPAT , 'UTF-8')); 
      }else{
          echo "";
      }
      ?>


    </div>
       <?php  } ?>
    </div>

    
   
</div>
<div class="enlaces-derecha">
   <?php
	
					$imagen_fav = '<a id="icono_activo_' . $anuncio->id . '" href="javascript:void()" ';
						$imagen_fav .= ' onmouseover=document.getElementById("imagen_activo_' . $anuncio->id . '").src="' . image_path('frontend/voto_positivo.png') . '"';
						$imagen_fav .= ' onmouseout=document.getElementById("imagen_activo_' . $anuncio->id . '").src="' . image_path('frontend/voto_positivo_inactivo.png') . '"';
						$imagen_fav .= '>';
                                                $imagen_fav .= '<br>';
						$imagen_fav .= image_tag('frontend/voto_positivo_inactivo.png', array("alt" => 'Pulse para dar un voto positivo',
                                        "id" => "imagen_activo_" . $anuncio->id,
                                        "title" => 'Pulse para dar un voto positivo',
                                        "class" => 'favoritos',                           
                                        "onclick" => 'javascript:switchPositivo("' . url_for('default/switchPositivo?id='.$anuncio->id.'&variable=positivo') . '","' . image_path('frontend/voto_positivo.png') . '",' . $anuncio->id . ')',
						));
					
					$imagen_fav .= '</a>';
					echo $imagen_fav;
				?> 
    <?php
	
					$imagen_fav = '<a id="icono_negativo_' . $anuncio->id . '" href="javascript:void()" ';
						$imagen_fav .= ' onmouseover=document.getElementById("imagen_negativo_' . $anuncio->id . '").src="' . image_path('frontend/voto_negativo.png') . '"';
						$imagen_fav .= ' onmouseout=document.getElementById("imagen_negativo_' . $anuncio->id . '").src="' . image_path('frontend/voto_negativo_inactivo.png') . '"';
						$imagen_fav .= '>';
                                                $imagen_fav .= '<br>';
						$imagen_fav .= image_tag('frontend/voto_negativo_inactivo.png', array("alt" => 'Pulse para dar un voto negativo',
                                        "id" => "imagen_negativo_" . $anuncio->id,
                                        "title" => 'Pulse para dar un voto negativo',
                                        "class" => 'favoritos',                           
                                        "onclick" => 'javascript:switchNegativo("' . url_for('default/switchPositivo?id='.$anuncio->id.'&variable=negativo') . '","' . image_path('frontend/voto_negativo.png') . '",' . $anuncio->id . ')',
						));
					
					$imagen_fav .= '</a>';
					echo $imagen_fav;
				?>

</div>

<div class="enlaces-centro">
    <form style="margin-left: 170px;" action="<?php echo url_for('comentario/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;
          <div class="enlaces-derecha" style="margin-right: 150px;">
          <input type="submit" value="Comentar" />
          </div>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
        <?php  echo $form['_csrf_token'] ?>
        <?php  echo $form[$form->getCSRFFieldName()]->render() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['correo']->renderLabel() ?></th>
        <td>
          <?php echo $form['correo']->renderError() ?>
          <?php echo $form['correo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono']->renderError() ?>
          <?php echo $form['telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['texto']->renderLabel() ?></th>
        <td>
          <?php echo $form['texto']->renderError() ?>
          <?php echo $form['texto'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
 <br></br>    <br></br>   <br></br>     
</div>

<br></br><br></br>
<div id="ajax-favoritos"></div>
<script type="text/javascript">
function switchPositivo(url,imagen,id_inmueble)
{
            $('#ajax-favoritos').load(url,{},function() {
                $('#imagen_activo_'+id_inmueble).attr('src',imagen);
//                $('#icono_activo_'+id_inmueble).attr('onmouseover','');
//                $('#icono_activo_'+id_inmueble).attr('onmouseout','');
                $('#imagen_activo_'+id_inmueble).attr('title','Ya has votado');
                $('#imagen_activo_'+id_inmueble).attr('alt','Ya has votado');
                $('#imagen_negativo_'+id_inmueble).attr('title','Ya has votado');
                $('#imagen_negativo_'+id_inmueble).attr('alt','Ya has votado');                
                $('#imagen_activo_'+id_inmueble).attr('onclick','');
                $('#imagen_negativo_'+id_inmueble).attr('onclick','');
                
            });
            $().toastmessage('showSuccessToast', "Voto positivo realizado");
}


function switchNegativo(url,imagen,id_inmueble)
{
            $('#ajax-favoritos').load(url,{},function() {
                $('#imagen_negativo_'+id_inmueble).attr('src',imagen);
//                $('#icono_negativo_'+id_inmueble).attr('onmouseover','');
//                $('#icono_negativo_'+id_inmueble).attr('onmouseout','');
                $('#imagen_negativo_'+id_inmueble).attr('title','Ya has votado');
                $('#imagen_negativo_'+id_inmueble).attr('alt','Ya has votado');
                 $('#imagen_activo_'+id_inmueble).attr('title','Ya has votado');
                $('#imagen_activo_'+id_inmueble).attr('alt','Ya has votado');
                $('#imagen_negativo_'+id_inmueble).attr('onclick','');
                $('#imagen_activo_'+id_inmueble).attr('onclick','');
                
            });
            $().toastmessage('showSuccessToast', "Voto negativo realizado");
}

</script>