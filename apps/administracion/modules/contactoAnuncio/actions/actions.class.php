<?php

/**
 * contactoAnuncio actions.
 *
 * @package    anuncios
 * @subpackage contactoAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactoAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
          $q = Doctrine_Core::getTable('ContactoAnuncio')
      ->createQuery('a')
      ->where('a.borrado =?',0)
      ->orderBy('a.created_at DESC');
      
        $this->contacto_anuncios = new sfDoctrinePager('ContactoAnuncio', 20);
	$this->contacto_anuncios->setQuery($q);   	
        $this->contacto_anuncios->setPage($this->getRequestParameter('page',1));
	$this->contacto_anuncios->init();   
        //route del paginado
        $this->action = '@contactoAnuncio_index_page';  
  }
  
  
          public function executeBuscar(sfWebRequest $request)
  {
        
        $query = $request->getParameter('query');
       $q = Doctrine_Core::getTable('ContactoAnuncio')
      ->createQuery('a')
      ->where('a.borrado = 0 AND a.nombre LIKE ?','%'.$query.'%')
      ->orWhere('a.borrado = 0 AND a.email LIKE ?','%'.$query.'%')  
      ->orWhere('a.borrado = 0 AND a.telefono LIKE ?','%'.$query.'%')
      ->orWhere('a.borrado = 0 AND a.nombre LIKE ?','%'.$query.'%')
      ->orWhere('a.borrado = 0 AND a.mensaje LIKE ?','%'.$query.'%')               
      ->orderBy('a.created_at ASC'); 
     
        $this->contacto_anuncios = new sfDoctrinePager('ContactoAnuncio', 20);
	$this->contacto_anuncios->setQuery($q);   	
        $this->contacto_anuncios->setPage($this->getRequestParameter('page',1));
	$this->contacto_anuncios->init();   
        //route del paginado
         $this->action = 'contactoAnuncio/buscar';
        
        $this->query = $query;
        
        $this->setTemplate('index');
     
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->contacto_anuncio = Doctrine_Core::getTable('ContactoAnuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->contacto_anuncio);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ContactoAnuncioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ContactoAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($contacto_anuncio = Doctrine_Core::getTable('ContactoAnuncio')->find(array($request->getParameter('id'))), sprintf('Object contacto_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContactoAnuncioForm($contacto_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($contacto_anuncio = Doctrine_Core::getTable('ContactoAnuncio')->find(array($request->getParameter('id'))), sprintf('Object contacto_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContactoAnuncioForm($contacto_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {


    $this->forward404Unless($contacto_anuncio = Doctrine_Core::getTable('ContactoAnuncio')->find(array($request->getParameter('id'))), sprintf('Object contacto_anuncio does not exist (%s).', $request->getParameter('id')));
    $contacto_anuncio->setBorrado(1);
    $contacto_anuncio->save();

    $this->redirect('contactoAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $contacto_anuncio = $form->save();
 $this->getUser()->setFlash('mensajeTerminado','Contacto guardado.');
      $this->redirect('contactoAnuncio/index');
    }else{
        $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');
    }
  }
}
