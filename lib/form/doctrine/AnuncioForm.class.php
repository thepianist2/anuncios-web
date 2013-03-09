<?php

/**
 * Anuncio form.
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncioForm extends BaseAnuncioForm
{
  public function configure()
  {
                                                      //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['borrado'], $this['activo'], $this['visitas'], $this['votoPositivo'], $this['votoNegativo']);
      
         
         $this->setWidget('fechaInicio', new sfWidgetFormInputText(array(), array('size' =>8,'readonly'=>'readonly')));
         $this->setWidget('fechaFin', new sfWidgetFormInputText(array(), array('size' =>8, 'readonly'=>'readonly')));
         
         $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('fechaInicio', '<', 'fechaFin',array(), array('invalid' => 'La fecha de inicio debe ser anterior a la fecha de finalización')));
      
        $this->setWidget('titulo', new sfWidgetFormInputText(array(), array('size' =>60))); 
        $this->setWidget('localidad', new sfWidgetFormInputText(array(), array('size' =>60))); 

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
          $this->setValidator('telefono', new sfValidatorNumber(array('required' => false))); 
        
        
          //campo contenido
        $this->setWidget('descripcion', new sfWidgetFormTextareaTinyMCE(array(             
                    'width' => 500,
                    'height' => 350,
                    'config' =>           
                    'language : "es",'.
                    'file_browser_callback: "sfMediaBrowserWindowManager.tinymceCallback",'.
                    'plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",' .
                    'theme_advanced_buttons1 : "styleselect,formatselect,fontselect,fontsizeselect,|,styleprops,|,del,ins,attribs",'.
                    'theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,cleanup,code",'.
                    'theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr",'.
                    'theme_advanced_buttons4 : "visualchars,nonbreaking,blockquote,pagebreak,|,insertfile,insertimage,|,insertdate,inserttime,preview,|,forecolor,backcolor ,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,| ",'
                    )));     
      
                    $this->setValidator('descripcion', new  sfValidatorString(array('required' => true)));  
                    $this->setValidator('titulo', new  sfValidatorString(array('required' => true, 'max_length'=>35)));  

          $this->widgetSchema->setLabels(array(
  'titulo'   => 'Título *',
  'descripcion'   => 'Descripción',              
  'precio' => 'Precio (€) *',
  'efectividadAnuncio' => 'Efectividad Anuncio *',
  'idCategoriaAnuncio' => 'Categoria Anuncio *'  ,
  'idProvinciaAnuncio' => 'Provincia Anuncio *'  ,            
  'codigoPostal' => 'Código Postal'  ,   
  'tipoAnuncio' => 'Tipo de anuncio *'  , 
  'nombre' => 'Nombre anunciante *'  ,           
  'correo' => 'Correo *'  ,
  'telefono' => 'Teléfono'  ,
  'fechaInicio' => 'Fecha inicio *'  ,
  'fechaFin' => 'Fecha fin *'  ,
  'enlaceVideo' => 'Código iframe vídeo'  ,
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

  }
}
