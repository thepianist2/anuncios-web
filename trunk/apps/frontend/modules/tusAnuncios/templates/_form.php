<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('tusAnuncios/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('tusAnuncios/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'tusAnuncios/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['titulo']->renderLabel() ?></th>
        <td>
          <?php echo $form['titulo']->renderError() ?>
          <?php echo $form['titulo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion']->renderError() ?>
          <?php echo $form['descripcion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['precio']->renderLabel() ?></th>
        <td>
          <?php echo $form['precio']->renderError() ?>
          <?php echo $form['precio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaInicio']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaInicio']->renderError() ?>
          <?php echo $form['fechaInicio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaFin']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaFin']->renderError() ?>
          <?php echo $form['fechaFin'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['idCategoriaAnuncio']->renderLabel() ?></th>
        <td>
          <?php echo $form['idCategoriaAnuncio']->renderError() ?>
          <?php echo $form['idCategoriaAnuncio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['idProvinciaAnuncio']->renderLabel() ?></th>
        <td>
          <?php echo $form['idProvinciaAnuncio']->renderError() ?>
          <?php echo $form['idProvinciaAnuncio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['localidad']->renderLabel() ?></th>
        <td>
          <?php echo $form['localidad']->renderError() ?>
          <?php echo $form['localidad'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['codigoPostal']->renderLabel() ?></th>
        <td>
          <?php echo $form['codigoPostal']->renderError() ?>
          <?php echo $form['codigoPostal'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipoAnuncio']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipoAnuncio']->renderError() ?>
          <?php echo $form['tipoAnuncio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['enlaceVideo']->renderLabel() ?></th>
        <td>
          <?php echo $form['enlaceVideo']->renderError() ?>
          <?php echo $form['enlaceVideo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['correo']->renderLabel() ?></th>
        <td>
          <?php echo $form['correo']->renderError() ?>
          <?php echo $form['correo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono']->renderError() ?>
          <?php echo $form['telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipo']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo']->renderError() ?>
          <?php echo $form['tipo'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
