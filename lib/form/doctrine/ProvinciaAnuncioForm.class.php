<?php

/**
 * ProvinciaAnuncio form.
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProvinciaAnuncioForm extends BaseProvinciaAnuncioForm
{
  public function configure()
  {
            unset($this['created_at'], $this['updated_at'], $this['borrado'], $this['activo']);
      
      $this->setWidget('texto', new sfWidgetFormInputText(array(), array('size' =>50, )));
      
                $this->widgetSchema->setLabels(array(
  'texto'    => 'Nombre *',              
));  
                
 $this->validatorSchema['texto']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
       
  }
}
