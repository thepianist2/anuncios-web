<?php

/**
 * FotografiaAnuncio form.
 *
 * @package    epi
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FotografiaAnuncioForm extends BaseFotografiaAnuncioForm
{
  public function configure()
  {
                                                                 //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['borrado'], $this['activo']);
      
                 //                       //ocultar campo de idPiso
      $this->setWidget('idAnuncio', new sfWidgetFormInputHidden());   
      $this->setValidator('idAnuncio', new sfValidatorInteger());   
      
                          //campo descripcion
      $this->setWidget('descripcion', new sfWidgetFormTextarea(array(),array('cols'=>60, 'rows'=>8)));

    
             $fotografiaPicFileSrc = '/uploads/'.$this->getObject()->fotografia;
            $this->widgetSchema['fotografia'] = new sfWidgetFormInputFileEditable(array('file_src'  => $fotografiaPicFileSrc, 
                                       'is_image' => true,
			            'edit_mode' => !$this->isNew(),
				    'delete_label' => 'Eliminar'),
                                    array('id' => 'fotografiaFormu'));   
 
$this->validatorSchema['fotografia'] = new sfValidatorFile(array(
                      'mime_types' => 'web_images',
    		      'path' => sfConfig::get('sf_upload_dir'),
		      'required' => true));
      
$this->validatorSchema['fotografia_delete'] = new sfValidatorBoolean(); 
      


$this->validatorSchema['fotografia']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido', 'mime_types' => 'Debe ser una imágen', 'max_size' => 'Archivo demasiado grande'));
$this->validatorSchema['descripcion']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['idAnuncio']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
  }
}
