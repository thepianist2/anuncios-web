<?php

/**
 * Anuncio form base class.
 *
 * @method Anuncio getObject() Returns the current form's model object
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'titulo'             => new sfWidgetFormInputText(),
      'descripcion'        => new sfWidgetFormInputText(),
      'precio'             => new sfWidgetFormInputText(),
      'efectividadAnuncio' => new sfWidgetFormChoice(array('choices' => array('normal' => 'normal', 'semi-destacado(2€)' => 'semi-destacado(2€)', 'destacado(5€)' => 'destacado(5€)', 'premium(8€)' => 'premium(8€)', 'gold(10€)' => 'gold(10€)'))),
      'idCategoriaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriaAnuncio'), 'add_empty' => false)),
      'idProvinciaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaAnuncio'), 'add_empty' => false)),
      'codigoPostal'       => new sfWidgetFormInputText(),
      'tipoAnuncio'        => new sfWidgetFormChoice(array('choices' => array('compra' => 'compra', 'vende' => 'vende'))),
      'enlaceVideo'        => new sfWidgetFormInputText(),
      'borrado'            => new sfWidgetFormInputCheckbox(),
      'activo'             => new sfWidgetFormInputCheckbox(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'             => new sfValidatorString(array('max_length' => 150)),
      'descripcion'        => new sfValidatorPass(),
      'precio'             => new sfValidatorString(array('max_length' => 50)),
      'efectividadAnuncio' => new sfValidatorChoice(array('choices' => array(0 => 'normal', 1 => 'semi-destacado(2€)', 2 => 'destacado(5€)', 3 => 'premium(8€)', 4 => 'gold(10€)'))),
      'idCategoriaAnuncio' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriaAnuncio'))),
      'idProvinciaAnuncio' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaAnuncio'))),
      'codigoPostal'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tipoAnuncio'        => new sfValidatorChoice(array('choices' => array(0 => 'compra', 1 => 'vende'))),
      'enlaceVideo'        => new sfValidatorPass(array('required' => false)),
      'borrado'            => new sfValidatorBoolean(array('required' => false)),
      'activo'             => new sfValidatorBoolean(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anuncio';
  }

}
