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
    <tr>
      <td class="titulo"><?php echo html_entity_decode($asunto, ENT_COMPAT , 'UTF-8') ?></td>
    </tr>
    <tr>
      <td>
      	<center><b><?php echo 'Confirmación de alta de anuncio' ?></b></center>
      </td>
    </tr>
    <tr>
      <td>
      	<center><b><?php echo 'Datos de usuario nuevo' ?></b></center>
      </td>
    </tr>
      
            <?php if(strlen($clv)>0){ ?>
    <tr>
      <td>
          <label>Usuario:</label><?php echo " ".$anuncio->correo; ?><br>
          <label>Contraseña:</label><?php echo " ".$clv; ?><br>
      </td>
    </tr>
      <?php } ?>
    <tr>
      <td>
    <?php echo 'Para completar el proceso de registro de tu anuncio pulsa en el siguiente enlace. <br />' ?><a href="<?php echo $url ?>">Confirmar Alta</a><br />
    <?php  echo 'Si tu correo no te permite abrir el enlace, pega esto en la dirección web de tu navegador y dale a enter.' ?>         
            <br />
          <a href="<?php echo $url ?>"><?php echo $url; ?></a>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>
