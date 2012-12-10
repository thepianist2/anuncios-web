<?php

/**
 * Anuncio form base class.
 *
 * @method Anuncio getObject() Returns the current form's model object
 *
 * @package    anuncios
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
      'fechaInicio'        => new sfWidgetFormDate(),
      'fechaFin'           => new sfWidgetFormDate(),
      'idCategoriaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriaAnuncio'), 'add_empty' => false)),
      'idProvinciaAnuncio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaAnuncio'), 'add_empty' => false)),
      'codigoPostal'       => new sfWidgetFormInputText(),
      'tipoAnuncio'        => new sfWidgetFormChoice(array('choices' => array('vende' => 'vende', 'compra' => 'compra'))),
      'enlaceVideo'        => new sfWidgetFormInputText(),
      'borrado'            => new sfWidgetFormInputCheckbox(),
      'activo'             => new sfWidgetFormInputCheckbox(),
      'nombre'             => new sfWidgetFormInputText(),
      'correo'             => new sfWidgetFormInputText(),
      'telefono'           => new sfWidgetFormInputText(),
      'tipo'               => new sfWidgetFormChoice(array('choices' => array('particular' => 'particular', 'profesional' => 'profesional'))),
      'visitas'            => new sfWidgetFormInputText(),
      'votoPositivo'       => new sfWidgetFormInputText(),
      'votoNegativo'       => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'             => new sfValidatorString(array('max_length' => 150)),
      'descripcion'        => new sfValidatorPass(),
      'precio'             => new sfValidatorString(array('max_length' => 50)),
      'fechaInicio'        => new sfValidatorDate(),
      'fechaFin'           => new sfValidatorDate(array('required' => false)),
      'idCategoriaAnuncio' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriaAnuncio'))),
      'idProvinciaAnuncio' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaAnuncio'))),
      'codigoPostal'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tipoAnuncio'        => new sfValidatorChoice(array('choices' => array(0 => 'vende', 1 => 'compra'))),
      'enlaceVideo'        => new sfValidatorPass(array('required' => false)),
      'borrado'            => new sfValidatorBoolean(array('required' => false)),
      'activo'             => new sfValidatorBoolean(array('required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 80)),
      'correo'             => new sfValidatorString(array('max_length' => 80)),
      'telefono'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tipo'               => new sfValidatorChoice(array('choices' => array(0 => 'particular', 1 => 'profesional'))),
      'visitas'            => new sfValidatorInteger(array('required' => false)),
      'votoPositivo'       => new sfValidatorInteger(array('required' => false)),
      'votoNegativo'       => new sfValidatorInteger(array('required' => false)),
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
