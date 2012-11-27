<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $asunto ?></title>


</head>
<body>
<table class="mailBody">
  <tbody>
    <tr>
      <td><img src="<?php echo $url_base.image_path('logo-peq.png') ?>"/></td>
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
    <?php echo 'Para completar el proceso de registro de tu anuncio pulsa en el siguiente enlace. <br />Si tu correo no te permite abrir un navegador, copialo en la dirección para acceder' ?>

	<p> Enlace activación anuncio:  <br>
          <br /><br />
          <a href="<?php echo $url_base.'/confirmarAlta?idAnuncio='.$idEncriptado; ?>">Confirmar Alta</a>
            <br /><br />o
          <a href="<?php echo $url_base.'/confirmarAlta?idAnuncio='.$idEncriptado; ?>"><?php echo $url_base.'/confirmarAlta?idAnuncio='.$idEncriptado; ?></a>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>
