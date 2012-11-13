<?php

/**
 * UsuarioAnuncio filter form base class.
 *
 * @package    epi
 * @subpackage filter
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idAnuncio'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
      'nombre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'   => new sfWidgetFormFilterInput(),
      'tipo'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'particular' => 'particular', 'profesional' => 'profesional'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'idAnuncio'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
      'nombre'     => new sfValidatorPass(array('required' => false)),
      'correo'     => new sfValidatorPass(array('required' => false)),
      'telefono'   => new sfValidatorPass(array('required' => false)),
      'tipo'       => new sfValidatorChoice(array('required' => false, 'choices' => array('particular' => 'particular', 'profesional' => 'profesional'))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('usuario_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'idAnuncio'  => 'ForeignKey',
      'nombre'     => 'Text',
      'correo'     => 'Text',
      'telefono'   => 'Text',
      'tipo'       => 'Enum',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
