<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $asunto ?></title>


</head>
    <body style="background-color: #77C0F0;">
<table class="mailBody">
  <tbody>
    <tr>
      <td><img src="<?php echo "http://tusanunciosweb.es/images/frontend/portada.png" ?>"/></td>
    </tr>
    <!--<tr>
      <td class="titulo"><?php //echo html_entity_decode($asunto, ENT_COMPAT , 'UTF-8') ?></td>
    </tr>-->
    <tr>
      <td>
        <center><br><br><br><br></center>
      </td>
    </tr>



    <tr>
      <td>
      	<center><b><?php echo 'Su anuncio será activado en un momento, para poder ver sus anuncios puede entrar en GESTIÓN DE TUS ANUNCIOS' ?></b></center>
      </td>
    </tr>
   <!-- <tr>
      <td>
    <?php //echo 'Para completar el proceso de registro de tu anuncio pulsa en el siguiente enlace. <br />' ?><a href="<?php //echo $url ?>">CONFIRMAR ALTA</a><br />
    <?php  //echo 'Si tu correo no te permite abrir el enlace, pega esto en la dirección web de tu navegador y dale a enter, y en caso de que no funcione inicia sesión con los datos de abajo y activa tu anuncio.' ?>         
            <br />
          <a href="<?php //echo $url ?>"><?php //echo $url; ?></a>
      </td>
    </tr>-->
    <tr>
      <td>
          <a href="http://www.tusanunciosweb.es/tusAnuncios">GESTIÓN DE TUS ANUNCIOS</a><br>
          <?php echo 'Cuando hayas pinchado en el enlace y hayas iniciado sesión, para activar da click en la columna activo del anuncio también puedes dar de alta/modificar/eliminar:' ?><br>
      </td>
    </tr>

    <tr>
      <td>
          <a href="http://www.tusanunciosweb.es/forgotPassword">¿NO RECUERDAS TU CONTRASEÑA?</a><br>
      </td>
    </tr>

      <?php if(strlen($clv)>0){ ?>
          <tr>
             <br /> <br />  
      <td>
      	<center><b><?php echo 'Datos de usuario nuevo' ?></b></center>
      </td>
    </tr>
      
            
    <tr>
      <td>
          <label>Usuario:</label><?php echo " ".$anuncio->correo; ?><br>
          <label>Contraseña:</label><?php echo " ".$clv; ?><br>
      </td>
    </tr>
      <?php } ?>
        


  </tbody>
</table>
<br /> <br />  <br /> <br />
<?php echo 'Un cordial Saludo y gracias por publicar tu anuncio en nuestra web.' ?><br>
<a href="http://www.tusanunciosweb.es/">http://www.tusanunciosweb.es</a>
</body>
</html>
