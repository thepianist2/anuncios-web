<?php

/**
 * ContactoAnuncio form.
 *
 * @package    anuncios
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactoAnuncioForm extends BaseContactoAnuncioForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'],$this['borrado']); 
      
                  
      $this->setWidget('nombre', new sfWidgetFormInputText(array(), array('size' =>50)));  
      $this->setWidget('email', new sfWidgetFormInputText(array(), array('size' =>50)));  
      $this->setWidget('telefono', new sfWidgetFormInputText(array(), array('size' =>50)));  
        
                $tipo = Doctrine::getTable('Anuncio')->getLista();
        $tipo[null]='--Seleccione el Anuncio--';
        asort($tipo);
        $this->setWidget('idAnuncio', new sfWidgetFormSelect(array('choices' => $tipo)));   
        
         $this->setWidget('mensaje', new sfWidgetFormTextarea(array(),array('cols'=>80, 'rows'=>10)));
    
        
            $this->setValidator('mensaje',new sfValidatorString(array('required' => true)));
                        $this->setValidator('email',new sfValidatorEmail());
            $this->setValidator('telefono', new sfValidatorInteger(array('required' => false))); 
            
                    
          $this->widgetSchema->setLabels(array(
  'nombre'    => 'Nombre *',
  'email'   => 'Email *',
  'telefono'   => 'Telefono',              
  'mensaje' => 'Razón de denuncia *',  
   'idAnuncio' => 'Anuncio'
));  
          
 $this->validatorSchema['nombre']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
 $this->validatorSchema['email']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
 $this->validatorSchema['telefono']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
 $this->validatorSchema['mensaje']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
  $this->validatorSchema['idAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

     
  }
}
