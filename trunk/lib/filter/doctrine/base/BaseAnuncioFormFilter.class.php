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
      'fechaInicio'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fechaFin'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'idCategoriaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriaAnuncio'), 'add_empty' => true)),
      'idProvinciaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaAnuncio'), 'add_empty' => true)),
      'localidad'          => new sfWidgetFormFilterInput(),
      'codigoPostal'       => new sfWidgetFormFilterInput(),
      'tipoAnuncio'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'vende' => 'vende', 'compra' => 'compra'))),
      'enlaceVideo'        => new sfWidgetFormFilterInput(),
      'borrado'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'activo'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nombre'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'           => new sfWidgetFormFilterInput(),
      'tipo'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'particular' => 'particular', 'profesional' => 'profesional'))),
      'visitas'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'votoPositivo'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'votoNegativo'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'titulo'             => new sfValidatorPass(array('required' => false)),
      'descripcion'        => new sfValidatorPass(array('required' => false)),
      'precio'             => new sfValidatorPass(array('required' => false)),
      'fechaInicio'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fechaFin'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'idCategoriaAnuncio' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CategoriaAnuncio'), 'column' => 'id')),
      'idProvinciaAnuncio' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProvinciaAnuncio'), 'column' => 'id')),
      'localidad'          => new sfValidatorPass(array('required' => false)),
      'codigoPostal'       => new sfValidatorPass(array('required' => false)),
      'tipoAnuncio'        => new sfValidatorChoice(array('required' => false, 'choices' => array('vende' => 'vende', 'compra' => 'compra'))),
      'enlaceVideo'        => new sfValidatorPass(array('required' => false)),
      'borrado'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'activo'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'correo'             => new sfValidatorPass(array('required' => false)),
      'telefono'           => new sfValidatorPass(array('required' => false)),
      'tipo'               => new sfValidatorChoice(array('required' => false, 'choices' => array('particular' => 'particular', 'profesional' => 'profesional'))),
      'visitas'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'votoPositivo'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'votoNegativo'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'fechaInicio'        => 'Date',
      'fechaFin'           => 'Date',
      'idCategoriaAnuncio' => 'ForeignKey',
      'idProvinciaAnuncio' => 'ForeignKey',
      'localidad'          => 'Text',
      'codigoPostal'       => 'Text',
      'tipoAnuncio'        => 'Enum',
      'enlaceVideo'        => 'Text',
      'borrado'            => 'Boolean',
      'activo'             => 'Boolean',
      'nombre'             => 'Text',
      'correo'             => 'Text',
      'telefono'           => 'Text',
      'tipo'               => 'Enum',
      'visitas'            => 'Number',
      'votoPositivo'       => 'Number',
      'votoNegativo'       => 'Number',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
