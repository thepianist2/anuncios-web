<table id="formulario-comentario" style="margin-left: 130px;">
    <tfoot>
      <tr>
        <td colspan="2">
          <div class="enlaces-derecha" style="margin-right: 770px; cursor: pointer;">
              <input  name="Publicar" class="publicar" id="publicar"  type="image" src="<?php echo '/images/frontend/comentar.png'; ?>"><br>Responder Denuncia
          
          </div>
        </td>
      </tr>
    </tfoot>
    <tbody>  
      <tr>
        <th><label for="texto">Respuesta *</label></th>
        <td>
            <textarea class="elm1" id="elm1" name="elm1"  cols="1" rows="5">
	</textarea><br>       
        </td>
      </tr>
    </tbody>
  </table> 
            
<div id="ajax-favoritos"></div>
 <br></br>    <br></br>   <br></br>  
 
 
 <script type="text/javascript">
 $('#publicar').click(function() {
    if(validar()){
        publicar();
    }
    
    }); 
    
    
    function validar(){      
        if($('#elm1').val()==''){
           $().toastmessage('showWarningToast', "Falta la respuesta");
            return false; 
        }        
        return true;
    }
    
    
    function publicar(){
     var publicacion = $('#elm1').val();
    if(publicacion.length<=10){
        alert('La publicación no puede estar en blanco, y tiene que tener un mínimo de 10 caracteres.');
		tinyMCE.activeEditor.focus();
    }else{
        refrescar("<?php echo url_for('denunciaAnuncio/respuesta') ?>");
        }   
    }
    
    
    function refrescar(url){
        var publicacion = $('#elm1').val();
      $('#ajax-favoritos').load(url,{'publicacion':publicacion,'id':'<?php echo  $denuncia_anuncio->id ?>'},function() {
          $('#comentarios').hide("slow");
                $().toastmessage('showSuccessToast', "Respuesta enviada");
                 });

    $('#elm1').val('');
     
    }

</script>