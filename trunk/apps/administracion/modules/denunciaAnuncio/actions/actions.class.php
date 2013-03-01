<?php

/**
 * denunciaAnuncio actions.
 *
 * @package    anuncios
 * @subpackage denunciaAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class denunciaAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
          $q = Doctrine_Core::getTable('DenunciaAnuncio')
      ->createQuery('a')
      ->orderBy('a.created_at DESC');
      
        $this->denuncia_anuncios = new sfDoctrinePager('DenunciaAnuncio', 6);
	$this->denuncia_anuncios->setQuery($q);   	
        $this->denuncia_anuncios->setPage($this->getRequestParameter('page',1));
	$this->denuncia_anuncios->init();   
        //route del paginado
        $this->action = '@denunciaAnuncio_index_page';  
  }
  
  
        public function executeBuscar(sfWebRequest $request)
  {
        
        $query = $request->getParameter('query');
       $q = Doctrine_Core::getTable('DenunciaAnuncio')
      ->createQuery('a')
      ->where('a.solucionado = 0 AND a.nombre LIKE ?','%'.$query.'%')
      ->orWhere('a.solucionado = 0 AND a.email LIKE ?','%'.$query.'%')  
      ->orWhere('a.solucionado = 0 AND a.telefono LIKE ?','%'.$query.'%')
      ->orWhere('a.solucionado = 0 AND a.empresa LIKE ?','%'.$query.'%')
      ->orWhere('a.solucionado = 0 AND a.razonanuncio LIKE ?','%'.$query.'%')               
      ->orderBy('a.created_at ASC'); 
     
        $this->denuncia_anuncios = new sfDoctrinePager('DenunciaAnuncio', 6);
	$this->denuncia_anuncios->setQuery($q);   	
        $this->denuncia_anuncios->setPage($this->getRequestParameter('page',1));
	$this->denuncia_anuncios->init();   
        //route del paginado
         $this->action = 'denunciaAnuncio/buscar';
        
        $this->query = $query;
        
        $this->setTemplate('index');
     
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->denuncia_anuncio);
  }
  
    public function executeResponder(sfWebRequest $request)
  {
    $this->denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->denuncia_anuncio);
  }


  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DenunciaAnuncioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DenunciaAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object denuncia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new DenunciaAnuncioForm($denuncia_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object denuncia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new DenunciaAnuncioForm($denuncia_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {

//    $request->checkCSRFProtection();

    $this->forward404Unless($denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object denuncia_anuncio does not exist (%s).', $request->getParameter('id')));
    if($denuncia_anuncio->solucionado==1){
        $denuncia_anuncio->solucionado=0;
    }else{
        $denuncia_anuncio->solucionado=1;
    }
    
    $denuncia_anuncio->save();
    $this->getUser()->setFlash('mensajeSuceso','Denuncia solucionada.');
    $this->redirect('denunciaAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $denuncia_anuncio = $form->save();
        $this->getUser()->setFlash('mensajeTerminado','Denuncia Anuncio solucionada.');
      $this->redirect('denunciaAnuncio/index');
    }else{
        $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');
    }
  }
  
      
  /**
   * Enviamos correo de confirmacion
   */
  public function respuesta(sfWebRequest $request){
           $this->error=false;
           $respuesta=$request->getParameter('publicacion');
           $this->denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find($request->getParameter('id')); 
        $to = $this->denuncia_anuncio->getCorreo();
        $from = "contacto@tusanunciosweb.es";
        $url_base = 'http://desarrollo.tusanunciosweb.es';
        $asunto = 'Notificación de denuncia a anuncio';
        $mailBody = $this->getPartial('mailBody', array('e_mail' => $to, 'url_base' => $url_base, 'asunto' => $asunto,'denunciaAnuncio'=>$this->denuncia_anuncio,'respuesta'=>$respuesta));

       try {
           $mensaje = Swift_Message::newInstance()
                        ->setFrom($from)
                        ->setTo($to)
                        ->setSubject($asunto)
                        ->setBody($mailBody, 'text/html');

           sfContext::getInstance()->getMailer()->send($mensaje);
           $this->getUser()->setFlash('mensajeTerminado','Respuesta enviada con éxito!.');
       }
       catch (Exception $e)
       {
           echo $e;
           $this->getUser()->setFlash('mensajeErrorGrave','Error en enviar correo.');
           $this->error=true;
       }
  $this->redirect('denunciaAnuncio/index');
  }
  
    
  
}
