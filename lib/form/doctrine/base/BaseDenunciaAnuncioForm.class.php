<?php

/**
 * DenunciaAnuncio form base class.
 *
 * @method DenunciaAnuncio getObject() Returns the current form's model object
 *
 * @package    anuncios
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDenunciaAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'idAnuncio'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => false)),
      'nombre'       => new sfWidgetFormInputText(),
      'email'        => new sfWidgetFormInputText(),
      'telefono'     => new sfWidgetFormInputText(),
      'empresa'      => new sfWidgetFormInputText(),
      'razonAnuncio' => new sfWidgetFormTextarea(),
      'documento'    => new sfWidgetFormTextarea(),
      'solucionado'  => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idAnuncio'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'))),
      'nombre'       => new sfValidatorString(array('max_length' => 100)),
      'email'        => new sfValidatorString(array('max_length' => 100)),
      'telefono'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'empresa'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'razonAnuncio' => new sfValidatorString(),
      'documento'    => new sfValidatorString(array('required' => false)),
      'solucionado'  => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('denuncia_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DenunciaAnuncio';
  }

}
