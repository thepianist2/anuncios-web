<?php

/**
 * Anuncio form.
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncioForm2 extends BaseAnuncioForm
{
  public function configure()
  {
                                                      //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['borrado'], $this['activo'], $this['visitas'],$this['votoPositivo'], $this['votoNegativo']);
      
         
         $this->setWidget('fechaInicio', new sfWidgetFormInputText(array(), array('size' =>8,'readonly'=>'readonly')));
         $this->setWidget('fechaFin', new sfWidgetFormInputText(array(), array('size' =>8, 'readonly'=>'readonly')));
         
         $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('fechaInicio', '<', 'fechaFin',array(), array('invalid' => 'La fecha de inicio debe ser anterior a la fecha de finalización')));
      
        $this->setWidget('titulo', new sfWidgetFormInputText(array(), array('size' =>60)));   
        $this->setWidget('localidad', new sfWidgetFormInputText(array(), array('size' =>30))); 
        $this->setWidget('enlaceVideo', new sfWidgetFormTextarea(array(),array('cols'=>80, 'rows'=>10)));
        
        $this->setValidator('precio', new sfValidatorNumber());                
                                                   //campo categoria anuncio
        $tipo = Doctrine::getTable('CategoriaAnuncio')->getLista();
        $tipo[null]='--Seleccione la categoria--';
        asort($tipo);
        $this->setWidget('idCategoriaAnuncio', new sfWidgetFormSelect(array('choices' => $tipo)));          
          
                                                         //campo provincia anuncio
        $tipo = Doctrine::getTable('ProvinciaAnuncio')->getLista();
        $tipo[null]='--Seleccione la provincia--';
        asort($tipo);
        $this->setWidget('idProvinciaAnuncio', new sfWidgetFormSelect(array('choices' => $tipo)));  
      
      
          $this->setWidget('nombre', new sfWidgetFormInputText(array(), array('size' =>60)));
          $this->setWidget('correo', new sfWidgetFormInputText(array(), array('size' =>60)));
          
          $this->setValidator('correo', new sfValidatorEmail()); 
          $this->setValidator('telefono', new sfValidatorNumber()); 
        
        
          //campo contenido
        $this->setWidget('descripcion', new sfWidgetFormTextareaTinyMCE(array(             
                    'width' => 630,
                    'height' => 300,
                    'config' =>           
                    'language : "es",'.
                    'theme_advanced_disable: "anchor,image,cleanup,help",'
                    )));     
        
 $this->setWidget('captcha' , new sfWidgetCaptchaGD());

$this->setValidator('captcha' , new sfCaptchaGDValidator(array('length' => 4)));     
        
                    $this->setValidator('descripcion', new  sfValidatorString(array('required' => true)));  
                    $this->setValidator('titulo', new  sfValidatorString(array('required' => true, 'max_length'=>35)));
          $this->widgetSchema->setLabels(array(
  'titulo'   => 'El título de tu anuncio *',
  'descripcion'   => 'La descripción *',              
  'precio' => '¿Que precio tendrá? (€) *',
  'efectividadAnuncio' => 'Efectividad Anuncio *',
  'idCategoriaAnuncio' => '¿En que categoría está? *'  ,
  'idProvinciaAnuncio' => '¿En que provincia te pueden contactar? *'  ,            
  'codigoPostal' => '¿El código postal?'  ,   
  'tipoAnuncio' => '¿Vendes o necesitas? *'  , 
  'nombre' => 'El nombre del anunciante para contactar *'  ,           
  'correo' => 'El correo de contacto *'  ,
  'telefono' => 'El telefono de contacto *'  ,
  'fechaInicio' => '¿Desde que fecha quieres que se comience a ver tu anuncio? *'  ,
  'fechaFin' => '¿Hasta que fecha quieres que se vea tu anuncio? *'  ,
  'enlaceVideo' => '¿Tienes un vídeo? inserta el código iframe'  ,
  'localidad' => '¿En que localidad?'  ,         
  'tipo' => '¿Eres un anunciante particular(persona normal) o profesional(empresa)?'  ,                
));  

          
 
$this->validatorSchema['titulo']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido','max_length'=>'El título debe ser mas corto máximo 35 caracteres.'));
$this->validatorSchema['descripcion']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['precio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido, ponga puntos en vez de comas para decimales'));                    
//$this->validatorSchema['efectividadAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['idCategoriaAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));  
$this->validatorSchema['idProvinciaAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));  
$this->validatorSchema['correo']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido, escriba bien su correo'));
$this->validatorSchema['telefono']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido, escriba solo números')); 
$this->validatorSchema['nombre']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido')); 
$this->validatorSchema['fechaInicio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido')); 
$this->validatorSchema['fechaFin']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido')); 
$this->validatorSchema['captcha']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Los números no coinciden con la imagen','length' => 'Los números no coinciden con la imagen')); 
  }
}
