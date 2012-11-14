<h1>Provincia anuncios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Texto</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($provincia_anuncios as $provincia_anuncio): ?>
    <tr>
      <td><a href="<?php echo url_for('provinciaAnuncio/edit?id='.$provincia_anuncio->getId()) ?>"><?php echo $provincia_anuncio->getId() ?></a></td>
      <td><?php echo $provincia_anuncio->getTexto() ?></td>
      <td><?php echo $provincia_anuncio->getCreatedAt() ?></td>
      <td><?php echo $provincia_anuncio->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('provinciaAnuncio/new') ?>">New</a>
