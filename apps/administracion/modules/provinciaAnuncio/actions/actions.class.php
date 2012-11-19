<?php

/**
 * provinciaAnuncio actions.
 *
 * @package    anuncios
 * @subpackage provinciaAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class provinciaAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
        $q = Doctrine_Core::getTable('ProvinciaAnuncio')
      ->createQuery('a')
      ->orderBy('a.texto DESC');
     
        $this->provincia_anuncios = new sfDoctrinePager('ProvinciaAnuncio', 20);
	$this->provincia_anuncios->setQuery($q);   	
        $this->provincia_anuncios->setPage($this->getRequestParameter('page',1));
	$this->provincia_anuncios->init();
        //route del paginado
        $this->action = '@provinciaAnuncio_index_page';   
  }
  
  
      public function executeShow(sfWebRequest $request)
  {
    $this->provincia_anuncio = Doctrine_Core::getTable('ProvinciaAnuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->provincia_anuncio);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProvinciaAnuncioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProvinciaAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($provincia_anuncio = Doctrine_Core::getTable('ProvinciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object provincia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProvinciaAnuncioForm($provincia_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($provincia_anuncio = Doctrine_Core::getTable('ProvinciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object provincia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProvinciaAnuncioForm($provincia_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
//    $request->checkCSRFProtection();

//    $this->forward404Unless($ProvinciaAnuncio = Doctrine_Core::getTable('ProvinciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object ProvinciaAnuncio does not exist (%s).', $request->getParameter('id')));
//    $ProvinciaAnuncio->borrado=1;
//    $ProvinciaAnuncio->activo=0;
//    $ProvinciaAnuncio->save();
//    $this->getUser()->setFlash('mensajeSuceso','Provincia eliminada.');

//    $this->redirect('ProvinciaAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $provincia_anuncio = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Provincia guardada.');
      $this->redirect('provinciaAnuncio/index');
    }else{
        $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');
    }
  }
}
