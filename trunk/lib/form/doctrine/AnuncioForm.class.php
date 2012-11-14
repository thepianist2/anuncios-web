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
      unset($this['created_at'], $this['updated_at'], $this['borrado'], $this['activo']);
      
        $this->setWidget('titulo', new sfWidgetFormInputText(array(), array('size' =>60)));   

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

          $this->widgetSchema->setLabels(array(
  'titulo'   => 'Título *',
  'descripcion'   => 'Descripción',              
  'precio' => 'Precio *',
  'efectividadAnuncio' => 'Efectividad Anuncio *',
  'idCategoriaAnuncio' => 'Categoria Anuncio *'  ,
  'idProvinciaAnuncio' => 'Provincia Anuncio *'  ,            
  'codigoPostal' => 'Código Postal'  ,   
  'tipoAnuncio' => 'Tipo de anuncio *'  , 
  'enlaceVideo' => 'Código vídeo anuncio'  ,               
));  
          
 
$this->validatorSchema['titulo']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['descripcion']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['precio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido, ponga puntos en vez de comas para decimales'));                    
$this->validatorSchema['efectividadAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['idCategoriaAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));  
$this->validatorSchema['idProvinciaAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));  
          
          
          
      
  }
}
