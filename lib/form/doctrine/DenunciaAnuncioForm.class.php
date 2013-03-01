<?php

/**
 * DenunciaAnuncio form.
 *
 * @package    anuncios
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DenunciaAnuncioForm extends BaseDenunciaAnuncioForm
{
  public function configure()
  {//quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['solucionado']); 
      
          $this->setWidget('documento', new sfWidgetFormInputFile());  
      $this->setWidget('nombre', new sfWidgetFormInputText(array(), array('size' =>50)));  
      $this->setWidget('email', new sfWidgetFormInputText(array(), array('size' =>50)));  
      $this->setWidget('telefono', new sfWidgetFormInputText(array(), array('size' =>50)));  
        $this->setWidget('empresa', new sfWidgetFormInputText(array(), array('size' =>50)));  
    
                                                           //campo categoria anuncio
        $tipo = Doctrine::getTable('Anuncio')->getLista();
        $tipo[null]='--Seleccione el Anuncio--';
        asort($tipo);
        $this->setWidget('idAnuncio', new sfWidgetFormSelect(array('choices' => $tipo)));   
        
         $this->setWidget('razonAnuncio', new sfWidgetFormTextarea(array(),array('cols'=>80, 'rows'=>10)));
    
        
            $this->setValidator('razonAnuncio',new sfValidatorString(array('required' => true)));
            $this->setValidator('email',new sfValidatorEmail());
            $this->setValidator('telefono', new sfValidatorInteger(array('required' => false))); 
            
                //Validacion de campos
        $this->validatorSchema['documento'] = new sfValidatorFile(array(
                    'required' => false,
                    'path' => sfConfig::get('sf_upload_dir').'/documentos',
                    'mime_types' => array('application/msword','text/plain','application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'text/x-setext',
                    'text/html',
                    'application/pdf',
                    'application/x-pdf','application/msexcel',
                    'application/vnd.ms-excel'),
                ));  
        
          $this->widgetSchema->setLabels(array(
  'nombre'    => 'Nombre *',
  'email'   => 'Email *',
  'telefono'   => 'Telefono',              
  'razonAnuncio' => 'Razón de denuncia *',  
  'documento' => 'Documento',
   'idAnuncio' => 'Anuncio'
));  
          
 $this->validatorSchema['nombre']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
 $this->validatorSchema['email']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
 $this->validatorSchema['telefono']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
 $this->validatorSchema['razonAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
 $this->validatorSchema['documento']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
  $this->validatorSchema['idAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

      
  }
}
