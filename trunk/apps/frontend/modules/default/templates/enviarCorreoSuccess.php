<table id="formulario-comentario<?php echo $anuncio->id ?>" style="">
    <tfoot>
      <tr>
        <td colspan="2">
          <div class="enlaces-derecha" style="margin-right: 750px; cursor: pointer;">
              <input  name="Publicar<?php echo $anuncio->id ?>" class="publicar<?php echo $anuncio->id ?>" id="publicar<?php echo $anuncio->id ?>"  type="image" src="<?php echo '/images/frontend/comentar.png'; ?>"><br>Enviar
          
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
            <textarea class="elm1" id="elm1<?php echo $anuncio->id ?>" name="elm1<?php echo $anuncio->id ?>"  cols="2" rows="5">
	</textarea><br>       
        </td>
      </tr>
    </tbody>
  </table> 
</br></br>
<div id="ajax-favoritos"></div>
<script type="text/javascript">
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
        refrescar("<?php echo url_for('default/nuevoCorreoEnviar') ?>");
        }   
    }
    
    
    function refrescar(url){
        var publicacion = $('#elm1<?php echo $anuncio->id ?>').val();
    var nombre = $('#nombre<?php echo $anuncio->id ?>').val();
    var correo = $('#correo<?php echo $anuncio->id ?>').val();
    var telefono = $('#telefono<?php echo $anuncio->id ?>').val();
      $('#ajax-favoritos').load(url,{'nombre':nombre, 'correo':correo,'telefono':telefono,'publicacion':publicacion,'idAnuncio':'<?php echo  $anuncio->id ?>'},function() {


                $().toastmessage('showSuccessToast', "Email enviado");
                 
     });
    }
    
    </script>