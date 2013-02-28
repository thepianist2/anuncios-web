<h1>Denuncia anuncios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id anuncio</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Telefono</th>
      <th>Empresa</th>
      <th>Razon anuncio</th>
      <th>Documento</th>
      <th>Solucionado</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($denuncia_anuncios as $denuncia_anuncio): ?>
    <tr>
      <td><a href="<?php echo url_for('denunciaAnuncio/show?id='.$denuncia_anuncio->getId()) ?>"><?php echo $denuncia_anuncio->getId() ?></a></td>
      <td><?php echo $denuncia_anuncio->getIdAnuncio() ?></td>
      <td><?php echo $denuncia_anuncio->getNombre() ?></td>
      <td><?php echo $denuncia_anuncio->getEmail() ?></td>
      <td><?php echo $denuncia_anuncio->getTelefono() ?></td>
      <td><?php echo $denuncia_anuncio->getEmpresa() ?></td>
      <td><?php echo $denuncia_anuncio->getRazonAnuncio() ?></td>
      <td><?php echo $denuncia_anuncio->getDocumento() ?></td>
      <td><?php echo $denuncia_anuncio->getSolucionado() ?></td>
      <td><?php echo $denuncia_anuncio->getCreatedAt() ?></td>
      <td><?php echo $denuncia_anuncio->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('denunciaAnuncio/new') ?>">New</a>
