</br>
<h1>Segundo paso: Sube las fotografias de tu anuncio</h1>
</br></br></br></br>
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script type="text/javascript">
// Convert divs to queue widgets when the DOM is ready
$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'gears,flash,silverlight,browserplus,html5',
		url : '<?php echo url_for('fotografiaAnuncio/upload?idAnuncio='.$idAnuncio); ?>',
		max_file_size : '10mb',
		chunk_size : '1mb',
		unique_names : true,

		// Resize images on clientside if we can
		resize : {width : 520, height : 345, quality : 90},

		// Specify what files to browse for
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
		],

		// Flash settings
		flash_swf_url : '/plupload/js/plupload.flash.swf',

		// Silverlight settings
		silverlight_xap_url : '/plupload/js/plupload.silverlight.xap'
	});

	// Client side form validation
	$('form').submit(function(e) {
        var uploader = $('#uploader').plupload('getUploader');

        // Files in queue upload them first
        if (uploader.files.length > 0) {
            // When all files are uploaded submit form
            uploader.bind('StateChanged', function() {
                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                    $('form')[0].submit();
                }
            });
                
            uploader.start();
        } else
            alert('You must at least upload one file.');

        return false;
    });
});
</script>
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


        <table>
           <tr>
                <th></th>
                <td>
                    <div id="uploader">
                        <p>Su navegador no dispone de Flash, Silverlight, Gears, BrowserPlus o soporte HTML5.</p>
                    </div>
                </td>
            </tr>   
            
              </table>
</br></br></br>
<div style="margin-left: 750px;">
    <a class="terminar2" href="<?php echo url_for('fotografiaAnuncio/terminar?idAnuncio='.$idAnuncio) ?>">
<input  name="terminar" class="terminar" id="terminar"  type="image" src="<?php echo '/images/frontend/checkmark.png'; ?>"></br>Todo perfecto
</a>
</div>
</br></br></br>
