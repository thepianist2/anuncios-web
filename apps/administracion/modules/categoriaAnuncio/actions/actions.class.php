<?php

/**
 * categoriaAnuncio actions.
 *
 * @package    categoria_anuncios
 * @subpackage categoriaAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriaAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {   
    $q = Doctrine_Core::getTable('CategoriaAnuncio')
      ->createQuery('a')
      ->orderBy('a.created_at DESC');
     
        $this->categoria_anuncios = new sfDoctrinePager('CategoriaAnuncio', 10);
	$this->categoria_anuncios->setQuery($q);   	
        $this->categoria_anuncios->setPage($this->getRequestParameter('page',1));
	$this->categoria_anuncios->init();
        //route del paginado
        $this->action = '@categoriaAnuncio_index_page';          
    
  }
  
  
        public function executeBuscar(sfWebRequest $request)
  {
        
        $query = $request->getParameter('query');
       $q = Doctrine_Core::getTable('CategoriaAnuncio')
      ->createQuery('a')
      ->where('a.texto LIKE ?','%'.$query.'%')
      ->orderBy('a.created_at ASC'); 
     
        $this->categoria_anuncios = new sfDoctrinePager('CategoriaAnuncio', 10);
	$this->categoria_anuncios->setQuery($q);   	
        $this->categoria_anuncios->setPage($this->getRequestParameter('page',1));
	$this->categoria_anuncios->init();
        //route del paginado
         $this->action = 'categoriaAnuncio/buscar';
        
        $this->query = $query;
        
        $this->setTemplate('index');
     
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoriaAnuncioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategoriaAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($categoria_anuncio = Doctrine_Core::getTable('CategoriaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object categoria_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaAnuncioForm($categoria_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($categoria_anuncio = Doctrine_Core::getTable('CategoriaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object categoria_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaAnuncioForm($categoria_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($categoria_anuncio = Doctrine_Core::getTable('CategoriaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object categoria_anuncio does not exist (%s).', $request->getParameter('id')));
    $categoria_anuncio->delete();

    $this->redirect('categoriaAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $categoria_anuncio = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Categoría guardada.');
      $this->redirect('categoriaAnuncio/index');
    }else{
      $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');

    }
  }
}
