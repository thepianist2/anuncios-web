<?php

/**
 * tusAnuncios actions.
 *
 * @package    epi
 * @subpackage tusAnuncios
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tusAnunciosActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {   
       if($this->getUser()->isAuthenticated()){
    $q = Doctrine_Core::getTable('Anuncio')
      ->createQuery('a')
      ->where('a.borrado = ?',0)
      ->andWhere('a.correo LIKE ?',$this->getUser()->getGuardUser()->getEmail_address())
      ->orderBy('a.created_at DESC');
     
        $this->anuncios = new sfDoctrinePager('Anuncio', 20);
	$this->anuncios->setQuery($q);   	
        $this->anuncios->setPage($this->getRequestParameter('page',1));
	$this->anuncios->init();
        //route del paginado
        $this->action = '@tusAnuncios_index_page';    
       }
  }
  
    public function executeVerImagenes(sfWebRequest $request)
  {   
        if($request->hasParameter('idAnuncio')){
       $this->getUser()->setAttribute('idAnuncio', $request->getParameter('idAnuncio'));
        }
              //si se pasa el id muestra la fotos de ese anuncio
        if($request->hasParameter('idAnuncio') or $this->getUser()->hasAttribute('idAnuncio')){                  
    $this->imagenes = Doctrine_Core::getTable('FotografiaAnuncio')
      ->createQuery('a')
      ->where('a.idAnuncio =?',$this->getUser()->getAttribute('idAnuncio')) 
      ->execute();
        }
        
    $this->form = new FotografiaAnuncioForm();
    $this->form->setDefault('idAnuncio', $this->getUser()->getAttribute('idAnuncio'));
    
    $this->idAnuncio=$this->getUser()->getAttribute('idAnuncio');
    
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
    $this->forward404Unless($request->isMethod(sfRequest::POST));

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
    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    $anuncio->borrado=1;
    $anuncio->activo=0;
    $anuncio->save();
    $this->getUser()->setFlash('mensajeSuceso','Anuncio eliminado.');

    $this->redirect('tusAnuncios/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $anuncio = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Anuncio guardado.');

      $this->redirect('fotografiaAnuncio/newEdit?idAnuncio='.$anuncio->id);
    }else{
      $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');

    }
  }
  
  
    
  public function executeSwitchValor(sfWebRequest $request){
    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    if($request->getParameter('variable')=='activo'){
        $anuncio->activo=$request->getParameter('valor');
    }
    $anuncio->save();
    }
  
  
  
}
