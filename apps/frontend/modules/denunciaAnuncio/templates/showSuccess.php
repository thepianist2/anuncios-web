<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $denuncia_anuncio->getId() ?></td>
    </tr>
    <tr>
      <th>Id anuncio:</th>
      <td><?php echo $denuncia_anuncio->getIdAnuncio() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $denuncia_anuncio->getNombre() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $denuncia_anuncio->getEmail() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $denuncia_anuncio->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Empresa:</th>
      <td><?php echo $denuncia_anuncio->getEmpresa() ?></td>
    </tr>
    <tr>
      <th>Razon anuncio:</th>
      <td><?php echo $denuncia_anuncio->getRazonAnuncio() ?></td>
    </tr>
    <tr>
      <th>Documento:</th>
      <td><?php echo $denuncia_anuncio->getDocumento() ?></td>
    </tr>
    <tr>
      <th>Solucionado:</th>
      <td><?php echo $denuncia_anuncio->getSolucionado() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $denuncia_anuncio->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $denuncia_anuncio->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('denunciaAnuncio/edit?id='.$denuncia_anuncio->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('denunciaAnuncio/index') ?>">List</a>
