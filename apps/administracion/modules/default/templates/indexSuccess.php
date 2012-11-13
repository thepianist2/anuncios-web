<h1>Anuncios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Titulo</th>
      <th>Descripcion</th>
      <th>Precio</th>
      <th>Efectividad anuncio</th>
      <th>Id categoria anuncio</th>
      <th>Id provincia anuncio</th>
      <th>Codigo postal</th>
      <th>Tipo anuncio</th>
      <th>Enlace video</th>
      <th>Borrado</th>
      <th>Activo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($anuncios as $anuncio): ?>
    <tr>
      <td><a href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>"><?php echo $anuncio->getId() ?></a></td>
      <td><?php echo $anuncio->getTitulo() ?></td>
      <td><?php echo $anuncio->getDescripcion() ?></td>
      <td><?php echo $anuncio->getPrecio() ?></td>
      <td><?php echo $anuncio->getEfectividadAnuncio() ?></td>
      <td><?php echo $anuncio->getIdCategoriaAnuncio() ?></td>
      <td><?php echo $anuncio->getIdProvinciaAnuncio() ?></td>
      <td><?php echo $anuncio->getCodigoPostal() ?></td>
      <td><?php echo $anuncio->getTipoAnuncio() ?></td>
      <td><?php echo $anuncio->getEnlaceVideo() ?></td>
      <td><?php echo $anuncio->getBorrado() ?></td>
      <td><?php echo $anuncio->getActivo() ?></td>
      <td><?php echo $anuncio->getCreatedAt() ?></td>
      <td><?php echo $anuncio->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('default/new') ?>">New</a>