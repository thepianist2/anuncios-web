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
    $this->provincia_anuncios = Doctrine_Core::getTable('ProvinciaAnuncio')
      ->createQuery('a')
      ->execute();
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
    $request->checkCSRFProtection();

    $this->forward404Unless($provincia_anuncio = Doctrine_Core::getTable('ProvinciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object provincia_anuncio does not exist (%s).', $request->getParameter('id')));
    $provincia_anuncio->delete();

    $this->redirect('provinciaAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $provincia_anuncio = $form->save();

      $this->redirect('provinciaAnuncio/edit?id='.$provincia_anuncio->getId());
    }
  }
}
