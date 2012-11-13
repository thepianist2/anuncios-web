<?php

/**
 * UsuarioAnuncio form base class.
 *
 * @method UsuarioAnuncio getObject() Returns the current form's model object
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'idAnuncio'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => false)),
      'nombre'     => new sfWidgetFormInputText(),
      'correo'     => new sfWidgetFormInputText(),
      'telefono'   => new sfWidgetFormInputText(),
      'tipo'       => new sfWidgetFormChoice(array('choices' => array('particular' => 'particular', 'profesional' => 'profesional'))),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idAnuncio'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'))),
      'nombre'     => new sfValidatorString(array('max_length' => 80)),
      'correo'     => new sfValidatorString(array('max_length' => 80)),
      'telefono'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tipo'       => new sfValidatorChoice(array('choices' => array(0 => 'particular', 1 => 'profesional'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('usuario_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioAnuncio';
  }

}
