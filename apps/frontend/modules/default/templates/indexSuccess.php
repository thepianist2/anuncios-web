<?php use_helper('Date') ?>
<div id="buscador">
<?php include_partial('default/buscador', array('query' => $query, 'categorias'=>$categorias)); ?>
      <a href="<?php echo url_for('default/new') ?>">Publica tu nuevo anuncio</a>
</div>

<div id="listado-contenido">
<h1>Lista de anuncios</h1>

<table>
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Descripcion</th>
      <th>Precio</th>
      <th>Categoria anuncio</th>
      <th>Povincia anuncio</th>
      <th>Tipo anuncio</th>
      <th>Enlace video</th>
      <th>Tipo Anunciante</th>
      <th>Creado en</th>
      <th>Fecha última modificación</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($anuncios as $anuncio): ?>
    <tr>
      <td><a href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>"><?php echo $anuncio->getTitulo() ?></a></td>
      <td><?php echo nl2br(html_entity_decode($anuncio->getDescripcion(), ENT_COMPAT , 'UTF-8')); ?></td>
      <td><?php echo number_format($anuncio->getPrecio(), 1, ',', '.').'€' ?></td>
      <td><?php echo $anuncio->getCategoriaAnuncio()->getTexto() ?></td>
      <td><?php echo $anuncio->getProvinciaAnuncio()->getTexto() ?></td>
      <td><?php echo $anuncio->getTipoAnuncio() ?></td>
      <?php if($anuncio->getEnlaceVideo()){ ?>
      <td><?php echo nl2br(html_entity_decode($anuncio->getEnlaceVideo(), ENT_COMPAT , 'UTF-8')); ?></td>
      <?php } ?>
      <td><?php echo $anuncio->getTipo() ?></td>
      <td><?php echo format_date($anuncio->getCreatedAt(), 'r') ?></td>
      <td><?php echo format_date($anuncio->getUpdatedAt(), 'r') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


</div>