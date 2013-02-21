<h1>Contactos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Telefono</th>
      <th>Empresa</th>
      <th>Comentario</th>
      <th>Documento</th>
      <th>Borrado</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contactos as $contacto): ?>
    <tr>
      <td><a href="<?php echo url_for('contacto/edit?id='.$contacto->getId()) ?>"><?php echo $contacto->getId() ?></a></td>
      <td><?php echo $contacto->getNombre() ?></td>
      <td><?php echo $contacto->getEmail() ?></td>
      <td><?php echo $contacto->getTelefono() ?></td>
      <td><?php echo $contacto->getEmpresa() ?></td>
      <td><?php echo $contacto->getComentario() ?></td>
      <td><?php echo $contacto->getDocumento() ?></td>
      <td><?php echo $contacto->getBorrado() ?></td>
      <td><?php echo $contacto->getCreatedAt() ?></td>
      <td><?php echo $contacto->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contacto/new') ?>">New</a>
