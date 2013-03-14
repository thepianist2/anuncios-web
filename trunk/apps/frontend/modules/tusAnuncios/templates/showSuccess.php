<?php use_helper('Date') ?>
<style>

ol {
	margin: 0;
	padding: 0;
	list-style: none;
}

.comentario {
	float: left; /* float contenedor */
	width: 580px;
	margin: 0 0 20px 0;
        margin-left: 80px;
	
}

.comentario-meta {
	float: left;
	width: 100px;
	font-size: 84%;
	text-align: center;
	text-shadow: 1px 1px 0 hsla(0,0%,0%,.9);
}

.comentario-meta img {
-moz-transform: rotate(-5deg);
-o-transform: rotate(-5deg);
-webkit-transform: rotate(-5deg);
transform: rotate(-5deg);
}

h4 {
	margin: 0;
	font-size: 100%;
	color:#FF3;
	font-weight: bold;
	line-height: 1;
}

.comentario-meta span {
	font-size: 84%;
	color: #fff;
	font-weight:bold;
}

blockquote {
	position: relative;
	min-height: 20px;
	margin: 0 0 0 100px;
	padding: 5px 5px 5px 5px;
	-moz-border-radius: 0px;
	-webkit-border-radius: 20px;
	border-radius: 20px;
	border-top: 1px solid #fff;
	background-color: hsla(39, 90%, 50%, .5);
	background-image: -moz-linear-gradient(hsla(0,0%,100%,.6),hsla(0,0%,100%,0) 30px );
	background-image: -webkit-gradient(linear,0 0, 0 30,from(hsla(0,0%,100%,.6)),to(hsla(0,0%,100%,0)));
	-moz-box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);
    -webkit-box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);
    box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);		
	word-wrap:break-word;
		
}

blockquote p {
	margin: 0;
	padding: 0 0 10px 0;
}




blockquote:hover {
top: -2px;
left: -2px;
-moz-box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
-webkit-box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
text-shadow: 3px 1px 1px hsla(0,0%,100%,.8);
}


.elm1{
    width: 600px;
}
.comentario-meta :hover{
    	-moz-transform: scale(1.8, 1.8);
	-webkit-transform: scale(1.8, 1.8);
	-o-transform: scale(1.8, 1.8);
}



blockquote:after {
	content: "\00a0";
	display: block;
	position: absolute;
	top: 20px;
	left: -20px;
    width: 0;
    height: 0;
	border-width: 10px 20px 10px 0;
	border-style: solid;
	border-color: transparent hsla(39, 90%, 50%, .5);
}
</style>
<script type="text/javascript">
//	tinyMCE.init({
//		mode : "textareas",
//		theme : "simple"
//	});
        
               //cargamos el mapa
$(document).ready(function() {
        
});
        
            </script>
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
        <?php $cont=0; ?>
