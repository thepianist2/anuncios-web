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
      if($request->hasParameter('idAnuncio')){
       $this->getUser()->setAttribute('idAnuncio', $request->getParameter('idAnuncio'));
        }
              //si se pasa el id muestra la fotos de ese anuncio
        if($request->hasParameter('idAnuncio') or $this->getUser()->hasAttribute('idAnuncio')){                  
    $this->fotografia_anuncios = Doctrine_Core::getTable('FotografiaAnuncio')
      ->createQuery('a')
      ->where('a.idAnuncio =?',$this->getUser()->getAttribute('idAnuncio')) 
      ->execute();
        }
        
    $this->form = new FotografiaAnuncioForm();
    $this->form->setDefault('idAnuncio', $this->getUser()->getAttribute('idAnuncio'));
    
    $this->idAnuncio=$this->getUser()->getAttribute('idAnuncio');
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FotografiaAnuncioForm();
    $this->form->setDefault('idAnuncio', $this->getUser()->getAttribute('idAnuncio'));    
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->fotografia_anuncios = Doctrine_Core::getTable('FotografiaAnuncio')
      ->createQuery('a')
      ->where('a.idAnuncio =?',$this->getUser()->getAttribute('idAnuncio')) 
      ->execute();
    
    $this->form = new FotografiaAnuncioForm();
    $this->form->setDefault('idAnuncio', $this->getUser()->getAttribute('idAnuncio'));
    $this->idAnuncio=$this->getUser()->getAttribute('idAnuncio');

    $this->processForm($request, $this->form);

    $this->setTemplate('index');
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
    $this->forward404Unless($fotografia_anuncio = Doctrine_Core::getTable('FotografiaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object fotografia_anuncio does not exist (%s).', $request->getParameter('id')));
    $fotografia_anuncio->delete();

    $this->redirect('fotografiaAnuncio/index?idAnuncio='.$this->getUser()->getAttribute('idAnuncio'));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $fotografia_anuncio = $form->save();
      $this->getUser()->setFlash('mensajeSuceso','Imágen guardada.');
      $this->redirect('fotografiaAnuncio/index?idAnuncio='.$this->getUser()->getAttribute('idAnuncio'));
    }
  }
}
