














<?php use_helper('Date') ?>
<div id="buscador">
<?php include_partial('default/buscador', array('query' => $query, 'categoriaF'=>$categoriaF, 'provinciaF'=>$provinciaF, 'provincias'=>$provincias, 'categorias'=>$categorias,'ofertaDemandaF'=>$ofertaDemandaF,'selectOrder'=>$selectOrder)); ?>
</div>
<br><br>
<div id="listado-contenido">
    <div id="tabla-listado">
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
      <td><?php echo number_format($anuncio->getPrecio(), 2, ',', '.').' €' ?></td>
      <td><?php echo $anuncio->getCategoriaAnuncio()->getTexto() ?></td>
      <td><?php echo $anuncio->getProvinciaAnuncio()->getTexto() ?></td>
      <td><?php echo $anuncio->getTipoAnuncio() ?></td>
      <td><?php echo $anuncio->getTipo() ?></td>
      <td><?php echo format_date($anuncio->getCreatedAt(), 'r') ?></td>
      <td><?php echo format_date($anuncio->getUpdatedAt(), 'r') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>
</div>