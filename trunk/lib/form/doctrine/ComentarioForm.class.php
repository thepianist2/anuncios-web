<?php

/**
 * Comentario form.
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ComentarioForm extends BaseComentarioForm
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
            
          //campo contenido
        $this->setWidget('texto', new sfWidgetFormTextareaTinyMCE(array(             
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
