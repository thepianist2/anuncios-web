<h1>Fotografia anuncios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id anuncio</th>
      <th>Descripcion</th>
      <th>Fotografia</th>
      <th>Borrado</th>
      <th>Activo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($fotografia_anuncios as $fotografia_anuncio): ?>
    <tr>
      <td><a href="<?php echo url_for('fotografiaAnuncio/edit?id='.$fotografia_anuncio->getId()) ?>"><?php echo $fotografia_anuncio->getId() ?></a></td>
      <td><?php echo $fotografia_anuncio->getIdAnuncio() ?></td>
      <td><?php echo $fotografia_anuncio->getDescripcion() ?></td>
      <td><?php echo $fotografia_anuncio->getFotografia() ?></td>
      <td><?php echo $fotografia_anuncio->getBorrado() ?></td>
      <td><?php echo $fotografia_anuncio->getActivo() ?></td>
      <td><?php echo $fotografia_anuncio->getCreatedAt() ?></td>
      <td><?php echo $fotografia_anuncio->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('fotografiaAnuncio/new') ?>">New</a>