<?php if(count($imagenes)>0){?>

var mygallery=new simpleGallery({
	wrapperid: "simplegallery<?php echo $anuncio->id ?>", //ID of main gallery container,
	dimensions: [530, 355], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
       imagearray: [
            <?php foreach ($imagenes as $imagen) { $cont+=1;  ?>
                    <?php if($cont==count($imagenes)){ ?>
		["<?php echo '/uploads/'.$imagen->getFotografia() ?>", "<?php echo '/uploads/'.$imagen->getFotografia() ?>", "_new", "<?php echo $imagen->getDescripcion(); ?>"]
                        <?php }else{ ?>
		["<?php echo '/uploads/'.$imagen->getFotografia() ?>", "<?php echo '/uploads/'.$imagen->getFotografia() ?>", "_new", "<?php echo $imagen->getDescripcion(); ?>"],
                    <?php } } ?>
                        
                       
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
</br></br>
    
   

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
<div id="comentarios<?php echo $anuncio->id ?>">
    
    <?php $comentarios=Doctrine_Core::getTable('comentario')->obtenerComentariosById($anuncio->id); ?>

    <?php foreach ($comentarios as $comentario) { ?>
    
<ol id="<?php echo $comentario->id ?>">
    <li class="comentario">

           <div class="comentario-meta" title="<?php echo $comentario->getNombre() ?>">

           <img src="<?php echo '/images/iconos/contactos.png'; ?>" width="45" height="45" alt="">     

         
 
     	<h4><?php echo $comentario->getNombre() ?></h4>
        <h4><?php echo $comentario->getTelefono() ?></h4>
            <h4><?php echo $comentario->getCorreo() ?></h4>
     	<h4><?php echo $comentario->getCreatedAt();  ?></h4>          
      </div>
   
      <blockquote>

         <p><?php echo nl2br(html_entity_decode($comentario->getTexto(), ENT_COMPAT , 'UTF-8')); ?></p>
</blockquote>
   </li>
</ol>
<?php } ?>

 </div>
 




        
<table id="formulario-comentario<?php echo $anuncio->id ?>" style="margin-left: 130px;">
    <tfoot>
      <tr>
        <td colspan="2">
          <div class="enlaces-derecha" style="margin-right: 770px; cursor: pointer;">
              <input  name="Publicar<?php echo $anuncio->id ?>" class="publicar<?php echo $anuncio->id ?>" id="publicar<?php echo $anuncio->id ?>"  type="image" src="<?php echo '/images/frontend/comentar.png'; ?>"><br>Comentar
          
          </div>
        </td>
      </tr>
    </tfoot>
    <tbody>  
              <tr>
        <th><label for="nombre<?php echo $anuncio->id ?>">Nombre *</label></th>
        <td>
                    <input size="40" type="text" name="nombre<?php echo $anuncio->id ?>" id="nombre<?php echo $anuncio->id ?>">        </td>
      </tr>
      <tr>
        <th><label for="correo<?php echo $anuncio->id ?>">Correo *</label></th>
        <td>
                    <input size="40" type="text" name="correo<?php echo $anuncio->id ?>" id="correo<?php echo $anuncio->id ?>">        </td>
      </tr>
      <tr>
        <th><label for="telefono<?php echo $anuncio->id ?>">Teléfono</label></th>
        <td>
                    <input size="40" type="text" name="telefono<?php echo $anuncio->id ?>" id="telefono<?php echo $anuncio->id ?>">        </td>
      </tr>
      <tr>
        <th><label for="texto<?php echo $anuncio->id ?>">Comentario *</label></th>
        <td>
            <textarea class="elm1" id="elm1<?php echo $anuncio->id ?>" name="elm1<?php echo $anuncio->id ?>"  cols="1" rows="5">
	</textarea><br>       
        </td>
      </tr>
    </tbody>
  </table> 
            

 <br></br>    <br></br>   <br></br>     


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

$('#publicar<?php echo $anuncio->id ?>').click(function() {
    if(validar()){
        publicar();
    }
    
    }); 
    
    
    function validar(){
        if($("#correo<?php echo $anuncio->id ?>").val() == '')
        {
            $().toastmessage('showWarningToast', "Falta el Email");
            return false;
        }else if(!validar_email($("#correo<?php echo $anuncio->id ?>").val()))
        {
            $().toastmessage('showWarningToast', "El Email no es valido");
            return false;
        }
        if($('#nombre<?php echo $anuncio->id ?>').val()==''){
           $().toastmessage('showWarningToast', "Falta el Nombre");
            return false; 
        }
        if($('#telefono<?php echo $anuncio->id ?>').val()!=''){
            if (isNaN($('#telefono<?php echo $anuncio->id ?>').val())) 
            {
                         $().toastmessage('showWarningToast', "El teléfono debe ser numérico");
            return false; 
            }

        }        
        if($('#elm1<?php echo $anuncio->id ?>').val()==''){
           $().toastmessage('showWarningToast', "Falta el Comentario");
            return false; 
        }        
        return true;
    }
    
    
    function publicar(){
     var publicacion = $('#elm1<?php echo $anuncio->id ?>').val();
    var nombre = $('#nombre<?php echo $anuncio->id ?>').val();
    var correo = $('#correo<?php echo $anuncio->id ?>').val();
    var telefono = $('#telefono<?php echo $anuncio->id ?>').val();
    if(publicacion.length<=10){
        alert('La publicación no puede estar en blanco, y tiene que tener un mínimo de 10 caracteres.');
		tinyMCE.activeEditor.focus();
    }else{
        refrescar("<?php echo url_for('comentario/nuevo') ?>");
        }   
    }
    
    
        function validar_email(valor)
    {
        // creamos nuestra regla con expresiones regulares.
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        // utilizamos test para comprobar si el parametro valor cumple la regla
        if(filter.test(valor))
            return true;
        else
            return false;
    }
    
    
    function refrescar(url){
        var publicacion = $('#elm1<?php echo $anuncio->id ?>').val();
    var nombre = $('#nombre<?php echo $anuncio->id ?>').val();
    var correo = $('#correo<?php echo $anuncio->id ?>').val();
    var telefono = $('#telefono<?php echo $anuncio->id ?>').val();
      $('#ajax-favoritos').load(url,{'nombre':nombre, 'correo':correo,'telefono':telefono,'publicacion':publicacion,'idAnuncio':'<?php echo  $anuncio->id ?>'},function() {
          $('#comentarios<?php echo $anuncio->id ?>').hide("slow");
                        $('#comentarios<?php echo $anuncio->id ?>').load('<?php  echo url_for('comentario/index?idAnuncio='.$anuncio->id) ?>',{},function() {
                $('#comentarios<?php echo $anuncio->id ?>').show("slow");
//                $('#formulario-comentario<?php // echo $anuncio->id ?>').hide("slow");
                $().toastmessage('showSuccessToast', "Comentario guardado");
                 });
     });
    }





</script>