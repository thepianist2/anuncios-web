<?php

/**
 * fotografiaAnuncio actions.
 *
 * @package    anuncios
 * @subpackage fotografiaAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fotografiaAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->fotografia_anuncios = Doctrine_Core::getTable('FotografiaAnuncio')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
//    $this->form = new FotografiaAnuncioForm();

    $this->idAnuncio=$request->getParameter('idAnuncio');
  }
    public function executeNewEdit(sfWebRequest $request)
  {
        
$this->idAnuncio=$request->getParameter('idAnuncio');
          if($request->hasParameter('idAnuncio') or $this->getUser()->hasAttribute('idAnuncio')){                  
    $this->fotografia_anuncios = Doctrine_Core::getTable('FotografiaAnuncio')
      ->createQuery('a')
      ->where('a.idAnuncio =?',$this->getUser()->getAttribute('idAnuncio')) 
      ->execute();
        }
  }

      public function executeUpload(sfWebRequest $request)
  {
   $this->idAnuncio=$request->getParameter('idAnuncio');
   
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FotografiaAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  
       function encriptar($cadena, $clave)
    {

        $cifrado = MCRYPT_RIJNDAEL_128;

        $modo = MCRYPT_MODE_ECB;

        return mcrypt_encrypt($cifrado, $clave, $cadena, $modo, mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND)

            );
    }

 

    function desencriptar($cadena, $clave)
    {
        $cifrado = MCRYPT_RIJNDAEL_128;

        $modo = MCRYPT_MODE_ECB;

        return mcrypt_decrypt($cifrado, $clave, $cadena, $modo, mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND)

            );
    }
  

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($fotografia_anuncio = Doctrine_Core::getTable('FotografiaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object fotografia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new FotografiaAnuncioForm($fotografia_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($fotografia_anuncio = Doctrine_Core::getTable('FotografiaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object fotografia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new FotografiaAnuncioForm($fotografia_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($fotografia_anuncio = Doctrine_Core::getTable('FotografiaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object fotografia_anuncio does not exist (%s).', $request->getParameter('id')));
    $fotografia_anuncio->delete();

    $this->redirect('fotografiaAnuncio/index');
  }
  
  
  public function executeTerminar(sfWebRequest $request){
      
      $idAnuncio=$request->getParameter('idAnuncio');
      $anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('idAnuncio')));
      //no existe
      if(!Doctrine_Core::getTable('sfGuardUser')->verificarExisteEmail($anuncio->correo)){
      $this->redirect('default/enviarCorreoConfirmacionNUser?idAnuncio='.$idAnuncio);
      }else{
      $this->redirect('default/enviarCorreoConfirmacion?idAnuncio='.$idAnuncio);
      }
  }


}
