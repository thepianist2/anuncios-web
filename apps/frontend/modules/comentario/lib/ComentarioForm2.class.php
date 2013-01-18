<?php

/**
 * Comentario form.
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ComentarioForm2 extends BaseComentarioForm
{
  public function configure()
  {
      
                                                           //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['borrado'], $this['activo']);
      
      $this->setWidget('texto', new sfWidgetFormInputText(array(), array('size' =>60))); 
      $this->setWidget('correo', new sfWidgetFormInputText(array(), array('size' =>60))); 
      $this->setWidget('telefono', new sfWidgetFormInputText(array(), array('size' =>60))); 
      $this->setWidget('nombre', new sfWidgetFormInputText(array(), array('size' =>60)));             //                       //ocultar campo de candidatoID
      $this->setWidget('idAnuncio', new sfWidgetFormInputHidden());   
      $this->setValidator('idAnuncio', new sfValidatorInteger());  
            
$this->setWidget('texto', new sfWidgetFormTextarea(array(),array('cols'=>80, 'rows'=>10))); 
        
           $this->setValidator('texto',new sfValidatorString(array('required' => true)));
           $this->setValidator('correo',new sfValidatorEmail());
           $this->setValidator('telefono',new sfValidatorNumber(array('required' => false)));
        
                  $this->widgetSchema->setLabels(array(
  'idAnuncio'   => 'Anuncio *',
  'texto'   => 'Publicación *',
  'correo'   => 'Correo *',
  'telefono'   => 'Teléfono',
  'nombre'   => 'Nombre anunciante *',
));  
          
          
$this->validatorSchema['idAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['texto']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['correo']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['telefono']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido, solo introduzca números'));
$this->validatorSchema['nombre']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido, solo introduzca números'));
     
      
  }
}
