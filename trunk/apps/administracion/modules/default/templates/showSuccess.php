<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $anuncio->getId() ?></td>
    </tr>
    <tr>
      <th>Titulo:</th>
      <td><?php echo $anuncio->getTitulo() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $anuncio->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Precio:</th>
      <td><?php echo $anuncio->getPrecio() ?></td>
    </tr>
    <tr>
      <th>Efectividad anuncio:</th>
      <td><?php echo $anuncio->getEfectividadAnuncio() ?></td>
    </tr>
    <tr>
      <th>Id categoria anuncio:</th>
      <td><?php echo $anuncio->getIdCategoriaAnuncio() ?></td>
    </tr>
    <tr>
      <th>Id provincia anuncio:</th>
      <td><?php echo $anuncio->getIdProvinciaAnuncio() ?></td>
    </tr>
    <tr>
      <th>Codigo postal:</th>
      <td><?php echo $anuncio->getCodigoPostal() ?></td>
    </tr>
    <tr>
      <th>Tipo anuncio:</th>
      <td><?php echo $anuncio->getTipoAnuncio() ?></td>
    </tr>
    <tr>
      <th>Enlace video:</th>
      <td><?php echo $anuncio->getEnlaceVideo() ?></td>
    </tr>
    <tr>
      <th>Borrado:</th>
      <td><?php echo $anuncio->getBorrado() ?></td>
    </tr>
    <tr>
      <th>Activo:</th>
      <td><?php echo $anuncio->getActivo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $anuncio->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $anuncio->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('default/edit?id='.$anuncio->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('default/index') ?>">List</a>
