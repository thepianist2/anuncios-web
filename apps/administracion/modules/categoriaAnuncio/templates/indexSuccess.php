<h1>Categoria anuncios List</h1>

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
    <?php foreach ($categoria_anuncios as $categoria_anuncio): ?>
    <tr>
      <td><a href="<?php echo url_for('categoriaAnuncio/edit?id='.$categoria_anuncio->getId()) ?>"><?php echo $categoria_anuncio->getId() ?></a></td>
      <td><?php echo $categoria_anuncio->getTexto() ?></td>
      <td><?php echo $categoria_anuncio->getCreatedAt() ?></td>
      <td><?php echo $categoria_anuncio->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('categoriaAnuncio/new') ?>">New</a>
