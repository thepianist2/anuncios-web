<?php

/**
 * Comentario filter form base class.
 *
 * @package    epi
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idAnuncio'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
      'nombre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'   => new sfWidgetFormFilterInput(),
      'texto'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'borrado'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'activo'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idAnuncio'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
      'nombre'     => new sfValidatorPass(array('required' => false)),
      'correo'     => new sfValidatorPass(array('required' => false)),
      'telefono'   => new sfValidatorPass(array('required' => false)),
      'texto'      => new sfValidatorPass(array('required' => false)),
      'borrado'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'activo'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('comentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comentario';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'idAnuncio'  => 'ForeignKey',
      'nombre'     => 'Text',
      'correo'     => 'Text',
      'telefono'   => 'Text',
      'texto'      => 'Text',
      'borrado'    => 'Boolean',
      'activo'     => 'Boolean',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
