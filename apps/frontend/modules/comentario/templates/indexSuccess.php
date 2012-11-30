<h1>Comentarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id anuncio</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Texto</th>
      <th>Borrado</th>
      <th>Activo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comentarios as $comentario): ?>
    <tr>
      <td><a href="<?php echo url_for('comentario/edit?id='.$comentario->getId()) ?>"><?php echo $comentario->getId() ?></a></td>
      <td><?php echo $comentario->getIdAnuncio() ?></td>
      <td><?php echo $comentario->getNombre() ?></td>
      <td><?php echo $comentario->getCorreo() ?></td>
      <td><?php echo $comentario->getTelefono() ?></td>
      <td><?php echo $comentario->getTexto() ?></td>
      <td><?php echo $comentario->getBorrado() ?></td>
      <td><?php echo $comentario->getActivo() ?></td>
      <td><?php echo $comentario->getCreatedAt() ?></td>
      <td><?php echo $comentario->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('comentario/new') ?>">New</a>
