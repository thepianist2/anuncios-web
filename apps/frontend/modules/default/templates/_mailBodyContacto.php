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
          <center><b><?php echo 'Solicitud de contacto de tu anuncio: ' ?><a href="<?php echo url_for(array('module'   => 'default','action'   => 'show','id'=> $anuncio->id,'provincia'  => $anuncio->getProvinciaAnuncio()->getTexto(),'titulo' => $anuncio->titulo)) ?>"></a><?php echo $anuncio->titulo ?></b></center>
      </td>
    </tr>
    <tr>
      <td>
      	<center><b><?php echo 'Detalles de persona que ha contactado con usted:' ?></b></center>
      </td>
    </tr>
      
 
    <tr>
      <td>
          <label>Nombre</label><?php echo $nombre; ?><br>
          <label>Correo:</label><?php echo $correo; ?><br>
              <?php if($telefono){ ?>
          <label>Teléfono:</label><?php echo $telefono; ?><br>
              <?php } ?>
              <label>Mensaje:</label><br>
          <?php echo html_entity_decode($publicacion, ENT_COMPAT , 'UTF-8') ?><br>
      </td>
    </tr>


  </tbody>
</table>
</body>
</html>
