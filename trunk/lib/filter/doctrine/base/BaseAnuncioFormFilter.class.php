<?php

/**
 * Anuncio filter form base class.
 *
 * @package    anuncios
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'efectividadAnuncio' => new sfWidgetFormChoice(array('choices' => array('' => '', 'normal' => 'normal', 'semi-destacado(2€)' => 'semi-destacado(2€)', 'destacado(5€)' => 'destacado(5€)', 'premium(8€)' => 'premium(8€)', 'gold(10€)' => 'gold(10€)'))),
      'idCategoriaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriaAnuncio'), 'add_empty' => true)),
      'idProvinciaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaAnuncio'), 'add_empty' => true)),
      'codigoPostal'       => new sfWidgetFormFilterInput(),
      'tipoAnuncio'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'compra' => 'compra', 'vende' => 'vende'))),
      'enlaceVideo'        => new sfWidgetFormFilterInput(),
      'borrado'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'activo'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'titulo'             => new sfValidatorPass(array('required' => false)),
      'descripcion'        => new sfValidatorPass(array('required' => false)),
      'precio'             => new sfValidatorPass(array('required' => false)),
      'efectividadAnuncio' => new sfValidatorChoice(array('required' => false, 'choices' => array('normal' => 'normal', 'semi-destacado(2€)' => 'semi-destacado(2€)', 'destacado(5€)' => 'destacado(5€)', 'premium(8€)' => 'premium(8€)', 'gold(10€)' => 'gold(10€)'))),
      'idCategoriaAnuncio' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CategoriaAnuncio'), 'column' => 'id')),
      'idProvinciaAnuncio' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProvinciaAnuncio'), 'column' => 'id')),
      'codigoPostal'       => new sfValidatorPass(array('required' => false)),
      'tipoAnuncio'        => new sfValidatorChoice(array('required' => false, 'choices' => array('compra' => 'compra', 'vende' => 'vende'))),
      'enlaceVideo'        => new sfValidatorPass(array('required' => false)),
      'borrado'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'activo'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anuncio';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'titulo'             => 'Text',
      'descripcion'        => 'Text',
      'precio'             => 'Text',
      'efectividadAnuncio' => 'Enum',
      'idCategoriaAnuncio' => 'ForeignKey',
      'idProvinciaAnuncio' => 'ForeignKey',
      'codigoPostal'       => 'Text',
      'tipoAnuncio'        => 'Enum',
      'enlaceVideo'        => 'Text',
      'borrado'            => 'Boolean',
      'activo'             => 'Boolean',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
