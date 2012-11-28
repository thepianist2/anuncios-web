<?php use_helper('Date') ?>
<table>
  <tbody>
    <tr>
      <th>Titulo:</th>
      <td><?php echo $anuncio->getTitulo() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo nl2br($anuncio->getDescripcion(), ENT_COMPAT , 'UTF-8'); ?></td>
    </tr>
    <tr>
      <th>Precio:</th>
      <td><?php echo number_format($anuncio->getPrecio(), 1, ',', '.').'€' ?></td>
    </tr>
    <tr>
      <th>Provincia anuncio:</th>
      <td><?php echo $anuncio->getProvinciaAnuncio()->getTexto() ?></td>
    </tr>
    <tr>
      <th>Codigo postal:</th>
      <td><?php echo $anuncio->getCodigoPostal() ?></td>
    </tr>
    <tr>
      <th>Tipo anuncio:</th>
      <td><?php echo $anuncio->getTipoAnuncio() ?></td>
    </tr>
    <?php if($anuncio->getEnlaceVideo()){ ?>
    <tr>
      <th>Enlace video:</th>
      <td><?php echo nl2br(html_entity_decode($anuncio->getEnlaceVideo(), ENT_COMPAT , 'UTF-8')); ?></td>
    </tr>
    <?php } ?>
    <tr>
      <th>Nombre Anunciante</th>
      <td><?php echo $anuncio->getNombre() ?></td>
    </tr>
    <tr>
      <th>Correo Anunciante</th>
      <td><?php echo $anuncio->getCorreo() ?></td>
    </tr>
    <tr>
      <th>Telefono Anunciante</th>
      <td><?php echo $anuncio->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Tipo Anunciante</th>
      <td><?php echo $anuncio->getTipo() ?></td>
    </tr>
    <tr>
      <th>Anuncio creado en</th>
      <td><?php echo format_date($anuncio->getCreatedAt(), 'r') ?></td>
    </tr>
    <tr>
      <th>Fecha última modificacion</th>
      <td><?php echo format_date($anuncio->getUpdatedAt(), 'r') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('default/index') ?>">Volver a la lista de anuncios</a>
