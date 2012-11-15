<?php

/**
 * CategoriaAnuncio form.
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoriaAnuncioForm extends BaseCategoriaAnuncioForm
{
  public function configure()
  {
                                                                        //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['borrado'], $this['activo']);
      
      $this->setWidget('texto', new sfWidgetFormInputText(array(), array('size' =>50))); 
      $this->setValidator('texto',new sfValidatorString(array('required' => true)));     
                           $this->widgetSchema->setLabels(array(
  'texto'   => 'Nombre *',

));
                           
   $this->validatorSchema['texto']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

      
  }
}
