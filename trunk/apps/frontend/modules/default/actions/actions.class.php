<?php

/**
 * default actions.
 *
 * @package    anuncios
 * @subpackage default
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('Anuncio')
      ->createQuery('a')
      ->where('a.borrado = 0 AND a.fechaInicio >= ?',date('Y-m-d h:i:s', time()))
      ->andWhere('a.activo = 1 AND a.borrado= 0')      
      ->orderBy('a.created_at DESC');
     
        $this->anuncios = new sfDoctrinePager('Anuncio', 6);
	$this->anuncios->setQuery($q);   	
        $this->anuncios->setPage($this->getRequestParameter('page',1));
	$this->anuncios->init();
        //route del paginado
        $this->action = '@default_index_page'; 
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->anuncio);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AnuncioForm2();
  }

  public function executeCreate(sfWebRequest $request)
  {

    $this->form = new AnuncioForm2();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnuncioForm2($anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnuncioForm2($anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    $anuncio->delete();

    $this->redirect('default/index');
  }
  
  
  /**
   * Enviamos correo de confirmacion
   */
  public function executeEnviarCorreoConfirmacion(sfWebRequest $request){
           $this->error=false;
//           $idEncriptado=$request->getParameter('idAnuncio');
//           $idDesencriptado=$this->desencriptar($idEncriptado, "anuncio");
//           $idDesencriptado+=0;
           $this->anuncio = Doctrine_Core::getTable('Anuncio')->find($request->getParameter('idAnuncio')); 
//           $anuncio=new Anuncio();
//           $anuncio=$this->anuncio;
         
                   
        $to = $this->anuncio->getCorreo();
        $from = "contacto@tusanunciosweb.es";
        $url_base = 'http://www.tusanunciosweb.es';
        $asunto = 'Confirmación y activación de nuevo anuncio';
        $mailBody = $this->getPartial('mailBody', array('e_mail' => $to, 'url_base' => $url_base, 'asunto' => $asunto,'anuncio'=>$this->anuncio ));

       try {
           $mensaje = Swift_Message::newInstance()
                        ->setFrom($from)
                        ->setTo($to)
                        ->setSubject($asunto)
                        ->setBody($mailBody, 'text/html');

           sfContext::getInstance()->getMailer()->send($mensaje);
           
       }
       catch (Exception $e)
       {
           echo $e;
           $this->error=true;
       }
  
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
  
  
          public function executeConfirmarAlta(sfWebRequest $request) {
          // $idEncriptado=$request->getParameter('idAnuncio');
          // $idDesencriptado=$this->desencriptar($idEncriptado, "anuncio");
              
              
        $anuncio = Doctrine::getTable('Anuncio')
                ->createQuery('u')
                ->where('u.id = ?',$request->getParameter('idAnuncio'))
                ->fetchOne();
        
        if($anuncio->borrado==0){
        $anuncio->activo=1;
        $anuncio->save();
           $this->getUser()->setFlash('mensajeTerminado','Anuncio activado correctamente.'); 
        }else{
           $this->getUser()->setFlash('mensajeErrorGrave','Este anuncio no se puede activar porque está borrado.');
        }

        $this->redirect('default/show?id='.$anuncio->id);

    }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $anuncio = $form->save();
      //$codigo=$this->encriptar($anuncio->id, "anuncio");
      $this->redirect('default/enviarCorreoConfirmacion?idAnuncio='.$anuncio->id);
    }else{
        $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');
    }
  }
}
