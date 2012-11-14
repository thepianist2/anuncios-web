<h1>Usuario anuncios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id anuncio</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Tipo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuario_anuncios as $usuario_anuncio): ?>
    <tr>
      <td><a href="<?php echo url_for('usuarioAnuncio/edit?id='.$usuario_anuncio->getId()) ?>"><?php echo $usuario_anuncio->getId() ?></a></td>
      <td><?php echo $usuario_anuncio->getIdAnuncio() ?></td>
      <td><?php echo $usuario_anuncio->getNombre() ?></td>
      <td><?php echo $usuario_anuncio->getCorreo() ?></td>
      <td><?php echo $usuario_anuncio->getTelefono() ?></td>
      <td><?php echo $usuario_anuncio->getTipo() ?></td>
      <td><?php echo $usuario_anuncio->getCreatedAt() ?></td>
      <td><?php echo $usuario_anuncio->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('usuarioAnuncio/new') ?>">New</a>
