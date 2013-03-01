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
        <td><h3>Referente a la denuncia: </h3></td></br>
        <td><?php echo html_entity_decode($razon, ENT_COMPAT , 'UTF-8') ?></td></br></br>
        <td><h3>Hemos respondido: </h3></td></br>
        <td><?php echo $respuesta ?></td></br>
    </tr>
          <tr>
              <td><p>Para cualquier cuestion envíe un correo a contacto@tusanunciosweb.es</p></td>
    </tr>
  </tbody>
</table>
</body>
</html>
