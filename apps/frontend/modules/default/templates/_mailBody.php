﻿<html xmlns="http://www.w3.org/1999/xhtml">
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
    <tr>
      <td class="titulo"><?php echo html_entity_decode($asunto, ENT_COMPAT , 'UTF-8') ?></td>
    </tr>
    <tr>
      <td>
      	<center><b><?php echo 'Para confirmar y activar tu anuncio por seguridad inicia sesión en GESTIÓN DE TUS ANUNCIOS Y ACTIVALO' ?></b></center>
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
          <?php echo 'Cuando hayas pinchado en el enlace, para activar da click en la columna activo del anuncio también puedes dar de alta/modificar/eliminar:' ?><br>
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
          <?php echo 'Inicia Sesión en el enlace de abajo para gestionar y activar tus anuncios:' ?><br>
          <a href="http://www.tusanunciosweb.es/tusAnuncios">GESTIÓN DE TUS ANUNCIOS</a>
      </td>
    </tr>
      <?php } ?>
      <br><br><br>
    <tr>
      <td>
          <?php echo 'Un cordial Saludo y gracias por publicar tu anuncio en nuestra web.' ?><br>
      </td>
    </tr>



  </tbody>
</table>
</body>
</html>
